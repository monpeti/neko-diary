{{-- submit用 --}}

<button
    type="{{ $type ?? 'button' }}"
    class="btn btn-primary custom-btn">

    {{ $slot }}
</button>