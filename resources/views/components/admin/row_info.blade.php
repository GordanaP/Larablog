<tr>
    <td class="font-semibold w-1/4">
        @if (isset($name))
            {{ $name }}
        @else
            <i class="fas fa-cog"></i>
        @endif
    </td>
    <td>{{ $slot }}</td>
</tr>