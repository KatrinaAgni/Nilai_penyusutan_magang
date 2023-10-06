<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('index', compact('barangs'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'harga_perolehan' => 'required|integer',
            'nilai_ekonomis' => 'required|integer',
            'tgl_pembelian' => 'required|date',
        ]);

        // Simpan data barang ke dalam database
        $barang = new Barang();
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_perolehan = $request->harga_perolehan;
        $barang->nilai_ekonomis = $request->nilai_ekonomis;
        $barang->tgl_pembelian = $request->tgl_pembelian;
        $barang->save();

        // Redirect ke halaman index
        return redirect('/barangs')->with('success', 'Data barang berhasil ditambahkan');
    }

    public function calculateDepreciation($id)
{
    // Ambil data barang berdasarkan ID
    $barang = Barang::findOrFail($id);

    // Hitung penyusutan, residu, dan nilai aset per tahun
    $result = [];

    $hargaPerolehan = $barang->harga_perolehan;
    $nilaiEkonomis = $barang->nilai_ekonomis;

    for ($i = 0; $i < $nilaiEkonomis + 1; $i++) {
        $residu = $hargaPerolehan / $nilaiEkonomis;
        $nilaiAset = $hargaPerolehan - ($residu * $i);

        // Tambahkan data hasil perhitungan ke dalam array $result
        $result[] = [
            'tahun' => date('Y', strtotime($barang->tgl_pembelian)) + $i,
            'residu' => $residu,
            'nilai_aset' => $nilaiAset,
        ];
    }

    // Kirim data barang dan hasil perhitungan ke tampilan
    return view('hasil_perhitungan', ['barang' => $barang, 'result' => $result]);
}

public function viewProcess($id)
{
    $barang = Barang::findOrFail($id);

    $result = [];

    $hargaPerolehan = $barang->harga_perolehan;
    $nilaiEkonomis = $barang->nilai_ekonomis;

    for ($i = 0; $i < $nilaiEkonomis + 1; $i++) {
        $residu = ($hargaPerolehan / $nilaiEkonomis);
        $nilaiAset = $hargaPerolehan - ($residu * $i);

        $result[] = [
            'tahun' => date('Y', strtotime($barang->tgl_pembelian)) + $i,
            'residu' => $residu,
            'nilai_aset' => $nilaiAset,
        ];
    }

    // Kirim data barang dan hasil perhitungan ke tampilan view_process.blade.php
    return view('view_process', ['barang' => $barang, 'result' => $result]);
}

}



