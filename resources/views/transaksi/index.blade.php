@extends('layouts.app') 
@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Transaksi</h1>
        </div><!-- /.col -->
        
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
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

                        <div class="form-group">
                            <form class="row g-3 mt-3" action="{{ route('transaksi.store')}}" method="POST">
                                {{ csrf_field() }}
                                <label for="input" class="col-sm-2 col-form-label">Barang</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="barang_id" required>
                                            <option value="">Pilih Barang</option>
                                            @foreach ($barang as $product)
                                                <option value="{{ $product->id }}"> {{ $product->nama_barang }} </option>
                                            @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('barang_id') }}</p>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-success">Tambah Item</button>
                                </div>
                            </form>
                        </div>

                        <div class="card-body border-top pb-5 p-0 mt-3">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">qty</th>
                                        <th scope="col">Harga/Qty</th>
                                        <th scope="col" style="width: 200px;">Total</th>
                                        <th scope="col" style="width: 10px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                                @foreach ($transaction as $i => $v)
                                    <tr>
                                        <td>{{$i+1}}</td>
                                        <td>{{$v->barang->nama_barang}}</td>
                                        <td>
                                            <div>
                                                <div class="btn-group" role="group">
                                                    @if ($v->qty > 1)
                                                    <form action="{{ route('transaksi.update',$v->id) }}" method="post">
                                                        <input type="hidden" name="_method" value="patch">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="param" value="kurang">
                                                        <button class="btn btn-primary btn-sm">
                                                        -
                                                        </button>
                                                    </form>
                                                    @endif

                                                    <button class="btn btn-outline-primary btn-sm" disabled="true">
                                                        {{ number_format($v->qty,2) }}
                                                    </button>

                                                    <form action="{{ route('transaksi.update',$v->id) }}" method="post">
                                                        <input type="hidden" name="_method" value="patch">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="param" value="tambah">
                                                        <button class="btn btn-primary btn-sm">
                                                        +
                                                        </button>
                                                    </form>
                                                    </div>
                                            </div>
                                        </td>
                                        <td>Rp. {{ number_format($v->barang->harga_barang,2)}}</td>
                                        <td>Rp. {{ number_format($v->total,2)}}</td>
                                        <td>
                                            <form action="{{ route('transaksi.destroy', $v->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <tfoot>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align:right;">Total Pembelian</td>
                                    <td>
                                        <input type="hidden" value="{{ $transaction->sum('total') }}" id="gtotal"/>
                                        Rp {{ number_format($transaction->sum('total'),2) }}
                                    </td>
                                    <tr>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="text-align:right;">Pembayaran</td>
                                        <td style="text-align:right;">
                                            <input type="number" id="pembayaran" name="pembayaran" class="form-control" required="required" @if ($counttransaction == 0) disabled @endif >
                                            <p class="text-danger">{{ $errors->first('pembayaran') }}</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="border:none;"></td>
                                        <td style="text-align:right;">Kembalian</td>
                                        <td style="text-align:left;">
                                            Rp  <span class="kembalian" name="kembalian"></span>
                                        </td>
                    
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="">
                                <form action="{{ route('transaksi.save') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" id="pembayaran_" name="pembayaran" class="form-control">
                                <button type="submit" class="btn btn-success float-right" @if ($counttransaction == 0) disabled @endif>Checkout</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
   $('#pembayaran').change(function() {
        onSkillCountChange()
    });
    
    function onSkillCountChange(){
        var matchvalue = $("#gtotal").val();
        var originalvalue = $("#pembayaran").val();
    
        var value = parseFloat(originalvalue) - matchvalue;
        $(".kembalian").text(value);
        $("#pembayaran_").val(originalvalue);
    }
</script>
@endsection

