<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_barangs', function (Blueprint $table) { 
            $table->bigIncrements('id'); 
            $table->string('code_barang', 50); 
            $table->string('nama_barang', 150); 
            $table->string('stock_barang', 5); 
            $table->string('harga_barang', 20); 
            $table->bigInteger('kategori_id'); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_barangs');
    }
}
