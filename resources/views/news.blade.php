@extends('layouts.app')

@section('title', 'CAEDA News')

@section('extra-css')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
    .font-poppins { font-family: 'Poppins', sans-serif; }
    

    .news-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: 1px solid rgba(229, 231, 235, 0.5);
        overflow: hidden;
    }
    
    .news-card:hover {
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        transform: translateY(-4px);
        border-color: rgba(79, 70, 229, 0.2);
    }
    
    .gradient-text {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .tag-badge {
        background: linear-gradient(135deg, rgba(79, 70, 229, 0.1) 0%, rgba(124, 58, 237, 0.1) 100%);
        color: #4F46E5;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        transition: all 0.2s ease;
    }
    
    .tag-badge:hover {
        background: linear-gradient(135deg, rgba(79, 70, 229, 0.15) 0%, rgba(124, 58, 237, 0.15) 100%);
        transform: scale(1.05);
    } 

    .interaction-btn {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 8px 16px;
        font-size: 14px;
        font-weight: 500;
        color: #4b5563;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    
    .interaction-btn:hover {
        background: #f9fafb;
        border-color: #d1d5db;
        color: #374151;
        transform: translateY(-1px);
    }
    
    .interaction-btn.active {
        background: #4F46E5;
        border-color: #4F46E5;
        color: white;
    }
    
    .comment-card {
        background: #f9fafb;
        border-radius: 12px;
        padding: 16px;
        margin-bottom: 12px;
        border-left: 4px solid #4F46E5;
        transition: all 0.2s ease;
    }
    
    .comment-card:hover {
        background: #f3f4f6;
        transform: translateX(4px);
    }
    
    .news-image-container {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
    }
    
    .news-image-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, transparent 70%, rgba(0,0,0,0.1));
        z-index: 1;
    }
    
    .news-image {
        transition: transform 0.5s ease;
    }
    
    .news-card:hover .news-image {
        transform: scale(1.05);
    }
    
    .avatar-ring {
        position: relative;
        border: 3px solid white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .avatar-ring.online::after {
        content: '';
        position: absolute;
        bottom: 0;
        right: 0;
        width: 12px;
        height: 12px;
        background: #10b981;
        border: 2px solid white;
        border-radius: 50%;
    }
    

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fadeInUp {
        animation: fadeInUp 0.6s ease-out forwards;
    }

    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #c7d2fe;
        border-radius: 10px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #a5b4fc;
    }
   
    @media (max-width: 768px) {
        .news-card {
            border-radius: 12px;
        }
        
        .interaction-btn {
            padding: 6px 12px;
            font-size: 13px;
        }
    }
</style>

@endsection

@section('content')

<div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 font-poppins">
    
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 opacity-5"></div>
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    <span class="gradient-text">CAEDA News</span>
                </h1>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Stay updated with the latest news, events, and announcements from Cambodia Academy of Entrepreneurship, Design, and Art.
                </p>
             
                <div class="mt-8 max-w-md mx-auto">
                    <div class="relative">
                        <input 
                            type="text" 
                            placeholder="Search news..."
                            class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all duration-200 shadow-sm"
                        >
                        <i class="fas fa-search absolute left-4 top-3.5 text-gray-400"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

 
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
      
        <div class="flex flex-col sm:flex-row items-center justify-between mb-8 p-4 bg-white rounded-xl shadow-sm">
            <div class="flex items-center space-x-6 mb-4 sm:mb-0">
                <div class="text-center">
                    <div class="text-2xl font-bold gradient-text">{{ $news->total() }}</div>
                    <div class="text-sm text-gray-500">Total Posts</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold gradient-text">{{ $news->count() }}</div>
                    <div class="text-sm text-gray-500">Showing</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold gradient-text">{{ optional($news->first())->likes ?? 0 }}</div>
                    <div class="text-sm text-gray-500">Most Likes</div>
                </div>
            </div>
            
           
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-600">Sort by:</span>
                <select class="px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all duration-200">
                    <option>Latest</option>
                    <option>Most Popular</option>
                    <option>Most Commented</option>
                </select>
                <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors duration-200">
                    <i class="fas fa-rss mr-2"></i>Subscribe
                </button>
            </div>
        </div>

     
        <div class="space-y-8">
            @forelse($news as $index => $post)
                <article class="news-card animate-fadeInUp" style="animation-delay: {{ $index * 0.1 }}s;">
                    <div class="p-6 md:p-8">
                     
                        <div class="flex items-start justify-between mb-6">
                            <div class="flex items-center space-x-4">
                                <div class="relative avatar-ring online">
                                    <img 
                                        src="{{ data_get($post, 'user.avatar', 'https://ui-avatars.com/api/?name=' . urlencode(data_get($post, 'user.name', 'CAEDA')) . '&background=4F46E5&color=fff&bold=true') }}" 
                                        alt="{{ data_get($post,'user.name','CAEDA') }}" 
                                        class="w-14 h-14 rounded-full object-cover"
                                    >
                                </div>
                                <div>
                                    <div class="flex items-center space-x-2">
                                        <h3 class="font-bold text-gray-900">{{ data_get($post, 'user.name', 'CAEDA') }}</h3>
                                        @if(data_get($post,'user.verified'))
                                            <span class="text-blue-500" title="Verified">
                                                <i class="fas fa-check-circle"></i>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="flex items-center space-x-3 text-sm text-gray-500 mt-1">
                                        <span>
                                            <i class="far fa-clock mr-1"></i>
                                            {{ optional($post->published_at)->diffForHumans() }}
                                        </span>
                                        <span>•</span>
                                        <span class="text-indigo-600 font-medium">
                                            {{ data_get($post,'user.role','Admin') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="relative">
                                <button class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                                    <i class="fas fa-ellipsis-h text-lg"></i>
                                </button>
                            </div>
                        </div>

                    
                        @if($post->title)
                            <h2 class="text-2xl font-bold text-gray-900 mb-3 leading-tight">
                                <a href="{{ route('news.show', $post->slug) }}" class="hover:text-indigo-600 transition-colors duration-200">
                                    {{ $post->title }}
                                </a>
                            </h2>
                        @endif
                        
                        @if($post->excerpt)
                            <p class="text-gray-700 text-lg mb-6">{{ $post->excerpt }}</p>
                        @endif

                
                        @if($post->image)
                            <div class="news-image-container mb-6">
                                <img 
                                    src="{{ $post->image ? (\Illuminate\Support\Str::startsWith($post->image, ['http://','https://']) ? $post->image : asset($post->image)) : '' }}" 
                                    alt="{{ $post->title ?? 'News image' }}" 
                                    class="news-image w-full h-64 md:h-80 object-cover"
                                >
                            </div>
                        @endif

                   
                        <div class="text-gray-800 mb-6 leading-relaxed">
                            {!! Str::limit(strip_tags($post->content), 400) !!}
                            @if(strlen(strip_tags($post->content)) > 400)
                                <a href="{{ route('news.show', $post->slug) }}" class="text-indigo-600 hover:text-indigo-800 font-medium ml-2">
                                    Read more <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            @endif
                        </div>

                        @if(!empty($post->tags))
                            <div class="mb-6 flex flex-wrap gap-2">
                                @foreach($post->tags as $tag)
                                    <a href="#" class="tag-badge">
                                        <i class="fas fa-hashtag mr-1 text-xs"></i>
                                        {{ $tag }}
                                    </a>
                                @endforeach
                            </div>
                        @endif

                        <div class="pt-6 border-t border-gray-200">
                            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                            
                                <div class="flex items-center space-x-6 text-sm text-gray-600">
                                    <div class="flex items-center space-x-2">
                                        <span class="w-8 h-8 bg-blue-50 rounded-full flex items-center justify-center text-blue-600">
                                            <i class="fas fa-thumbs-up text-sm"></i>
                                        </span>
                                        <span id="likes-number-{{ $post->id }}" class="font-medium">{{ $post->likes }}</span>
                                        <span>Likes</span>
                                    </div>
                                    
                                    <div class="flex items-center space-x-2">
                                        <span class="w-8 h-8 bg-green-50 rounded-full flex items-center justify-center text-green-600">
                                            <i class="fas fa-comment text-sm"></i>
                                        </span>
                                        <span id="comments-number-{{ $post->id }}" class="font-medium">{{ $post->comments }}</span>
                                        <span>Comments</span>
                                    </div>
                                    
                                    <div class="flex items-center space-x-2">
                                        <span class="w-8 h-8 bg-purple-50 rounded-full flex items-center justify-center text-purple-600">
                                            <i class="fas fa-share text-sm"></i>
                                        </span>
                                        <span class="font-medium">{{ $post->shares }}</span>
                                        <span>Shares</span>
                                    </div>
                                </div>

                        
                                <div class="flex items-center space-x-2">
                                    <button 
                                        onclick="likePost({{ $post->id }}, this)" 
                                        data-liked="{{ $post->is_liked ? 'true' : 'false' }}" 
                                        class="interaction-btn {{ $post->is_liked ? 'active' : '' }}"
                                    >
                                        <i class="fas fa-thumbs-up mr-2"></i>
                                        <span id="like-button-text-{{ $post->id }}">
                                            {{ $post->is_liked ? 'Liked' : 'Like' }}
                                        </span>
                                    </button>
                                    
                                    <button 
                                        onclick="toggleCommentForm({{ $post->id }})" 
                                        class="interaction-btn"
                                    >
                                        <i class="fas fa-comment mr-2"></i>
                                        Comment
                                    </button>
                                    
                                    <div class="relative">
                                        <button 
                                            onclick="toggleShareMenu({{ $post->id }})" 
                                            class="interaction-btn"
                                        >
                                            <i class="fas fa-share mr-2"></i>
                                            Share
                                        </button>
                                        <div 
                                            id="share-menu-{{ $post->id }}" 
                                            class="hidden absolute right-0 mt-2 bg-white border border-gray-200 rounded-lg shadow-lg py-2 z-10 min-w-48"
                                        >
                                            <a 
                                                target="_blank" 
                                                rel="noopener" 
                                                href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('news.show', $post->slug)) }}"
                                                class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150"
                                            >
                                                <i class="fab fa-facebook-square text-blue-600 mr-3 text-lg"></i>
                                                Share on Facebook
                                            </a>
                                            <a 
                                                target="_blank" 
                                                rel="noopener" 
                                                href="https://twitter.com/intent/tweet?url={{ urlencode(route('news.show', $post->slug)) }}&text={{ urlencode($post->title) }}"
                                                class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150"
                                            >
                                                <i class="fab fa-twitter text-blue-400 mr-3 text-lg"></i>
                                                Share on Twitter
                                            </a>
                                            <a 
                                                target="_blank" 
                                                rel="noopener" 
                                                href="https://api.whatsapp.com/send?text={{ urlencode($post->title . ' ' . route('news.show', $post->slug)) }}"
                                                class="flex items-center px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150"
                                            >
                                                <i class="fab fa-whatsapp text-green-500 mr-3 text-lg"></i>
                                                Share on WhatsApp
                                            </a>
                                            <div class="border-t border-gray-200 mt-2 pt-2">
                                                <button 
                                                    onclick="copyLink('{{ route('news.show', $post->slug) }}')"
                                                    class="flex items-center w-full px-4 py-3 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150"
                                                >
                                                    <i class="fas fa-link text-gray-600 mr-3"></i>
                                                    Copy Link
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    
                            <div 
                                id="comments-section-{{ $post->id }}" 
                                class="mt-6 space-y-4 max-h-80 overflow-y-auto custom-scrollbar p-2 hidden"
                            >
                                @foreach($post->commentsList->take(10) as $comment)
                                    <div class="comment-card">
                                        <div class="flex items-start space-x-3">
                                            <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white text-xs font-bold">
                                                {{ substr($comment->name ?? 'G', 0, 1) }}
                                            </div>
                                            <div class="flex-1">
                                                <div class="text-sm text-gray-700 leading-relaxed">{{ $comment->content }}</div>
                                                <div class="flex items-center justify-between mt-2">
                                                    <span class="text-xs text-gray-500 font-medium">
                                                        {{ $comment->name ?? 'Guest' }}
                                                    </span>
                                                    <span class="text-xs text-gray-400">
                                                        {{ $comment->created_at->diffForHumans() }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @if($post->commentsList->isEmpty())
                                    <div class="text-center py-8 text-gray-500">
                                        <i class="far fa-comment-dots text-4xl mb-3 opacity-50"></i>
                                        <p>No comments yet. Be the first to comment!</p>
                                    </div>
                                @endif
                            </div>

                       
                            <form 
                                id="comment-form-{{ $post->id }}" 
                                onsubmit="submitComment(event, {{ $post->id }})" 
                                class="mt-6 space-y-4 hidden"
                            >
                                @csrf
                                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                                    <h4 class="font-medium text-gray-900 mb-3">
                                        <i class="fas fa-edit mr-2 text-indigo-600"></i>
                                        Post a Comment
                                    </h4>
                                    
                                    @guest
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mb-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                                    Your Name *
                                                </label>
                                                <input 
                                                    type="text" 
                                                    name="name" 
                                                    required
                                                    placeholder="John Doe"
                                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all duration-200"
                                                >
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                                    Email (optional)
                                                </label>
                                                <input 
                                                    type="email" 
                                                    name="email" 
                                                    placeholder="john@example.com"
                                                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all duration-200"
                                                >
                                            </div>
                                        </div>
                                    @endguest
                                    
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">
                                            Comment *
                                        </label>
                                        <textarea 
                                            name="content" 
                                            rows="3" 
                                            required
                                            placeholder="Share your thoughts..."
                                            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all duration-200 resize-none"
                                        ></textarea>
                                    </div>
                                    
                                    <div class="flex items-center justify-between pt-2">
                                        <div class="text-sm text-gray-500">
                                            <i class="fas fa-info-circle mr-1"></i>
                                            Your email will not be published.
                                        </div>
                                        <button 
                                            type="submit" 
                                            class="px-6 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 font-medium"
                                        >
                                            <i class="fas fa-paper-plane mr-2"></i>
                                            Post Comment
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </article>
            @empty
                <div class="news-card p-12 text-center">
                    <div class="text-gray-400 mb-4">
                        <i class="fas fa-newspaper text-6xl opacity-50"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">No News Yet</h3>
                    <p class="text-gray-600 mb-6">Check back later for updates and announcements.</p>
                    <button class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all duration-200 font-medium">
                        <i class="fas fa-bell mr-2"></i>
                        Get Notified
                    </button>
                </div>
            @endforelse
        </div>

        @if($news->hasPages())
            <div class="mt-12 bg-white rounded-xl shadow-sm p-6">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-sm text-gray-600">
                        Showing {{ $news->firstItem() }} to {{ $news->lastItem() }} of {{ $news->total() }} results
                    </div>
                    <div class="flex items-center space-x-2">
                        {{ $news->links('vendor.pagination.tailwind-custom') }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>


<button 
    id="back-to-top" 
    class="fixed bottom-6 right-6 w-12 h-12 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hidden z-50"
    onclick="scrollToTop()"
>
    <i class="fas fa-arrow-up"></i>
</button>

@endsection

@section('extra-js')
<script>
    const csrfToken = '{{ csrf_token() }}';
    
  
    window.addEventListener('scroll', () => {
        const backToTopBtn = document.getElementById('back-to-top');
        if (window.scrollY > 300) {
            backToTopBtn.classList.remove('hidden');
        } else {
            backToTopBtn.classList.add('hidden');
        }
    });
    
    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
    
  
    async function likePost(id, btn) {
        try {
            btn.disabled = true;
            const wasLiked = btn.dataset.liked === 'true';
            const icon = btn.querySelector('i');
            
            btn.classList.add('active');
            icon.classList.remove('fa-thumbs-up');
            icon.classList.add('fa-heart', 'animate-pulse');
            
            const res = await fetch(`/news/${id}/like`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({})
            });
            
            if (!res.ok) throw new Error('Network error');
            
            const data = await res.json();
            document.getElementById('likes-number-' + id).textContent = data.likes;
            document.getElementById('like-button-text-' + id).textContent = data.is_liked ? 'Liked' : 'Like';
            btn.dataset.liked = data.is_liked ? 'true' : 'false';
          
            setTimeout(() => {
                icon.classList.remove('fa-heart', 'animate-pulse');
                icon.classList.add('fa-thumbs-up');
                if (!data.is_liked) {
                    btn.classList.remove('active');
                }
            }, 300);
            
        } catch (err) {
            console.error(err);
            showToast('Could not like the post.', 'error');
        } finally {
            btn.disabled = false;
        }
    }
    
  
    function toggleShareMenu(id) {
        const menu = document.getElementById('share-menu-' + id);
        const allMenus = document.querySelectorAll('[id^="share-menu-"]');
      
        allMenus.forEach(otherMenu => {
            if (otherMenu !== menu) {
                otherMenu.classList.add('hidden');
            }
        });
        
       
        menu.classList.toggle('hidden');
    }
    
   
    function copyLink(url) {
        navigator.clipboard.writeText(url).then(() => {
            showToast('Link copied to clipboard!', 'success');
            
            document.querySelectorAll('[id^="share-menu-"]').forEach(menu => {
                menu.classList.add('hidden');
            });
        });
    }
    
  
    function toggleCommentForm(id) {
        const form = document.getElementById('comment-form-' + id);
        const commentsSection = document.getElementById('comments-section-' + id);
        
        form.classList.toggle('hidden');
        if (!form.classList.contains('hidden')) {
            commentsSection.classList.remove('hidden');
            form.querySelector('textarea').focus();
        } else {
            commentsSection.classList.add('hidden');
        }
    }
    
   
    async function submitComment(event, id) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalBtnText = submitBtn.innerHTML;
        
        try {
           
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Posting...';
            
            const res = await fetch(`/news/${id}/comments`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: formData
            });
            
            if (!res.ok) {
                const err = await res.json().catch(() => null);
                throw new Error(err?.message || 'Could not post comment');
            }
            
            const data = await res.json();
            
          
            const commentsSection = document.getElementById('comments-section-' + id);
            const newComment = document.createElement('div');
            newComment.className = 'comment-card';
            newComment.innerHTML = `
                <div class="flex items-start space-x-3">
                    <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white text-xs font-bold">
                        ${escapeHtml(data.comment.name ? data.comment.name.charAt(0) : 'G')}
                    </div>
                    <div class="flex-1">
                        <div class="text-sm text-gray-700 leading-relaxed">${escapeHtml(data.comment.content)}</div>
                        <div class="flex items-center justify-between mt-2">
                            <span class="text-xs text-gray-500 font-medium">
                                ${escapeHtml(data.comment.name || 'Guest')}
                            </span>
                            <span class="text-xs text-gray-400">
                                just now
                            </span>
                        </div>
                    </div>
                </div>
            `;
            
            
            commentsSection.prepend(newComment);
            
           
            const commentsNumber = document.getElementById('comments-number-' + id);
            if (commentsNumber) {
                const current = parseInt(commentsNumber.textContent) || 0;
                commentsNumber.textContent = current + 1;
            }
            
          
            form.reset();
            
           
            showToast('Comment posted successfully!', 'success');
            
         
            newComment.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            
        } catch (err) {
            console.error(err);
            showToast(err.message || 'Could not submit comment', 'error');
        } finally {
          
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalBtnText;
        }
    }
    

    function showToast(message, type = 'info') {
        const toast = document.createElement('div');
        const colors = {
            success: 'bg-green-500',
            error: 'bg-red-500',
            info: 'bg-blue-500'
            
        };
        
        toast.className = `fixed top-6 right-6 px-6 py-3 rounded-lg text-white shadow-lg transform transition-all duration-300 translate-x-full ${colors[type]} z-50`;
        toast.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} mr-3"></i>
                <span>${message}</span>
            </div>
        `;
        
        document.body.appendChild(toast);
        
        setTimeout(() => {
            toast.classList.remove('translate-x-full');
        }, 10);
        
        setTimeout(() => {
            toast.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(toast);
            }, 300);
        }, 4000);
    }
    
    
    function escapeHtml(unsafe) {
        if (!unsafe) return '';
        return unsafe.replace(/[&<"'>]/g, function(m) { 
            return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[m]; 
        });
    }
    

    document.addEventListener('click', (e) => {
        if (!e.target.closest('[id^="share-menu-"]') && !e.target.closest('.interaction-btn .fa-share')) {
            document.querySelectorAll('[id^="share-menu-"]').forEach(menu => {
                menu.classList.add('hidden');
            });
        }
    });
</script>
@endsection