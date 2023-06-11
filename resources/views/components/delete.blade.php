<form action="{{$action}}" method="POST" class=" d-inline">
    @csrf
    @method('delete')
    <button class="btn btn-danger btn-sm" type="submit" name="submit">
        <i class="material-icons">delete</i>
    </button>
</form>
