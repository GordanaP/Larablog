<form action="{{ $route }}" method="POST" class="form-inline">

    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-sm btn-danger shadow-sm">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>