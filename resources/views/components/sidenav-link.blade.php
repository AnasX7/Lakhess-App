@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-2 py-2 px-4 text-sm font-semibold text-fg-secondry-hover dark:text-fg-secondry-dark-hover rounded-lg bg-bg-active dark:bg-bg-active-dark'
            : 'flex items-center gap-2 py-2 px-4 text-sm font-semibold text-fg-secondry dark:text-fg-secondry-dark rounded-lg hover:bg-bg-active hover:text-fg-secondry-hover dark:hover:bg-bg-active-dark dark:hover:text-fg-secondry-dark-hover';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
