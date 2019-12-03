<div id="card{{ $records ?? ucfirst($title) }}">
    <div class="flex justify-between items-center mb-2">
        <h3 class="h4">
            <span>{{ ucfirst($title) }}</span>

            @if (isset($count))
                <span class="text-2xl font-thin">
                    ({{ $count }})
                </span>
            @endif
        </h3>

        {{ $slot }}
    </div>
</div>
