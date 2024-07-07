@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">{{ ('Data Buku') }}</div>
                    <div class="card-body">
                        <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Data</a>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul Buku</th>
                                    <th scope="col">Penerbit</th>
                                    <th scope="col">Tahun Terbit</th>
                                    <th scope="col">Jumlah Halaman</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($buku as $item)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <td>{{ $item->judul_buku }}</td>
                                    <td>{{ $item->penerbit->nama_penerbit }}</td>
                                    <td>{{ $item->tahun_terbit }}</td>
                                    <td>{{ $item->jml_halaman }}</td>
                                    <td>
                                        <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-success">Edit</a>
                                    
                                        <form action="{{ route('buku.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
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