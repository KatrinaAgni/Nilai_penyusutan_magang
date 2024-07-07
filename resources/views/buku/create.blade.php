@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ('Form Tambah Data Buku') }}</div>
                <div class="card-body">
                    <form action="{{ route('buku.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="judul buku" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" id="judul_buku" name="judul_buku" placeholder="Masukan Judul Buku" value="{{ old('judul buku') }}">
                            @error('judul_buku')
                                <span class="text-danger fw-bold">Judul Buku wajib diisi</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="id_penerbit" class="form-label">Penerbit</label>
                            <select name="id_penerbit" id="id_penerbit" class="form-control">
                                <option value="">-PILIH SALAH SATU-</option>
                                @foreach ($penerbit as $item)
                                    <option @if (old('id_penerbit') - $item->id) selected @endif
                                        value="{{ $item->id }}">{{ $item->nama_penerbit }}</option>
                                @endforeach
                            </select>
                            @error('id_penerbit')
                                <span class="text-danger fw-bold">Penerbit wajib diisi</span>
                            @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="tahun terbit" class="form-label">Tahun Terbit</label>
                                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" placeholder="Masukan Tahun Terbit" value="{{ old('tahun_terbit') }}">
                                @error('tahun_terbit')
                                    <span class="text-danger fw-bold">Tahun Terbit wajib diisi</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jml_halaman" class="form-label">Jumlah Halaman</label>
                                <input type="number" class="form-control" id="jml_halaman" name = "jml_halaman" placeholder = "Masukan Jumlah Halaman" value="{{ old('jml_halaman') }}">

                                @error('jml_halaman')
                                    <span class="text-danger fw-bold">Jumlah Halaman wajib diisi</span>
                                @enderror 
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection