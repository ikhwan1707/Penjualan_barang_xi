<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $table = "transactions";
    protected $fillable = ['barang_id',	'qty','total'];

    protected $primaryKey = 'id';

    public function barang()
    {
        return $this->belongsTo('App\barang');
    }
}
