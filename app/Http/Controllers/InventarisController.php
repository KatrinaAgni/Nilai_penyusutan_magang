<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;
use App\Models\Barang;

class InventarisController extends Controller
{
    public function tampil()
{
    $inventaris = Inventaris::all(); 
    return view('index', ['inventaris' => $inventaris]);
}

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required', 
            'nomor_seri' => 'nullable|string',
            'tipe' => 'nullable|string',
            'nomor_rangka' => 'nullable|string',
            'nomor_mesin' => 'nullable|string',
            'nomor_polisi' => 'nullable|string',
        ]);

        $barang = Barang::where('nama_barang', $request->nama_barang)->first();

        if ($barang) {
            $inventaris = new Inventaris();
            $inventaris->nama_barang = $barang->nama_barang;
            $inventaris->harga_perolehan = $barang->harga_perolehan;
            $inventaris->nilai_ekonomis = $barang->nilai_ekonomis;
            $inventaris->tanggal_pembelian = $barang->tgl_pembelian; 
            $inventaris->klasifikasi = $barang->klasifikasi;
            $inventaris->nomor_seri = $request->nomor_seri;
            $inventaris->tipe = $request->tipe;
            $inventaris->nomor_rangka = $request->nomor_rangka;
            $inventaris->nomor_mesin = $request->nomor_mesin;
            $inventaris->nomor_polisi = $request->nomor_polisi;
            $inventaris->barang_id = $barang->id; 

            $inventaris->save();

            return redirect()->back()->with('success', 'Data inventaris berhasil disimpan');
        } else {
            return redirect()->back()->with('error', 'Nama barang tidak ditemukan.');
        }
    }
}