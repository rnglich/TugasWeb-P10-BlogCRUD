@props(['type' => 'success', 'text' => null])

@php
    $display = $text ?? session($type) ?? (isset($slot) && trim($slot) !== '' ? trim($slot) : null);
@endphp

@if($display)
    <article
        {{ $attributes->merge(['class' => 'border-2 sm:border-4 border-black p-3 sm:p-4 mb-4 sm:mb-6 animate-slide-down break-words ' . ($type === 'success' ? 'bg-yellow-400 text-black' : ($type === 'error' ? 'bg-red-500 text-white' : 'bg-blue-400 text-black'))]) }}
        role="alert"
        aria-live="polite"
    >
        <p class="font-bold text-sm sm:text-lg tracking-wide break-words">{{ $display }}</p>
    </article>
@endif