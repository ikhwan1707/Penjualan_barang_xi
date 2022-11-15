@extends('layouts.app')
@section('content')
<div class="content-header">
  <div class="container-fluid">
  <div class="row mb-2">
      <div class="col-sm-6">
      <h1 class="m-0">Barang</h1>
      </div><!-- /.col -->
      
  </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Barang</h4>
                <div class="card-tools">
                    <a href="{{ route('barang.create') }}" class="btn btn-sm btn-primary">
                    Baru
                    </a>
                </div>
              </div>
              <div class="card-body">
                @if ($message = Session::get('error'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> {{ $message }}
                    </div>
                @endif
                @if ($message = Session::get('Success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ $message }}
                    </div>
                @endif
                <div class="table-responsive">
                  <table class="table table-striped" id="table-data">
                    <thead>
                      <tr> 
                          <th>No</th> 
                          <th>Code Barang</th> 
                          <th>Nama Barang</th> 
                          <th>Kategori</th> 
                          <th>Harga</th> 
                          <th>Stock</th> 
                          <th>Created at</th> 
                          <th>Aksi</th> 
                      </tr> 
                    </thead>
                    <tbody>
                      @foreach ($barang as $i => $v)
                          <tr> 
                              <td>{{ $i+1 }}</td>
                              <td>{{ $v->code_barang }}</td>
                              <td>{{ $v->nama_barang }}</td>
                              <td>{{ $v->kategori->nama_kategori}}</td>
                              <td>{{ $v->harga_barang }}</td>
                              <td>{{ $v->stock_barang }}</td>
                              <td>{{ $v->created_at }}</td>
                              <td>
                                <form action="{{ route('barang.destroy', $v->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE"> 
                                    <a href="{{ route('barang.edit', $v->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                              </td>
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
</section>
@endsection