<form action = "/simpan" method = "POST">
    @csrf
    <button type = "submit"> Simpan Data POST (POST)</button>
</form>

<form action = "/update/1" method = "PUT">
    @csrf
    @method('PUT')
    <button type = "submit"> Update Data PUT (PUT)</button>
</form>

<form action = "/update2/1" method = "PATCH">
    @csrf
    @method('PATCH')
    <button type = "submit"> Update Data PATCH (PATCH)</button>
</form>

<form action = "/hapus/1" method = "DELETE">
    @csrf
    @method('DELETE')
    <button type = "submit"> Hapus Data DELETE (DELETE)</button>
</form>