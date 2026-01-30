@extends('admin.layouts.app')

@section('title', 'Workshops Management')

@section('content')

    <div class="max-w-7xl mx-auto px-6 py-8">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Workshops</h1>

            <a href="{{ route('admin.workshops.create') }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                + Add Workshop
            </a>
        </div>

        {{-- Category Filters --}}
        <div class="flex flex-wrap gap-3 mb-8">
            @php
                $categories = collect($workshops)->pluck('category')->unique();
            @endphp

            <button class="category-filter category-btn-active" data-category="all">
                All
            </button>

            @foreach($categories as $category)
                <button class="category-filter" data-category="{{ $category }}">
                    {{ ucfirst($category) }}
                </button>
            @endforeach
        </div>

        {{-- Workshops Grid --}}
        <section id="workshops-grid">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse($workshops as $workshop)
                    <div class="workshop-card bg-white rounded-xl shadow" data-category="{{ $workshop->category }}">

                        {{-- Thumbnail / Video --}}
                        <div class="relative">
                            {{-- Thumbnail --}}
                            @php
                                $img = $workshop->image ?? null;
                                $imgPath = $img ? public_path('storage/' . $img) : null;
                                $hasImg = $imgPath && file_exists($imgPath);
                            @endphp

                            @if($hasImg)
                                <img id="thumb-{{ $workshop->id }}" src="{{ asset('storage/' . $workshop->image) }}"
                                    class="w-full h-44 object-cover rounded-t-xl">
                            @else
                                <div id="thumb-{{ $workshop->id }}"
                                    class="w-full h-44 bg-gray-100 rounded-t-xl flex items-center justify-center text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M3 10h14v6a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-6z"></path>
                                    </svg>
                                </div>
                            @endif

                            {{-- Video --}}
                            @if($workshop->video)
                                <div id="video-{{ $workshop->id }}" class="hidden">
                                    @if(preg_match('/^https?:\/\//i', $workshop->video))
                                        <iframe class="w-full h-44 rounded-t-xl" data-src="{{ $workshop->video_url }}" frameborder="0"
                                            allowfullscreen></iframe>
                                    @else
                                        <video class="w-full h-44 rounded-t-xl" controls preload="none">
                                            <source src="{{ $workshop->video_url }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                </div>

                                {{-- Play Button --}}
                                <button id="play-btn-{{ $workshop->id }}" onclick="playWorkshop({{ $workshop->id }})"
                                    class="absolute inset-0 flex items-center justify-center
                                                                                       bg-black/40 text-white text-3xl hover:bg-black/60">
                                    ▶
                                </button>
                            @endif
                        </div>

                        {{-- Content --}}
                        <div class="p-4 space-y-2">
                            <h3 class="font-semibold text-lg text-gray-800">{{ $workshop->title }}</h3>
                            <p class="text-sm text-gray-500">Instructor: {{ $workshop->instructor }}</p>

                            <div class="flex justify-between items-center">
                                <span class="level-badge px-3 py-1 text-xs rounded-full bg-gray-100 text-gray-700">
                                    {{ ucfirst($workshop->level) }}
                                </span>

                                <span
                                    class="text-xs px-2 py-1 rounded
                                                                {{ $workshop->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $workshop->status ? 'Active' : 'Inactive' }}
                                </span>
                            </div>
                        </div>

                        {{-- Actions --}}
                        <div class="flex justify-between px-4 py-3 border-t bg-gray-50">
                            <a href="{{ route('admin.workshops.edit', $workshop->id) }}"
                                class="text-blue-600 hover:underline text-sm">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('admin.workshops.destroy', $workshop->id) }}"
                                onsubmit="return confirm('Delete this workshop?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="text-red-600 hover:underline text-sm">
                                    Delete
                                </button>
                            </form>
                        </div>

                    </div>
                @empty
                    <p class="text-gray-500">No workshops found.</p>
                @endforelse

            </div>

            {{-- No Results --}}
            <div id="no-workshops" class="hidden text-center text-gray-500 mt-10">
                No workshops in this category.
            </div>
        </section>

    </div>

    {{-- JS for Video Play --}}
    <script>
        function playWorkshop(id) {
            const videoDiv = document.getElementById('video-' + id);
            const thumbImg = document.getElementById('thumb-' + id);
            const playBtn = document.getElementById('play-btn-' + id);
            const iframe = videoDiv.querySelector('iframe');
            const video = videoDiv.querySelector('video');

            if (!videoDiv) return;

            // Hide thumbnail and play button, show video container
            if (thumbImg) thumbImg.classList.add('hidden');
            if (playBtn) playBtn.classList.add('hidden');
            videoDiv.classList.remove('hidden');

            // Load iframe if needed
            if (iframe && !iframe.src) {
                iframe.src = iframe.dataset.src;
            }

            // Play local video if present
            if (video) {
                video.play();
            }

            // Reset/Stop other videos
            document.querySelectorAll('[id^="video-"]').forEach(v => {
                const otherId = v.id.replace('video-', '');
                if (otherId !== id.toString()) {
                    v.classList.add('hidden');

                    // Stop iframe
                    const f = v.querySelector('iframe');
                    if (f) f.src = '';

                    // Stop local video
                    const vid = v.querySelector('video');
                    if (vid) {
                        vid.pause();
                        vid.currentTime = 0;
                    }

                    // Show other thumbnails and play buttons
                    const otherThumb = document.getElementById('thumb-' + otherId);
                    if (otherThumb) otherThumb.classList.remove('hidden');

                    const otherPlayBtn = document.getElementById('play-btn-' + otherId);
                    if (otherPlayBtn) otherPlayBtn.classList.remove('hidden');
                }
            });
        }
    </script>

@endsection