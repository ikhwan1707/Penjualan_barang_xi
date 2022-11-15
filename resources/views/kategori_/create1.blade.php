<form action="{{ route('kategori.store') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="nama_kategori">Kategori</label>
       <input type="text" name="nama_kategori" class="form-control" required>
        <p class="text-danger">{{ $errors->first('nama_kategori') }}</p>
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-sm">Tambah</button>
    </div>
</form>