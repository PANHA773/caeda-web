@extends('admin.layouts.app')

@section('title', 'News Articles')
@section('page-title', 'News Management')
@section('page-description', 'Manage and publish news articles for your website.')

@section('content')
    <div class="p-4 md:p-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <div>
                <h2 class="text-xl font-bold text-gray-900">All Articles</h2>
                <p class="text-sm text-gray-500 mt-1">Total {{ $news->total() }} articles found.</p>
            </div>
            <a href="{{ route('admin.news.create') }}"
                class="btn-gradient px-5 py-2.5 rounded-xl text-white font-semibold shadow-lg shadow-indigo-200 flex items-center justify-center space-x-2 transition-all hover:scale-105 active:scale-95">
                <i class="fas fa-plus-circle"></i>
                <span>Create New Article</span>
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-r-xl animate-fadeIn">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-3"></i>
                    <p class="font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-separate border-spacing-0">
                    <thead>
                        <tr class="bg-gray-50/50">
                            <th
                                class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">
                                Article</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">
                                Status</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">
                                Engagement</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">
                                Published At</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100 text-right">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($news as $item)
                            <tr class="hover:bg-indigo-50/30 transition-colors group">
                                <td class="px-6 py-4 border-b border-gray-50">
                                    <div class="flex items-center space-x-4">
                                        <div
                                            class="h-12 w-16 flex-shrink-0 rounded-lg overflow-hidden border border-gray-100 shadow-sm bg-gray-50">
                                            @if($item->image)
                                                <img src="{{ $item->image }}" alt="{{ $item->title }}"
                                                    class="h-full w-full object-cover">
                                            @else
                                                <div class="h-full w-full flex items-center justify-center text-gray-300">
                                                    <i class="fas fa-image text-xl"></i>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="min-w-0 max-w-[250px]">
                                            <p
                                                class="text-sm font-bold text-gray-900 truncate group-hover:text-indigo-600 transition-colors">
                                                {{ $item->title }}</p>
                                            <p class="text-xs text-gray-500 truncate mt-0.5">
                                                {{ $item->excerpt ?? 'No excerpt provided...' }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-50">
                                    @if($item->published_at && $item->published_at <= now())
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5 animate-pulse"></span>
                                            Published
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            <span class="w-1.5 h-1.5 rounded-full bg-gray-400 mr-1.5"></span>
                                            Draft
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 border-b border-gray-50">
                                    <div class="flex items-center space-x-3 text-sm text-gray-500">
                                        <span title="Likes" class="flex items-center">
                                            <i class="far fa-heart mr-1.5 text-pink-400"></i> {{ $item->likes }}
                                        </span>
                                        <span title="Comments" class="flex items-center">
                                            <i class="far fa-comment mr-1.5 text-blue-400"></i> {{ $item->comments }}
                                        </span>
                                        <span title="Shares" class="flex items-center">
                                            <i class="far fa-share-square mr-1.5 text-green-400"></i> {{ $item->shares }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-50">
                                    <span class="text-sm text-gray-600">
                                        {{ $item->published_at ? $item->published_at->format('M d, Y') : 'Not scheduled' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-50 text-right">
                                    <div class="flex items-center justify-end space-x-2">
                                        <a href="{{ route('admin.news.edit', $item->id) }}"
                                            class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors"
                                            title="Edit Article">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this article?');"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors"
                                                title="Delete Article">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="h-16 w-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                            <i class="fas fa-newspaper text-3xl text-gray-200"></i>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-900">No articles yet</h3>
                                        <p class="text-gray-500 mt-1">Start by creating your first news article today.</p>
                                        <a href="{{ route('admin.news.create') }}"
                                            class="mt-4 text-indigo-600 font-semibold hover:text-indigo-800">
                                            + Create New Article
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($news->hasPages())
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                    {{ $news->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection