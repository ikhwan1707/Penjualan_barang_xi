@extends('layouts.app') 
@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Invoice</h1>
        </div><!-- /.col -->
        
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> SMK Informatika Utama
                  <small class="float-right">Date: {{ $orders->created_at}}</small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                <b>Invoice #{{ $orders->no_faktur }}</b><br>
                <b>Order ID:{{ $orders->id }}</b> <br>
              </div>
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped">
                  <thead>
                  <tr>
                      <th>Barang</th>
                      <th>Qty</th>
                      <th>Harga</th>
                      <th>Subtotal</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($orders_ as $i => $v)
                      <tr>
                        <td>{{$v->nama_barang}}</td>
                        <td>{{$v->qty}}</td>
                        <td>{{ number_format($v->harga_barang,2) }}</td>
                        <td>{{ number_format($v->total,2) }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <div class="col-6">
              </div>
              <!-- /.col -->
              <div class="col-6">
                <div class="table-responsive">
                  <table class="table">
                    <tr>
                      <th style="width:50%">Subtotal:</th>
                      <td>{{ number_format($v->total,2) }}</td>
                    </tr>
                    <tr>
                      <th>Pembarayan:</th>
                      <td>{{ number_format($v->pembayaran,2) }}</td>
                    </tr>
                    <tr>
                      <th>Kembalian:</th>
                      <td>{{ number_format($v->kembalian,2) }}</td>
                    </tr>
                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-12">
                <a href="{{ route('transaksi.list') }}" class="btn btn-sm btn-danger">
                  Kembali
                </a>
                <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-success float-right"><i class="fas fa-print"></i> Cetak Invoice</a>
              </div>
            </div>
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection