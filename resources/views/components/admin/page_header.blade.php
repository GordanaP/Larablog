<div class="flex justify-between items-center mb-2">
    <h3 class="h3">
        {{ ucfirst($title) }}

        @if (isset($records_count))
            <span class="text-2xl font-thin">
                ({{ $records_count }})
            </span>
        @endif
    </h3>

    {{ $slot }}
</div>