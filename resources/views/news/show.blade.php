@extends('layouts.app')

@section('title', $post->title ?? 'News Detail')

@section('extra-css')
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }

        .glass-morphism {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .content-body p {
            @apply text-gray-700 leading-relaxed mb-8 text-xl;
        }

        .content-body h2 {
            @apply text-3xl font-bold text-gray-900 mt-12 mb-6;
        }

        .content-body h3 {
            @apply text-2xl font-bold text-gray-900 mt-10 mb-4;
        }

        .premium-badge {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
        }

        .interaction-btn-v2 {
            @apply flex items-center px-6 py-3 rounded-full bg-white border border-gray-100 font-bold text-gray-600 transition-all hover:shadow-lg hover:shadow-indigo-100 hover:-translate-y-0.5 active:scale-95;
        }

        .interaction-btn-v2.active {
            @apply bg-indigo-600 border-indigo-600 text-white shadow-indigo-200;
        }

        .comment-card-v2 {
            @apply bg-white p-8 rounded-[2rem] border border-gray-50 transition-all hover:shadow-xl hover:shadow-gray-100/50;
        }

        .sticky-share {
            @apply fixed left-8 top-1/2 -translate-y-1/2 hidden xl:flex flex-col space-y-4;
        }

        .sticky-share-btn {
            @apply w-12 h-12 rounded-full bg-white border border-gray-100 flex items-center justify-center text-gray-400 transition-all hover:bg-indigo-600 hover:text-white hover:border-indigo-600 hover:shadow-xl hover:shadow-indigo-100;
        }
    </style>
@endsection

@section('content')

    <div class="min-h-screen bg-[#fcfdff] pb-24">

        {{-- Breadcrumb & Back --}}
        <div class="container mx-auto px-4 pt-8 mb-12">
            <div class="flex items-center justify-between">
                <a href="{{ route('news') }}" class="inline-flex items-center text-indigo-600 font-bold group">
                    <span
                        class="w-10 h-10 rounded-full bg-indigo-50 flex items-center justify-center mr-3 group-hover:bg-indigo-600 group-hover:text-white transition-all">
                        <i class="fas fa-arrow-left text-sm"></i>
                    </span>
                    Back to News
                </a>

                <nav class="hidden md:flex items-center space-x-3 text-sm font-bold text-gray-400">
                    <a href="{{ route('home') }}" class="hover:text-indigo-600 uppercase tracking-wider">Home</a>
                    <i class="fas fa-chevron-right text-[10px]"></i>
                    <a href="{{ route('news') }}" class="hover:text-indigo-600 uppercase tracking-wider">News</a>
                    <i class="fas fa-chevron-right text-[10px]"></i>
                    <span class="text-indigo-600 uppercase tracking-wider truncate max-w-[200px]">{{ $post->title }}</span>
                </nav>
            </div>
        </div>

        <article class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">

                {{-- Header --}}
                <header class="mb-12 text-center md:text-left">
                    <div class="flex flex-wrap justify-center md:justify-start gap-3 mb-6">
                        @foreach($post->tags ?? ['General'] as $tag)
                            <span
                                class="premium-badge text-white px-5 py-1.5 rounded-full text-xs font-black uppercase tracking-widest">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>

                    <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 mb-8 leading-[1.1] tracking-tight">
                        {{ $post->title }}
                    </h1>

                    <div
                        class="flex flex-col md:flex-row items-center md:items-start justify-between gap-8 py-8 border-y border-gray-100">
                        <div class="flex items-center space-x-5">
                            <div class="relative">
                                <img src="{{ data_get($post, 'user.avatar', 'https://ui-avatars.com/api/?name=' . urlencode(data_get($post, 'user.name', 'CAEDA')) . '&background=4F46E5&color=fff&bold=true') }}"
                                    class="w-16 h-16 rounded-full object-cover border-4 border-white shadow-xl">
                                <span
                                    class="absolute bottom-0 right-0 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></span>
                            </div>
                            <div>
                                <div class="flex items-center">
                                    <h4 class="font-black text-gray-900 text-lg">{{ data_get($post, 'user.name', 'CAEDA') }}
                                    </h4>
                                    <i class="fas fa-check-circle text-blue-500 ml-2 text-xs" title="Verified Author"></i>
                                </div>
                                <p class="text-indigo-600 font-bold text-xs uppercase tracking-widest">
                                    {{ data_get($post, 'user.role', 'Principal Contributor') }}</p>
                            </div>
                        </div>

                        <div class="flex md:flex-col md:items-end gap-6 md:gap-1">
                            <div class="flex items-center text-gray-400 font-bold text-sm">
                                <i class="far fa-calendar-alt mr-2 text-indigo-400"></i>
                                {{ optional($post->published_at)->format('F d, Y') }}
                            </div>
                            <div class="flex items-center text-gray-400 font-bold text-sm">
                                <i class="far fa-clock mr-2 text-purple-400"></i>
                                {{ optional($post->published_at)->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                </header>

                {{-- Featured Image --}}
                @if($post->image)
                    <div class="mb-16 rounded-[3rem] overflow-hidden shadow-2xl shadow-indigo-100">
                        <img src="{{ Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : asset($post->image) }}"
                            alt="{{ $post->title }}" class="w-full h-auto object-cover max-h-[600px]">
                    </div>
                @endif

                {{-- Post Content --}}
                <div class="content-body mb-20 px-4 md:px-0">
                    {!! $post->content !!}
                </div>

                {{-- Interaction Bar --}}
                <div class="glass-morphism p-6 md:p-10 rounded-[2.5rem] shadow-xl shadow-indigo-100/30 mb-24">
                    <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                        <div class="flex items-center space-x-12">
                            <div class="text-center group">
                                <div class="text-3xl font-black text-indigo-600 mb-1" id="likes-number-{{ $post->id }}">
                                    {{ $post->likes }}</div>
                                <div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Appreciations</div>
                            </div>
                            <div class="text-center">
                                <div class="text-3xl font-black text-purple-600 mb-1" id="comments-number-{{ $post->id }}">
                                    {{ $post->comments }}</div>
                                <div class="text-xs font-bold text-gray-400 uppercase tracking-widest">Conversations</div>
                            </div>
                        </div>

                        <div class="flex flex-wrap justify-center gap-4">
                            <button onclick="likePost({{ $post->id }}, this)"
                                data-liked="{{ $post->is_liked ? 'true' : 'false' }}"
                                class="interaction-btn-v2 {{ $post->is_liked ? 'active' : '' }}">
                                <i class="{{ $post->is_liked ? 'fas fa-heart' : 'far fa-heart' }} mr-3"></i>
                                <span
                                    id="like-button-text-{{ $post->id }}">{{ $post->is_liked ? 'Appreciated' : 'Appreciate' }}</span>
                            </button>

                            <button onclick="document.getElementById('comment-textarea').focus()"
                                class="interaction-btn-v2">
                                <i class="far fa-comment-dots mr-3"></i>
                                Share Thoughts
                            </button>

                            <div class="relative group">
                                <button onclick="toggleShare()" class="interaction-btn-v2">
                                    <i class="far fa-share-square mr-3"></i>
                                    Spread News
                                </button>

                                {{-- Share Dropdown --}}
                                <div id="share-dropdown"
                                    class="hidden absolute bottom-full mb-4 right-0 bg-white rounded-3xl shadow-2xl border border-gray-100 p-4 w-64 z-50">
                                    <div class="grid grid-cols-2 gap-2">
                                        <a target="_blank"
                                            href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                            class="flex flex-col items-center p-4 rounded-2xl hover:bg-blue-50 text-blue-600 transition-all">
                                            <i class="fab fa-facebook text-2xl mb-2"></i>
                                            <span class="text-[10px] font-black uppercase tracking-widest">Facebook</span>
                                        </a>
                                        <a target="_blank"
                                            href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}"
                                            class="flex flex-col items-center p-4 rounded-2xl hover:bg-blue-400 hover:text-white text-blue-400 transition-all">
                                            <i class="fab fa-twitter text-2xl mb-2"></i>
                                            <span class="text-[10px] font-black uppercase tracking-widest">Twitter</span>
                                        </a>
                                        <a target="_blank"
                                            href="https://api.whatsapp.com/send?text={{ urlencode(url()->current()) }}"
                                            class="flex flex-col items-center p-4 rounded-2xl hover:bg-green-50 text-green-500 transition-all">
                                            <i class="fab fa-whatsapp text-2xl mb-2"></i>
                                            <span class="text-[10px] font-black uppercase tracking-widest">WhatsApp</span>
                                        </a>
                                        <button onclick="copyLink('{{ url()->current() }}')"
                                            class="flex flex-col items-center p-4 rounded-2xl hover:bg-indigo-50 text-indigo-600 transition-all">
                                            <i class="fas fa-link text-2xl mb-2"></i>
                                            <span class="text-[10px] font-black uppercase tracking-widest">Copy Link</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Discussion Section --}}
                <section id="discussion" class="mb-20">
                    <div class="flex items-center justify-between mb-12">
                        <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight">Discussion</h2>
                        <span
                            class="px-5 py-2 rounded-full bg-white border border-gray-100 text-sm font-black text-indigo-600 shadow-sm">{{ $post->comments }}
                            Responses</span>
                    </div>

                    {{-- Comment Form --}}
                    <div class="bg-indigo-50/50 p-8 md:p-12 rounded-[3rem] mb-16 border border-indigo-100/50">
                        <form id="comment-form-{{ $post->id }}" onsubmit="submitComment(event, {{ $post->id }})"
                            class="space-y-6">
                            @csrf
                            @guest
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <label
                                            class="text-sm font-black text-gray-500 uppercase tracking-widest ml-4">Identifier</label>
                                        <input type="text" name="name" required placeholder="Your professional name"
                                            class="w-full px-8 py-4 rounded-full bg-white border-transparent focus:border-indigo-300 focus:ring-4 focus:ring-indigo-100 outline-none transition-all font-bold">
                                    </div>
                                    <div class="space-y-2">
                                        <label
                                            class="text-sm font-black text-gray-500 uppercase tracking-widest ml-4">Connectivity</label>
                                        <input type="email" name="email" placeholder="Email (secure/private)"
                                            class="w-full px-8 py-4 rounded-full bg-white border-transparent focus:border-indigo-300 focus:ring-4 focus:ring-indigo-100 outline-none transition-all font-bold">
                                    </div>
                                </div>
                            @endguest

                            <div class="space-y-2">
                                <label class="text-sm font-black text-gray-500 uppercase tracking-widest ml-4">Your
                                    Perspectives</label>
                                <textarea id="comment-textarea" name="content" required rows="4"
                                    placeholder="What sparks your interest in this story?"
                                    class="w-full px-8 py-6 rounded-[2rem] bg-white border-transparent focus:border-indigo-300 focus:ring-4 focus:ring-indigo-100 outline-none transition-all font-bold resize-none"></textarea>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit"
                                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-12 py-4 rounded-full font-black shadow-xl shadow-indigo-200 transition-all transform hover:scale-105 active:scale-95">
                                    Post Response
                                </button>
                            </div>
                        </form>
                    </div>

                    {{-- Comments List --}}
                    <div id="comments-list-{{ $post->id }}" class="space-y-8">
                        @forelse($post->commentsList as $comment)
                            <div class="comment-card-v2 animate-fade-in-up">
                                <div class="flex items-start gap-6">
                                    <div
                                        class="w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-black text-2xl shadow-lg flex-shrink-0">
                                        {{ substr($comment->name ?? 'G', 0, 1) }}
                                    </div>
                                    <div class="flex-1">
                                        <div class="flex flex-wrap items-center justify-between gap-2 mb-4">
                                            <h4 class="text-xl font-black text-gray-900">
                                                {{ $comment->name ?? 'Community Member' }}</h4>
                                            <div
                                                class="flex items-center text-gray-400 font-bold text-xs uppercase tracking-widest">
                                                <i class="far fa-clock mr-2"></i>
                                                {{ $comment->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                        <p class="text-gray-600 text-lg leading-relaxed italic">"{{ $comment->content }}"</p>

                                        <div class="mt-6 flex items-center space-x-6">
                                            <button
                                                class="text-xs font-black text-indigo-600 uppercase tracking-widest hover:text-indigo-800 transition-all">Supportive</button>
                                            <button
                                                class="text-xs font-black text-gray-400 uppercase tracking-widest hover:text-indigo-600 transition-all">Reply</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-20 bg-white rounded-[3rem] border border-dashed border-gray-200">
                                <div
                                    class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6 text-gray-300">
                                    <i class="far fa-comments text-4xl"></i>
                                </div>
                                <h4 class="text-xl font-bold text-gray-400">Silent for now. Be the first to spark the fire.</h4>
                            </div>
                        @endforelse
                    </div>
                </section>
            </div>
        </article>
    </div>

    {{-- Sticky Share Bar (Desktop) --}}
    <div class="sticky-share font-black">
        <button onclick="likePost({{ $post->id }}, this)" class="sticky-share-btn" title="Appreciate">
            <i class="far fa-heart"></i>
        </button>
        <button onclick="scrollToComments()" class="sticky-share-btn" title="Discuss">
            <i class="far fa-comment-dots"></i>
        </button>
        <div class="w-px h-8 bg-gray-100 mx-auto my-2"></div>
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
            class="sticky-share-btn text-blue-600" title="Facebook">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a target="_blank" href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}"
            class="sticky-share-btn text-blue-400" title="Twitter">
            <i class="fab fa-twitter"></i>
        </a>
        <button onclick="copyLink('{{ url()->current() }}')" class="sticky-share-btn text-indigo-600" title="Copy Link">
            <i class="fas fa-link"></i>
        </button>
    </div>

@endsection

@section('extra-js')
    <script>
        const csrfToken = '{{ csrf_token() }}';

        function toggleShare() {
            document.getElementById('share-dropdown').classList.toggle('hidden');
        }

        function scrollToComments() {
            document.getElementById('discussion').scrollIntoView({ behavior: 'smooth' });
        }

        async function likePost(id, btn) {
            try {
                btn.disabled = true;
                const icon = btn.querySelector('i');
                const isLiked = btn.dataset.liked === 'true';

                // Visual Update
                if (!isLiked) {
                    btn.classList.add('active');
                    icon.className = 'fas fa-heart animate-pulse';
                    btn.dataset.liked = 'true';
                    if (document.getElementById('like-button-text-' + id)) document.getElementById('like-button-text-' + id).textContent = 'Appreciated';
                    const countEl = document.getElementById('likes-number-' + id);
                    countEl.textContent = parseInt(countEl.textContent) + 1;
                } else {
                    btn.classList.remove('active');
                    icon.className = 'far fa-heart';
                    btn.dataset.liked = 'false';
                    if (document.getElementById('like-button-text-' + id)) document.getElementById('like-button-text-' + id).textContent = 'Appreciate';
                    const countEl = document.getElementById('likes-number-' + id);
                    countEl.textContent = Math.max(0, parseInt(countEl.textContent) - 1);
                }

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

            } catch (err) {
                console.error(err);
            } finally {
                btn.disabled = false;
            }
        }

        function copyLink(url) {
            navigator.clipboard.writeText(url).then(() => {
                alert('Link copied to clipboard!');
                document.getElementById('share-dropdown').classList.add('hidden');
            });
        }

        async function submitComment(event, id) {
            event.preventDefault();
            const form = event.target;
            const formData = new FormData(form);
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            try {
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-circle-notch fa-spin mr-2"></i>Processing...';

                const res = await fetch(`/news/${id}/comments`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                if (!res.ok) throw new Error('Error posting comment');
                const data = await res.json();

                // Add new comment to UI
                const list = document.getElementById('comments-list-' + id);
                const newComment = document.createElement('div');
                newComment.className = 'comment-card-v2 animate-fade-in-up';
                newComment.innerHTML = `
                    <div class="flex items-start gap-6">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white font-black text-2xl shadow-lg flex-shrink-0">
                            ${(data.comment.name || 'G').charAt(0)}
                        </div>
                        <div class="flex-1">
                            <div class="flex flex-wrap items-center justify-between gap-2 mb-4">
                                <h4 class="text-xl font-black text-gray-900">${data.comment.name || 'Community Member'}</h4>
                                <div class="flex items-center text-gray-400 font-bold text-xs uppercase tracking-widest">
                                    <i class="far fa-clock mr-2"></i>
                                    Just now
                                </div>
                            </div>
                            <p class="text-gray-600 text-lg leading-relaxed italic">"${data.comment.content}"</p>
                        </div>
                    </div>
                `;

                if (list.querySelector('.border-dashed')) list.innerHTML = '';
                list.prepend(newComment);

                const countEl = document.getElementById('comments-number-' + id);
                countEl.textContent = parseInt(countEl.textContent) + 1;

                form.reset();

            } catch (err) {
                console.error(err);
                alert('Could not post your comment.');
            } finally {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }
        }
    </script>
@endsection