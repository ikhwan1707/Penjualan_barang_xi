<form action="{{ route('karyawan.store') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="nama_karyawan">Nama Karyawan</label>
        <input type="text" name="nama_karyawan" class="form-control" required>
        <p class="text-danger">{{ $errors->first('nama_karyawan') }}</p>
    </div>
    <div class="form-group">
        <label for="jenkel_karyawan">Jenis Kelamin</label>
        <input type="radio" name="jenkel_karyawan" value="laki-laki" class="form-control" required>Laki-laki
        <input type="radio" name="jenkel_karyawan" value="perempuan" class="form-control" required>Perempuan
        <p class="text-danger">{{ $errors->first('jenkel_karyawan') }}</p>
    </div>
    <div class="form-group">
        <label for="no_hp_karyawan">No Handphone</label>
        <input type="text" name="no_hp_karyawan" class="form-control" required>
        <p class="text-danger">{{ $errors->first('no_hp_karyawan') }}</p>
    </div>
    <div class="form-group">
        <label for="email_karyawan">Email Karyawan</label>
        <input type="text" name="email_karyawan" class="form-control" required>
        <p class="text-danger">{{ $errors->first('email_karyawan') }}</p>
    </div>
    <div class="form-group">
        <label for="alamat_karyawan">Alamat Karyawan</label>
        <textarea name="alamat_karyawan" class="form-control" required></textarea>
        <p class="text-danger">{{ $errors->first('alamat_karyawan') }}</p>
    </div>
    <div class="form-group">
        <label for="password">Password Karyawan</label>
        <input type="password" name="password" class="form-control" required>
        <p class="text-danger">{{ $errors->first('password') }}</p>
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-sm">Tambah</button>
    </div>
</form>