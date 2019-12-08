<li class="nav-item">
    <a class="nav-link collapsed px-3 py-1" href="#" data-toggle="collapse"
    data-target="#collapse{{ $id }}" aria-expanded="true"
    aria-controls="collapse{{ $id }}">
        <i class="fas {{ $icon }}"></i>
        <span>{{ $id }}</span>
    </a>

    <div id="collapse{{ $id }}" class="collapse" aria-labelledby="heading{{ $id }}"
    data-parent="#accordionSidebar">
        <div class="bg-white px-2 py-1 collapse-inner rounded">
            {{ $slot }}
        </div>
    </div>
</li>