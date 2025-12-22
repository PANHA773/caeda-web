@extends('admin.layouts.app')

@section('title', 'Pricing Plans')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
        <h1 class="text-2xl font-bold text-gray-800">Pricing Plans</h1>

        <a href="{{ route('admin.pricing.create') }}"
           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
            + Add Plan
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="bg-white shadow rounded-lg overflow-x-auto">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">#</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Name</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Monthly</th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-600">Annual</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-600">Popular</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-600">Active</th>
                    <th class="px-4 py-3 text-center text-sm font-semibold text-gray-600">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse($plans as $index => $plan)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 font-medium text-gray-800">
                            {{ $plan->name }}
                        </td>
                        <td class="px-4 py-3">${{ number_format($plan->monthly_price, 2) }}</td>
                        <td class="px-4 py-3">${{ number_format($plan->annual_price, 2) }}</td>

                        <td class="px-4 py-3 text-center">
                            @if($plan->is_popular)
                                <span class="px-2 py-1 text-xs font-semibold text-white bg-purple-600 rounded-full">
                                    Popular
                                </span>
                            @else
                                <span class="text-gray-400 text-sm">—</span>
                            @endif
                        </td>

                        <td class="px-4 py-3 text-center">
                            @if($plan->is_active)
                                <span class="px-2 py-1 text-xs font-semibold text-white bg-green-600 rounded-full">
                                    Active
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs font-semibold text-white bg-red-600 rounded-full">
                                    Inactive
                                </span>
                            @endif
                        </td>

                        <td class="px-4 py-3 text-center space-x-2">
                            <a href="{{ route('admin.pricing.edit', $plan->id) }}"
                               class="inline-flex items-center px-3 py-1 text-sm bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                Edit
                            </a>

                            <form action="{{ route('admin.pricing.destroy', $plan->id) }}"
                                  method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this plan?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-flex items-center px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-gray-500">
                            No pricing plans found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
