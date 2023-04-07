<form action="{{ route('dashboard.submissions-check.destroy', $answer->id) }}" method="post" class="d-inline"
    onsubmit="return confirm('apakah anda yakin?')">
    @csrf
    <input type="hidden" name="_method" value="delete" />
    <button type="submit" class="btn btn-danger  delete" data-toggle="tooltip" data-placement="top"
        title="delete"><span class="fa fa-trash"></span></button>
</form>
