<h1>Edit Permission</h1>

<form action="/admin/permission/{{ $permission->id }}"
      method="POST">

    @csrf
    @method('PUT')

    <!-- NAMA PERMISSION -->
    <label>Nama Permission</label>
    <br>

    <input type="text"
           name="nama_permission"
           value="{{ $permission->nama_permission }}">

    <br><br>

    <button type="submit">
        Update
    </button>

</form>