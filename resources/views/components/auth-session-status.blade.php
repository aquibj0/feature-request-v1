@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-md text-green-600 status-flash']) }}>
        {{ $status }}
        {{-- <span class="text-end"> --}}
            <button type="button" class="btn-close text-end" style="font-size: .7rem" onclick="$(this).parent().hide()" aria-label="Close"></button>
        {{-- </span> --}}
    </div>
@endif
