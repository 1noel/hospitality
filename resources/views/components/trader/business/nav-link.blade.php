@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-4 py-2 text-sm font-medium text-closeryellow bg-yellow-50 dark:bg-yellow-900/50 rounded-md'
            : 'flex items-center px-4 py-2 text-sm font-medium text-gray-600 dark:text-gray-300 hover:text-closeryellow hover:bg-yellow-50 dark:hover:bg-yellow-900/50 rounded-md';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
