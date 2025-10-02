@props(['small' => false])

@php
    $positionClasses = $small ? 'bottom-3 left-3' : 'bottom-4 left-4';
    $labelClasses = $small ? 'px-.1 text-[13px]' : 'px-.1 text-xl';
@endphp

<div class="pointer-events-none absolute {{ $positionClasses }} space-y-1 text-left">
    <span class="inline-block rounded-md {{ $labelClasses }} py-1 font-semibold uppercase tracking-wide text-white">
        DUKUNGAN 24 JAM
    </span>
    <span class="block text-xs font-medium text-indigo-100 underline decoration-indigo-200">Klik Disini</span>
</div>
