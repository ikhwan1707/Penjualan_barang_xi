<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderproduct extends Model
{
    protected $table = "order_products";
    protected $fillable = [
        'order_id',
        'barang_id',
        'qty',
        'total'
    ];

    protected $primaryKey = "id";

    public function namaBarang()
    {
        return $this->belongsTo('App\barang');
    }
}
