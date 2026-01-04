@extends('layouts.app')

@section('title', $post->title ?? 'News')

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4">
    <div class="bg-white rounded-2xl p-8 shadow">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900">{{ $post->title }}</h1>
            <div class="text-sm text-gray-500 mt-2">Published {{ optional($post->published_at)->format('M d, Y') }}</div>
        </div>

        @if($post->image)
            <div class="mb-6">
                <img src="{{ $post->image }}" alt="{{ $post->title }}" class="w-full h-64 object-cover rounded-lg">
            </div>
        @endif

        <div class="prose max-w-none text-gray-800 mb-6">
            {!! $post->content !!}
        </div>

        <div class="flex items-center gap-3 mb-6">
            <button id="likeBtn" class="px-4 py-2 bg-indigo-600 text-white rounded">Like (<span id="likesCount">{{ $post->likes }}</span>)</button>
            <button onclick="document.getElementById('commentForm').scrollIntoView({behavior:'smooth'})" class="px-4 py-2 bg-gray-100 rounded">Comment ({{ $post->comments }})</button>
        </div>

        {{-- Comments --}}
        <div class="space-y-4">
            <h3 class="text-lg font-semibold">Comments</h3>
            @forelse($post->commentsList as $c)
                <div class="p-4 bg-gray-50 rounded">
                    <div class="text-sm text-gray-700 font-semibold">{{ $c->name ?? 'Anonymous' }}</div>
                    <div class="text-xs text-gray-500">{{ optional($c->created_at)->diffForHumans() }}</div>
                    <div class="mt-2 text-gray-800">{{ $c->body }}</div>
                </div>
            @empty
                <p class="text-sm text-gray-500">No comments yet.</p>
            @endforelse
        </div>

        {{-- Comment Form --}}
        <div id="commentForm" class="mt-8">
            <form method="POST" action="{{ route('news.comments.store', $post->id) }}">
                @csrf
                <div class="grid grid-cols-1 gap-3">
                    <input type="text" name="name" placeholder="Your name" class="px-3 py-2 border rounded">
                    <textarea name="body" rows="4" placeholder="Write your comment..." class="px-3 py-2 border rounded"></textarea>
                    <button class="px-4 py-2 bg-indigo-600 text-white rounded">Submit Comment</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('likeBtn')?.addEventListener('click', function(){
    fetch("{{ route('news.like', $post->id) }}", { method: 'POST', headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' } })
        .then(r => r.json()).then(data => {
            document.getElementById('likesCount').textContent = data.likes;
        });
});
</script>
@endsection
