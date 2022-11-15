<a href="{{ route('karyawan.create') }}">Tambah Karyawan</a>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Karyawan</th>
            <th>Jenis Kelamin</th>
            <th>No Handphone</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Created At</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
         @foreach ($karyawan as $i => $v)
         <tr>
             <td>{{$i+1}}</td>
             <td>{{$v->nama_karyawan}}</td>
             <td>{{$v->jenkel_karyawan}}</td>
             <td>{{$v->no_hp_karyawan}}</td>
             <td>{{$v->email_karyawan}}</td>
             <td>{{$v->alamat_karyawan}}</td>
             <td>{{$v->created_at}}</td>
             <td>
                <form action="{{ route('karyawan.destroy', $v->id) }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE"> 
                    <a href="{{ route('karyawan.edit', $v->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
             </td>
         </tr>
         @endforeach
    </tbody>
</table>