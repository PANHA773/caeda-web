@extends('layouts.app')

@section('title', 'CAEDA News')

@section('extra-css')
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<style>
		.font-poppins { font-family: 'Poppins', sans-serif; }
	</style>
@endsection

@section('content')

<div class="min-h-screen bg-gray-50 font-poppins">
	<div class="max-w-5xl mx-auto px-4 py-8">
		<div class="flex items-center justify-between mb-6">
			<h1 class="text-3xl font-bold text-gray-900">CAEDA News</h1>
			<div class="text-sm text-gray-600">Showing {{ $news->count() }} of {{ $news->total() }} posts</div>
		</div>

		{{-- News list --}}
		<div class="space-y-6">
			@forelse($news as $post)
				<article class="bg-white rounded-xl shadow overflow-hidden">
					<div class="p-4 md:p-6">
						<div class="flex items-start justify-between">
							<div class="flex items-center space-x-3">
								<img src="{{ data_get($post, 'user.avatar', 'https://via.placeholder.com/80') }}" alt="{{ data_get($post,'user.name','CAEDA') }}" class="w-12 h-12 rounded-full object-cover">
								<div>
									<div class="flex items-center space-x-2">
										<h3 class="font-semibold text-gray-900">{{ data_get($post, 'user.name', 'CAEDA') }}</h3>
										@if(data_get($post,'user.verified'))
											<span class="text-blue-600"><i class="fas fa-check-circle"></i></span>
										@endif
									</div>
									<div class="text-xs text-gray-500">{{ optional($post->published_at)->diffForHumans() }} • {{ data_get($post,'user.role','') }}</div>
								</div>
							</div>
							<div class="text-gray-400">
								<i class="fas fa-ellipsis-h"></i>
							</div>
						</div>

						{{-- Title / Excerpt --}}
						@if($post->title)
							<h2 class="mt-4 text-xl font-bold text-gray-900">{{ $post->title }}</h2>
						@endif
						@if($post->excerpt)
							<p class="mt-2 text-gray-700">{{ $post->excerpt }}</p>
						@endif

						{{-- Image --}}
						@if($post->image)
							<div class="mt-4">
								<img src="{{ $post->image }}" alt="{{ $post->title ?? 'News image' }}" class="w-full h-64 object-cover rounded-lg">
							</div>
						@endif

						{{-- Content (short) --}}
						<div class="mt-4 text-gray-800">
							{!! Str::limit(strip_tags($post->content), 350) !!}
						</div>

						{{-- Tags --}}
						@if(!empty($post->tags))
							<div class="mt-4 flex flex-wrap gap-2">
								@foreach($post->tags as $tag)
									<span class="text-sm text-blue-600">{{ $tag }}</span>
								@endforeach
							</div>
						@endif

						{{-- Stats and Actions --}}
						<div class="mt-4 pt-4 border-t flex items-center justify-between">
							<div class="flex items-center space-x-4 text-sm text-gray-600">
								<div class="flex items-center space-x-2">
									<span class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center text-white text-xs"><i class="fas fa-thumbs-up"></i></span>
									<span>{{ $post->likes }}</span>
								</div>
								<div>{{ $post->comments }} comments</div>
								<div>{{ $post->shares }} shares</div>
							</div>

							<div class="flex items-center space-x-3">
								<button onclick="likePost({{ $post->id }}, this)" data-liked="{{ $post->is_liked ? 'true' : 'false' }}" class="px-3 py-2 rounded-md border fb-interaction-btn">
									<i class="fas fa-thumbs-up mr-2"></i>
									<span>{{ $post->is_liked ? 'Liked' : 'Like' }}</span>
								</button>
								<a href="#comment-input-{{ $post->id }}" class="px-3 py-2 rounded-md border hover:bg-gray-50">Comment</a>
								<button onclick="sharePost({{ $post->id }})" class="px-3 py-2 rounded-md border hover:bg-gray-50">Share</button>
							</div>
						</div>

						{{-- Comment input --}}
						<div class="mt-4">
							<div class="flex items-center space-x-3">
								<div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">CS</div>
								<input id="comment-input-{{ $post->id }}" type="text" placeholder="Write a comment..." class="flex-1 px-3 py-2 rounded-full bg-gray-100 focus:outline-none">
							</div>
						</div>
					</div>
				</article>
			@empty
				<div class="bg-white rounded-xl shadow p-6 text-center text-gray-600">No news yet.</div>
			@endforelse
		</div>

		{{-- Pagination --}}
		<div class="mt-6">
			{{ $news->links() }}
		</div>
	</div>
</div>

@endsection

@section('extra-js')
<script>
	function likePost(id, btn) {
		const liked = btn.getAttribute('data-liked') === 'true';
		btn.setAttribute('data-liked', liked ? 'false' : 'true');
		// Optimistic UI only — implement API calls as needed
	}
	function sharePost(id) { alert('Share post ' + id); }
</script>
@endsection
