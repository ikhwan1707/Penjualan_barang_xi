<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = "tb_kategoris";
    protected $fillable = ['nama_kategori'];
    
    protected $primaryKey = "id";

    /**
     * Get all of the barang for the kategori
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function barang(): HasMany
    {
        return $this->hasMany('App\barang');
    }
}
