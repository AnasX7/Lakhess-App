@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-2 py-2 px-4 text-sm font-regular text-fg-secondary-hover dark:text-fg-secondary-dark-hover rounded-lg bg-bg-active dark:bg-bg-active-dark'
            : 'flex items-center gap-2 py-2 px-4 text-sm font-regular text-fg-secondary dark:text-fg-secondary-dark rounded-lg hover:bg-bg-active hover:text-fg-secondary-hover dark:hover:bg-bg-active-dark dark:hover:text-fg-secondary-dark-hover';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
