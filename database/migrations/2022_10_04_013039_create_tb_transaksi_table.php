<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transaksis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_faktur');
            $table->decimal('harga_beli');
            $table->string('jumlah_beli', 100);
            $table->decimal('total_beli');
            $table->bigInteger('barang_id');
            $table->bigInteger('karyawan_id');
            $table->bigInteger('pelanggan_id');
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
        Schema::dropIfExists('tb_transaksis');
    }
}
