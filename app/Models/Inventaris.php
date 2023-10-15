<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;
    protected $table = 'inventaris';
    protected $fillable = ['nama_barang', 'harga_perolehan', 'nilai_ekonomis', 'tanggal_pembelian', 'klasifikasi', 'nomor_seri', 'tipe', 'nomor_rangka', 'nomor_mesin', 'nomor_polisi'];


    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id','nama_barang', 'nama_barang');
    }

}
