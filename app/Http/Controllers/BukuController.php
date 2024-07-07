<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\Penerbit;

use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['buku'] = Buku::all();

        return view('buku.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['penerbit'] = Penerbit::all();

        return view('buku.create', $data);
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
            'judul_buku' => 'required',
            'id_penerbit' => 'required',
            'tahun_terbit' => 'required',
            'jml_halaman' => 'required',
        ]);

        $buku = new Buku();

        $buku->judul_buku = $request->judul_buku;
        $buku->id_penerbit = $request->id_penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->jml_halaman = $request->jml_halaman;

        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil disimpan');
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
        $data['buku'] = Buku::find($id);
        $data['penerbit'] = Penerbit::all();

        return view('buku.edit', $data);
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
        $this->validate($request, [
            'judul_buku' => 'required',
            'id_penerbit' => 'required',
            'tahun_terbit' => 'required',
            'jml_halaman' => 'required',
        ]);

        $buku = Buku::find($id);

        $buku->judul_buku = $request->judul_buku;
        $buku->id_penerbit = $request->id_penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->jml_halaman = $request->jml_halaman;

        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect()->back()->with('success', 'Buku berhasil dihapus');
    }
}
