<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    protected $table = "tb_karyawans";
    protected $fillable = ['nama_karyawan', 'jenkel_karyawan', 'no_hp_karyawan', 'email_karyawan',	'alamat_karyawan', 'password'];
    
    protected $primaryKey = "id";
}
