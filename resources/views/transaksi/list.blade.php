@extends('layouts.app') 
@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Daftar Transaksi</h1>
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
                    <h4 class="card-title">Daftar Transaksi</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table-data">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>No faktur</th>
                                    <th>Total Pembelian</th>
                                    <th>Jumlah Pembayaran</th>
                                    <th>Jumlah kembalian</th>
                                    <th>Created At</th>
                                   {{--  <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $i => $v)
                                <tr>
                                    <td>{{$i+1}}</td>
                                    <td>{{ $v->no_faktur }}</td>
                                    <td>Rp {{ number_format($v->grand_total,2) }}</td>
                                    <td>Rp {{ number_format($v->pembayaran,2) }}</td>
                                    <td>Rp {{ number_format($v->kembalian,2) }}</td>
                                    <td>{{$v->created_at}}</td>
                                    <td>
                                        <a href="{{ route('transaksi.show', $v->id)}}" class="btn btn-info btn-sm" >Order Detail</a>
                                        
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
</section>
<script>
    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })
  </script>
@endsection