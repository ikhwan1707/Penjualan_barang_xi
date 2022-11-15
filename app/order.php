<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = "orders";
    protected $fillable = [
        'no_faktur',
        'karyawan_id',
        'grand_total',
        'pembayaran',
        'kembalian'
    ];

    protected $primaryKey = "id";

    public function productOrder()
    {
        return $this->hasMany('App\orderproduct');
    }
}
