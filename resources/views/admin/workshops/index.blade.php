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
            $categories = $workshops->pluck('category')->unique();
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
                        <img id="thumb-{{ $workshop->id }}"
                             src="{{ asset('storage/'.$workshop->image) }}"
                             class="w-full h-44 object-cover rounded-t-xl">

                        {{-- Video --}}
                        @if($workshop->video_url)
                        <div id="video-{{ $workshop->id }}" class="hidden">
                            <iframe class="w-full h-44 rounded-t-xl"
                                    data-src="{{ $workshop->video_url }}"
                                    frameborder="0"
                                    allowfullscreen></iframe>
                        </div>

                        {{-- Play Button --}}
                        <button onclick="playWorkshop({{ $workshop->id }})"
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

                            <span class="text-xs px-2 py-1 rounded
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

                        <form method="POST"
                              action="{{ route('admin.workshops.destroy', $workshop->id) }}"
                              onsubmit="return confirm('Delete this workshop?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="text-red-600 hover:underline text-sm">
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
    const iframe = videoDiv.querySelector('iframe');

    // Hide thumbnail and show video
    thumbImg.classList.add('hidden');
    videoDiv.classList.remove('hidden');

    // Load video if not loaded
    if (!iframe.src) {
        iframe.src = iframe.dataset.src;
    }

    // Pause other videos
    document.querySelectorAll('[id^="video-"]').forEach(v => {
        if (v.id !== 'video-' + id) {
            v.classList.add('hidden');
            const f = v.querySelector('iframe');
            if (f) f.src = '';
        }
    });
    document.querySelectorAll('[id^="thumb-"]').forEach(t => {
        if (t.id !== 'thumb-' + id) {
            t.classList.remove('hidden');
        }
    });
}
</script>

@endsection
