<form action="{{ route('karyawan.update', $karyawan->id) }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT"/>
    <div class="form-group">
        <label for="nama_karyawan">Nama Karyawan</label>
        <input type="text" name="nama_karyawan" class="form-control" value="{{ $karyawan->nama_karyawan}}" required>
        <p class="text-danger">{{ $errors->first('nama_karyawan') }}</p>
    </div>
    <div class="form-group">
        <label for="jenkel_karyawan">Jenis Kelamin</label>
        <input type="radio" name="jenkel_karyawan" value="laki-laki" {{$karyawan->jenkel_karyawan == 'laki-laki'? 'checked' : ''}} class="form-control" required>Laki-laki
        <input type="radio" name="jenkel_karyawan" value="perempuan" {{$karyawan->jenkel_karyawan == 'perempuan'? 'checked' : ''}} class="form-control" required>Perempuan
        <p class="text-danger">{{ $errors->first('jenkel_karyawan') }}</p>
    </div>
    <div class="form-group">
        <label for="no_hp_karyawan">No Handphone</label>
        <input type="text" name="no_hp_karyawan" class="form-control" value="{{ $karyawan->no_hp_karyawan}}" required>
        <p class="text-danger">{{ $errors->first('no_hp_karyawan') }}</p>
    </div>
    <div class="form-group">
        <label for="email_karyawan">Email Karyawan</label>
        <input type="text" name="email_karyawan" class="form-control" value="{{ $karyawan->email_karyawan}}" required>
        <p class="text-danger">{{ $errors->first('email_karyawan') }}</p>
    </div>
    <div class="form-group">
        <label for="alamat_karyawan">Alamat Karyawan</label>
        <textarea name="alamat_karyawan" class="form-control" required>{{ $karyawan->alamat_karyawan}}</textarea>
        <p class="text-danger">{{ $errors->first('alamat_karyawan') }}</p>
    </div>
    <div class="form-group">
        <label for="password">Password Karyawan</label>
        <input type="password" name="password" value="{{ $karyawan->password}}" class="form-control" required>
        <p class="text-danger">{{ $errors->first('password') }}</p>
    </div>
    <div class="form-group">
        <button class="btn btn-primary btn-sm">Ubah</button>
    </div>
</form>