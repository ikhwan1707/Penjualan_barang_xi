<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    protected $table = "tb_pelanggans";
    protected $fillable = ['nama_pelanggan','jenkel_pelanggan',	'no_hp_pelanggan',	'email_pelanggan',	'alamat_pelanggan'];

    protected $primaryKey = 'id';
}
