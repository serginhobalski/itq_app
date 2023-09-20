<a class="btn btn-sm btn-dark text-info"
    href="{{ url('adm/usuarios/{$id}') }}" title="Ver detalhes">
    <i class="fa-solid fa-eye"></i>
</a>
<a class="btn btn-sm btn-dark text-success"
    href="{{ url('adm/usuarios/{$id}/edit') }}" title="Editar">
    <i class="fa-solid fa-pen-to-square"></i>
</a>
<form action="{{ url('adm/usuarios/{$id}') }}" method="post">
    @csrf
    @method('DELETE')
    <button class="btn btn-sm btn-dark text-danger"  id="delete" name="delete" type="submit" title="Deletar">
        <i class="fa-solid fa-trash-can"></i>
    </button>
</form>
