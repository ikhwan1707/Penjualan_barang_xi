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
        <div class="col col-lg-6 col-md-6">
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Form Barang</h3>
                <div class="card-tools">
                <a href="{{ route('barang.index') }}" class="btn btn-sm btn-danger">
                    Tutup
                </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('barang.update', $barang->id) }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-group">
                        <label for="code_barang">Kode Barang</label>
                        <input type="text" name="code_barang" class="form-control" value="{{ $barang->code_barang }}" required>
                        <p class="text-danger">{{ $errors->first('code_barang') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required>
                        <p class="text-danger">{{ $errors->first('nama_barang') }}</p>
                    </div>
                    <div class="form-group">
                        <label class="kategori_id">Kategori barang</label> 
                        <select class="form-control" name="kategori_id">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $k) 
                            <option value="{{ $k->id }}" @if ($barang->kategori_id==$k->id) selected @endif>{{ $k->nama_kategori }}</option> 
                        @endforeach
                        </select>
                        <p class="text-danger">{{ $errors->first('kategori_id') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="stock_barang">Stok Barang</label>
                        <input type="number" name="stock_barang" class="form-control" value="{{ $barang->stock_barang }}" required>
                        <p class="text-danger">{{ $errors->first('stock_barang') }}</p>
                    </div>
                    <div class="form-group">
                        <label for="harga_barang">Harga Barang</label>
                        <input type="number" name="harga_barang" class="form-control" value="{{ $barang->harga_barang }}" required>
                        <p class="text-danger">{{ $errors->first('harga_barang') }}</p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-sm">Ubah</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>
@endsection