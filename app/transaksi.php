<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = "tb_transaksis";
    protected $fillable = ['no_faktur',	'harga_beli','jumlah_beli','total_beli','barang_id','karyawan_id','pelanggan_id'];

    protected $primaryKey = 'id';
}
