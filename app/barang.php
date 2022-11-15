<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = "tb_barangs";
    protected $fillable = ['code_barang', 'nama_barang', 'stock_barang', 'harga_barang', 'kategori_id'];

    protected $primaryKey = 'id';

    /**
     * Get the kategori that owns the barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori()
    {
        return $this->belongsTo('App\kategori');
    }
}
