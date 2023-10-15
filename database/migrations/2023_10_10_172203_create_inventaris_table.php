<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventarisTable extends Migration
{
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->unsignedBigInteger('harga_perolehan');
            $table->unsignedBigInteger('nilai_ekonomis');
            $table->date('tgl_pembelian');
            $table->char('klasifikasi', 1);
            $table->string('nomor_seri')->nullable();
            $table->string('tipe')->nullable();
            $table->string('nomor_rangka')->nullable();
            $table->string('nomor_mesin')->nullable();
            $table->string('nomor_polisi')->nullable();
            $table->timestamps();
        
            $table->unsignedBigInteger('barang_id')->nullable();
            $table->foreign('barang_id')->references('id')->on('tb_barang');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('inventaris');
    }
}
