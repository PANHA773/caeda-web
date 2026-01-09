
@extends('admin.layouts.app')

@section('title', 'Contact Methods')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Contact Methods</h1>
            <p class="text-gray-500 text-sm">
                Manage your website contact information
            </p>
        </div>

        <a href="{{ route('admin.contact-information.create') }}"
           class="inline-flex items-center justify-center
                  bg-blue-600 hover:bg-blue-700 text-white
                  px-5 py-2.5 rounded-lg font-semibold
                  transition">
            <i class="fas fa-plus mr-2"></i> Add Contact Method
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Icon</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">Content</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-600 uppercase">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @forelse($contacts as $contact)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-800">{{ $contact->title }}</td>
                        <td class="px-6 py-4"><i class="{{ $contact->icon }}"></i></td>
                        <td class="px-6 py-4">{!! $contact->content !!}</td>
                        <td class="px-6 py-4 text-center">
                            @if($contact->is_active)
                                <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">Active</span>
                            @else
                                <span class="px-3 py-1 text-xs rounded-full bg-gray-200 text-gray-600">Disabled</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.contact-information.edit', $contact->id) }}"
                               class="inline-flex items-center px-3 py-1.5 bg-yellow-500 hover:bg-yellow-600 text-white text-sm rounded">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.contact-information.destroy', $contact->id) }}"
                                  method="POST" class="inline-block" onsubmit="return confirm('Delete this contact method?')">
                                @csrf
                                @method('DELETE')
                                <button class="inline-flex items-center px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-sm rounded">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-400">No contact methods found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $contacts->links() }}
        </div>
    </div>
</div>
@endsection
