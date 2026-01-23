@extends('admin.layouts.app')

@section('title', 'Footer Settings')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
        <h1 class="text-2xl font-bold text-gray-800">Footer Settings</h1>

        @if($footer)
            <a href="{{ route('admin.footer.edit', $footer->id) }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                Edit Footer
            </a>
        @else
            <a href="{{ route('admin.footer.create') }}"
               class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                + Add Footer
            </a>
        @endif
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Footer Details --}}
    <div class="bg-white shadow rounded-lg p-6">
        @if($footer)
            <div class="space-y-4">
                <p><strong>Logo:</strong> {{ $footer->logo }}</p>
                <p><strong>Tagline:</strong> {{ $footer->tagline }}</p>
                <p><strong>Description:</strong> {{ $footer->description }}</p>

                <div>
                    <strong>Social Links:</strong>
                    <ul class="list-disc ml-5 text-gray-700">
                        @foreach($footer->social_links ?? [] as $key => $link)
                            <li>{{ ucfirst($key) }}: {{ $link }}</li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <strong>Quick Links:</strong>
                    <ul class="list-disc ml-5 text-gray-700">
                        @foreach($footer->quick_links ?? [] as $link)
                            <li>{{ $link['name'] }} (Route: {{ $link['route'] }})</li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <strong>Contact Info:</strong>
                    <ul class="list-disc ml-5 text-gray-700">
                        @foreach($footer->contact_info ?? [] as $key => $value)
                            <li>{{ ucfirst($key) }}: {{ $value }}</li>
                        @endforeach
                    </ul>
                </div>

                {{-- Delete Footer --}}
                <form action="{{ route('admin.footer.destroy', $footer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this footer?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                        Delete Footer
                    </button>
                </form>
            </div>
        @else
            <p class="text-gray-500">No footer data found. Please create one.</p>
        @endif
    </div>
</div>
@endsection
