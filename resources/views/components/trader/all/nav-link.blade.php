@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-4 py-2 text-sm font-medium text-closeryellow bg-yellow-50 rounded-md group'
            : 'flex items-center px-4 py-2 text-sm font-medium text-gray-600 hover:text-closeryellow hover:bg-yellow-50 rounded-md group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    @if (isset($icon))
        <span class="mr-3">
            {{ $icon }}
        </span>
    @endif
    {{ $slot }}
</a>
