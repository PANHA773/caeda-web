@extends('admin.layouts.app')

@section('content')
<div class="p-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Testimonials
        </h1>

        <a href="{{ route('admin.testimonials.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
            + Add Testimonial
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">
                        #
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">
                        User
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">
                        Quote
                    </th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600">
                        Rating
                    </th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600">
                        Status
                    </th>
                    <th class="px-6 py-3 text-right text-sm font-semibold text-gray-600">
                        Actions
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @forelse($testimonials as $index => $testimonial)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            {{ $index + 1 }}
                        </td>

                        {{-- User --}}
                        <td class="px-6 py-4 flex items-center gap-3">
                            <img
                                src="{{ $testimonial->avatar }}"
                                class="w-10 h-10 rounded-full object-cover border"
                            >
                            <div>
                                <p class="font-semibold text-gray-800">
                                    {{ $testimonial->name }}
                                </p>
                                <p class="text-sm text-gray-500">
                                    {{ $testimonial->role }}
                                </p>
                            </div>
                        </td>

                        {{-- Quote --}}
                        <td class="px-6 py-4 max-w-md">
                            <p class="text-gray-600 line-clamp-2">
                                "{{ $testimonial->quote }}"
                            </p>
                        </td>

                        {{-- Rating --}}
                        <td class="px-6 py-4 text-center">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="{{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}">
                                    ★
                                </span>
                            @endfor
                        </td>

                        {{-- Status --}}
                        <td class="px-6 py-4 text-center">
                            @if($testimonial->status)
                                <span class="px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">
                                    Active
                                </span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold bg-gray-200 text-gray-600 rounded-full">
                                    Hidden
                                </span>
                            @endif
                        </td>

                        {{-- Actions --}}
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                               class="inline-flex items-center px-3 py-1 text-sm bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200">
                                Edit
                            </a>

                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                                  method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Delete this testimonial?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 text-sm bg-red-100 text-red-700 rounded hover:bg-red-200">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                            No testimonials found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
