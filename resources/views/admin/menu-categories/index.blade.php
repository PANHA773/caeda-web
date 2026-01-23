@extends('admin.layouts.app')

@section('title', 'Menu Categories')

@section('content')
<div class="p-6 space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">Menu Categories</h2>
            <p class="text-sm text-gray-500">Manage navigation categories for the menu</p>
        </div>
        <a href="{{ route('admin.menu-categories.create') }}"
           class="px-5 py-2.5 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
            + Add Category
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="p-4 bg-green-100 text-green-700 rounded-lg shadow">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <div class="bg-white shadow-xl rounded-xl overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Order</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Icon</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Slug</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600 uppercase">Status</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600 uppercase">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @forelse($menuCategories as $category)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-semibold text-gray-700">
                            {{ $category->order }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-gray-100">
                                <i class="{{ $category->icon }} {{ $category->icon_color }} text-lg"></i>
                            </div>
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-800">
                            {{ $category->name }}
                        </td>

                        <td class="px-6 py-4 text-gray-500">
                            {{ $category->slug }}
                        </td>

                        <td class="px-6 py-4 text-center">
                            @if($category->is_active)
                                <span class="px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">
                                    Active
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded-full">
                                    Inactive
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-center space-x-2">
                            <a href="{{ route('admin.menu-categories.edit', $category) }}"
                               class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                Edit
                            </a>

                            <form action="{{ route('admin.menu-categories.destroy', $category) }}"
                                  method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                            No menu categories found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
