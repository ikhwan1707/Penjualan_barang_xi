@extends('layouts.app') 
@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Kategori</h1>
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
            <h3 class="card-title">Form Kategori</h3>
            <div class="card-tools">
              <a href="{{ route('kategori.index') }}" class="btn btn-sm btn-danger">
                Tutup
              </a>
            </div>
          </div>
          <div class="card-body">
            @if(count($errors) > 0)
            @foreach($errors->all() as $error)
                <div class="alert alert-warning">{{ $error }}</div>
            @endforeach
            @endif
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
            <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT"> 
                <div class="form-group">
                    <label for="nama_kategori">Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" value={{$kategori->nama_kategori}} required>
                    <p class="text-danger">{{ $errors->first('nama_kategori') }}</p>
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