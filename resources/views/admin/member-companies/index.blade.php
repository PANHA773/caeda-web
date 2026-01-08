
@extends('admin.layouts.app')

@section('title', 'Member Companies')

@section('content')
<div class="max-w-7xl mx-auto">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Member Companies</h1>
            <p class="text-gray-500 mt-1">Manage all companies in our community section</p>
        </div>

        <a href="{{ route('admin.member-companies.create') }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl hover:from-green-600 hover:to-emerald-700 transition-all shadow-sm hover:shadow-md">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Add New Company
        </a>
    </div>

    {{-- Search --}}
    <div class="flex items-center gap-3 mb-4">
        <form action="{{ route('admin.member-companies.index') }}" method="GET" class="flex items-center gap-2 w-full">
            <input type="text" name="search" placeholder="Search companies..." value="{{ request('search') }}"
                class="flex-1 pl-4 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">Search</button>
        </form>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Logo</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Industry</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Members</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider">Color</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($memberCompanies as $company)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-2xl">{!! $company->logo !!}</td>
                        <td class="px-6 py-4 font-semibold text-gray-800">{{ $company->name }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $company->industry }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $company->members }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-block w-6 h-6 rounded-full bg-gradient-to-r {{ $company->color }}"></span>
                        </td>
                        <td class="px-6 py-4 text-right flex justify-end gap-2">
                            <a href="{{ route('admin.member-companies.edit', $company) }}" class="px-3 py-1 text-white bg-yellow-500 rounded-lg hover:bg-yellow-600 transition">Edit</a>
                            <form action="{{ route('admin.member-companies.destroy', $company) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this company?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 text-white bg-red-500 rounded-lg hover:bg-red-600 transition">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-400">
                            No member companies found. <a href="{{ route('admin.member-companies.create') }}" class="text-blue-500 underline">Add one now</a>.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($memberCompanies->hasPages())
        <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Showing {{ $memberCompanies->firstItem() }} to {{ $memberCompanies->lastItem() }} of {{ $memberCompanies->total() }} results
            </div>
            <div class="flex gap-1">
                {{ $memberCompanies->links() }}
            </div>
        </div>
        @endif
    </div>

</div>
@endsection
