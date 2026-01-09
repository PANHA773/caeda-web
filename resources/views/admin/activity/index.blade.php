@extends('admin.layouts.app')

@section('title', 'Recent Activity')

@section('content')
<div class="max-w-5xl mx-auto px-6 py-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Recent Activity</h1>
            <p class="text-gray-500">All recent changes across the site</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-600">Back to Dashboard</a>
    </div>

    <div class="bg-white border rounded-xl shadow p-4">
        @if($activities->count())
            <ul class="divide-y">
                @foreach($activities as $act)
                <li class="p-4 flex items-start justify-between">
                    <div>
                        <div class="text-sm text-gray-700">
                            <span class="font-medium">{{ $act['user'] }}</span>
                            <span class="text-indigo-600 font-medium"> updated </span>
                            <span class="font-semibold">{{ $act['model'] }}</span>
                            <span class="text-gray-600"> — {{ $act['label'] }}</span>
                        </div>
                        <div class="text-xs text-gray-400 mt-1">{{ \Carbon\Carbon::parse($act['time'])->toDayDateTimeString() }}</div>
                    </div>
                    <div class="text-sm text-gray-500">
                        ID: {{ $act['id'] ?? '—' }}
                    </div>
                </li>
                @endforeach
            </ul>

            <div class="mt-4">
                {{ $activities->links() }}
            </div>
        @else
            <p class="text-center text-gray-500 p-8">No recent activity found.</p>
        @endif
    </div>
</div>
@endsection
