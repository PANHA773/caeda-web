@extends('admin.layouts.app')

@section('title', 'FAQs')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white rounded-xl shadow">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">FAQs</h1>

        <a href="{{ route('admin.faqs.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
            + Add FAQ
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-200 rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">#</th>
                    <th class="p-3 text-left">Question</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($faqs as $faq)
                <tr class="border-t">
                    <td class="p-3">{{ $loop->iteration }}</td>
                    <td class="p-3 font-medium">{{ $faq->question }}</td>
                    <td class="p-3">
                        @if($faq->is_active)
                            <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-sm">
                                Active
                            </span>
                        @else
                            <span class="px-2 py-1 bg-red-100 text-red-700 rounded text-sm">
                                Inactive
                            </span>
                        @endif
                    </td>
                    <td class="p-3 text-center flex justify-center gap-2">
                        <a href="{{ route('admin.faqs.edit', $faq) }}"
                           class="px-3 py-1 bg-yellow-500 text-white rounded">
                            Edit
                        </a>

                        <form action="{{ route('admin.faqs.destroy', $faq) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this FAQ?')">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-600 text-white rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-6 text-center text-gray-500">
                        No FAQs found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $faqs->links() }}
    </div>

</div>
@endsection
