<form action="{{ route($route, $id) }}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger" onclick="return confirm('{{ $message }}')"><i class="fas fa-trash" aria-hidden="true"></i></button>
</form>
