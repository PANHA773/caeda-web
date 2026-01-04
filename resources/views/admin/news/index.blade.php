@extends('admin.layouts.app')

@section('title', 'News')

@section('content')
<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">News</h1>
        <a href="{{ route('admin.news.create') }}" class="px-4 py-2 btn-gradient rounded text-white">+ New Article</a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif

    <div class="card overflow-hidden">
        <table class="w-full border-collapse">
            <thead class="bg-gray-50">
                <tr class="text-left text-sm text-gray-600">
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Published</th>
                    <th class="px-4 py-3">Likes</th>
                    <th class="px-4 py-3">Comments</th>
                    <th class="px-4 py-3">Shares</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $item)
                    <tr class="border-t">
                        <td class="px-4 py-3">{{ $item->title }}</td>
                        <td class="px-4 py-3">{{ optional($item->published_at)->format('Y-m-d') }}</td>
                        <td class="px-4 py-3">{{ $item->likes }}</td>
                        <td class="px-4 py-3">{{ $item->comments }}</td>
                        <td class="px-4 py-3">{{ $item->shares }}</td>
                        <td class="px-4 py-3">
                            <a href="{{ route('admin.news.edit', $item->id) }}" class="px-3 py-1 bg-blue-600 text-white rounded">Edit</a>
                            <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this article?');">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 bg-red-500 text-white rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $news->links() }}
    </div>
</div>
@endsection
