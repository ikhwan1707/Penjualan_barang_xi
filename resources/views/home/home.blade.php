@extends('layouts.app') 
@section('content')
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-6 col-lg-4">
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3>{{ $countorder }}</h3>
        
                  <p>Daftar Transaksi</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="/list-transaksi" class="small-box-footer">Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-6 col-lg-4">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $countbarang}}</h3>
        
                  <p>Barang</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/barang" class="small-box-footer">Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-6 col-lg-4">
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$countkaryawan}}</h3>
        
                  <p>Karyawan</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="/karyawan" class="small-box-footer">Info Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
          <!-- /.row -->
          
          <!-- table produk baru -->
          <div class="row">
            <div class="col-4">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Kategori Baru</h4>
                  <div class="card-tools">
                    <a href="/kategori" class="btn btn-sm btn-primary">
                      Lainnya
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Kategori</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($kategori as $i => $v)
                        <tr> 
                            <td>{{ $v->nama_kategori }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-8">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Barang Baru</h4>
                  <div class="card-tools">
                    <a href="/barang" class="btn btn-sm btn-primary">
                      Lainnya
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Code Barang</th> 
                        <th>Nama Barang</th> 
                        <th>Kategori</th> 
                        <th>Harga</th> 
                        <th>Stock</th> 
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($barang as $i => $v)
                        <tr> 
                            <td>{{ $v->code_barang }}</td>
                            <td>{{ $v->nama_barang }}</td>
                            <td>{{ $v->kategori->nama_kategori}}</td>
                            <td>{{ number_format($v->harga_barang,2) }}</td>
                            <td>{{ $v->stock_barang }}</td>
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
@endsection