<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Buku;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['peminjaman'] = Peminjaman::orderBy('tgl_pinjam', 'desc')->get();

        return view('peminjaman.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['users'] = User::all();
        $data['buku'] = Buku::all();

        return view('peminjaman.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_user' => 'required',
            'id_buku' => 'required',
            'tgl_pinjam' => 'required',
        ]);

        $peminjaman = new Peminjaman;
        $peminjaman->id_user = $request->id_user;
        $peminjaman->id_buku = $request->id_buku;
        $peminjaman->tgl_pinjam = $request->tgl_pinjam;
        $peminjaman->status = 'pinjam';
        $peminjaman->save();

        return redirect()->route('peminjaman.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjaman = Peminjaman::find($id);

        $peminjaman->status = 'kembali';
        $peminjaman->tgl_kembali = date('Y-m-d');
        $peminjaman->save();

        return redirect()->back()->with('Success', 'Data Berhasil Disimpan');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->delete();

        return redirect()->back()->with('success', 'Buku berhasil dihapus');
    }
}
