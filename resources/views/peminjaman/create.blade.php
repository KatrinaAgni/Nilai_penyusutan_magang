@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{('Tambah Data Peminjaman')}}</div>

                <div class="card-body">
                    <form action="{{ route('peminjaman.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="id_user" class="form-label">Nama User</label>
                            <select name="id_user" id="id_user" class="form-control">
                                @foreach ($users as $item_user)
                                <option value="{{ $item_user->id }}">{{$item_user->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class=" mb-3">
                            <label for="id_buku" class="form-label">Judul Buku</label>
                            <select name="id_buku" id="id_buku" class="form-control">
                                @foreach ($buku as $item_buku)
                                <option value="{{ $item_buku->id }}">{{$item_buku->judul_buku }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                            <input type="date" name="tgl_pinjam" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection