@props([
    'label' => '',
    'name' => '',
    'type' => 'text',
    'placeholder' => '',
    'required' => false,
    'icon' => null, // pass <i class="fas fa-user"></i> for example
])

<div class="mb-4">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700 mb-2">
            {{ $label }} @if($required)<span class="text-red-500">*</span>@endif
        </label>
    @endif

    <div class="relative">
        @if($icon)
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                {!! $icon !!}
            </div>
        @endif

        <input
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            placeholder="{{ $placeholder }}"
            {{ $required ? 'required' : '' }}
            {{ $attributes->merge([
                'class' => 'w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 bg-white/50'
            ]) }}
        >
    </div>
</div>
