@extends('admin.layouts.app')

@section('title', 'Final CTA')

@section('content')
<div class="max-w-7xl mx-auto space-y-8">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Final Call To Action</h1>
            <p class="text-sm text-gray-500">
                Manage the CTA section displayed on the homepage
            </p>
        </div>

        {{-- Add CTA --}}
        <a href="{{ route('admin.final-cta.create') }}"
           class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-5 py-2.5 rounded-xl shadow transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 4v16m8-8H4"/>
            </svg>
            Add CTA
        </a>
    </div>

    {{-- CTA Cards --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @forelse($ctas as $cta)
            <div class="relative bg-white rounded-2xl shadow-sm border hover:shadow-md transition overflow-hidden">

                {{-- Status Badge --}}
                <div class="absolute top-4 right-4">
                    @if($cta->is_active)
                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">
                            Active
                        </span>
                    @else
                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-500">
                            Inactive
                        </span>
                    @endif
                </div>

                {{-- Card Body --}}
                <div class="p-6 space-y-5">

                    {{-- Stats --}}
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div class="bg-gray-50 rounded-xl py-3">
                            <div class="text-lg font-bold text-indigo-600">{{ $cta->stat_1_number }}</div>
                            <div class="text-xs text-gray-500">{{ $cta->stat_1_label }}</div>
                        </div>
                        <div class="bg-gray-50 rounded-xl py-3">
                            <div class="text-lg font-bold text-indigo-600">{{ $cta->stat_2_number }}</div>
                            <div class="text-xs text-gray-500">{{ $cta->stat_2_label }}</div>
                        </div>
                        <div class="bg-gray-50 rounded-xl py-3">
                            <div class="text-lg font-bold text-indigo-600">{{ $cta->stat_3_number }}</div>
                            <div class="text-xs text-gray-500">{{ $cta->stat_3_label }}</div>
                        </div>
                    </div>

                    {{-- Title --}}
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">
                            {{ $cta->title }}
                        </h3>
                        <p class="text-sm text-gray-500 mt-1">
                            {{ $cta->description }}
                        </p>
                    </div>

                    {{-- Buttons --}}
                    <div class="flex gap-3 flex-wrap">
                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-indigo-50 text-indigo-600 text-xs font-medium">
                            {{ $cta->primary_button_text }}
                        </span>
                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-gray-100 text-gray-600 text-xs font-medium">
                            {{ $cta->secondary_button_text }}
                        </span>
                    </div>

                </div>

                {{-- Actions --}}
                <div class="border-t px-6 py-4 flex justify-between items-center bg-gray-50">
                    <div class="text-xs text-gray-400">
                        Updated {{ $cta->updated_at->diffForHumans() }}
                    </div>

                    <div class="flex gap-2">

                        {{-- Edit --}}
                        <a href="{{ route('admin.final-cta.edit', $cta->id) }}"
                           class="px-4 py-2 text-sm font-medium rounded-lg bg-white border hover:bg-gray-100 transition">
                            Edit
                        </a>

                        {{-- Activate / Deactivate --}}
                        <form method="POST"
                              action="{{ route('admin.final-cta.toggle', $cta->id) }}">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium rounded-lg
                                {{ $cta->is_active
                                    ? 'bg-red-50 text-red-600 hover:bg-red-100'
                                    : 'bg-green-50 text-green-600 hover:bg-green-100' }}">
                                {{ $cta->is_active ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>

                        {{-- Delete --}}
                        <form method="POST"
                              action="{{ route('admin.final-cta.destroy', $cta->id) }}"
                              onsubmit="return confirm('Are you sure you want to delete this CTA?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 text-sm font-medium rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200 transition">
                                Delete
                            </button>
                        </form>

                    </div>
                </div>

            </div>
        @empty
            <div class="col-span-full text-center py-20 bg-white rounded-2xl border">
                <p class="text-gray-500">No Final CTA found.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection
