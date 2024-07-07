@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{ route('peminjaman.create') }}" class="btn btn-primary"> Tambah Data </a>
            <div class="card mt-3">
                <div class="card-header">{{ ('Data Peminjaman') }} </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Peminjaman</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Tanggal Pinjam</th>
                                <th scope="col">Tanggal Kembali</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            <tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($peminjaman as $item)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->buku->judul_buku }}</td>
                                    <td>{{ $item->tgl_pinjam }}</td>
                                    <td>{{ $item->tgl_kembali }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        @if ($item->status = 'pinjam')
                                        <a href="{{ route('peminjaman.edit', $item->id) }}" class="btn btn-primary">Kembali</a>
                                        <form action="{{ route('peminjaman.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection