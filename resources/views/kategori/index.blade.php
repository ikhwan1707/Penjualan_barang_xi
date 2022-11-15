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
            <div class="col">
                <div class="card">
                    <div class="card-header">
                    <h4 class="card-title">Kategori</h4>
                    <div class="card-tools">
                        <a href="{{ route('kategori.create') }}" class="btn btn-sm btn-primary">
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
                                        <th>#</th>
                                        <th>Kategori</th>
                                        <th>Created At</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $i => $v)
                                    <tr>
                                        <td>{{$i+1}}</td>
                                        <td>{{$v->nama_kategori}}</td>
                                        <td>{{$v->created_at}}</td>
                                        <td>
                                            <form action="{{ route('kategori.destroy', $v->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE"> 
                                                <a href="{{ route('kategori.edit', $v->id) }}" class="btn btn-warning btn-sm">Ubah</a>
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