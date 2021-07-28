{{-- set default value --}}
@props(['active' => false])

@php
$classes = 'block text-sm leading-6 hover:bg-gray-300 ';
if ($active) {
    $classes .= 'bg-red-200';
}
@endphp

<a {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</a>
