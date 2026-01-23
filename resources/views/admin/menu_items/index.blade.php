@extends('admin.layouts.app')

@section('title', 'Menu Items')

@section('content')
<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold">Menu Items</h2>
            <p class="text-sm text-gray-500">Manage goods and menu entries</p>
        </div>
        <a href="{{ route('admin.menu_items.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg">+ Add Item</a>
    </div>

    @if(session('success'))
        <div class="p-3 bg-green-100 text-green-700 mb-4 rounded">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600 text-xs uppercase">
                <tr>
                    <th class="px-4 py-3 text-left">Image</th>
                    <th class="px-4 py-3 text-left">Title</th>
                    <th class="px-4 py-3 text-left">Category</th>
                    <th class="px-4 py-3 text-left">Price</th>
                    <th class="px-4 py-3 text-center">Status</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($items as $item)
                <tr>
                    <td class="px-4 py-3">
                        @if($item->image)
                            <img src="{{ asset('storage/'.$item->image) }}" class="w-20 h-16 object-cover rounded">
                        @else
                            <div class="w-20 h-16 bg-gray-100 rounded flex items-center justify-center text-gray-400">No</div>
                        @endif
                    </td>
                    <td class="px-4 py-3">{{ $item->title }}</td>
                    <td class="px-4 py-3">{{ $item->category->name ?? '—' }}</td>
                    <td class="px-4 py-3">${{ number_format($item->price,2) }}</td>
                    <td class="px-4 py-3 text-center">{{ $item->is_active ? 'Active' : 'Hidden' }}</td>
                    <td class="px-4 py-3 text-center">
                        <a href="{{ route('admin.menu_items.edit', $item) }}" class="px-3 py-1 bg-blue-100 text-blue-700 rounded">Edit</a>
                        <form action="{{ route('admin.menu_items.destroy', $item) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-100 text-red-700 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-6 text-center text-gray-500">No items found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">{{ $items->links() }}</div>
</div>
@endsection
