@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">{{_
                    ('Data Penerbit') }}</div>
                    <div class="card-body">
                        <a href="{{ route('penerbit.create') }}" class="btn btn-primary">Tambah Data</a>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Penerbit</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                @foreach ($penerbit as $item)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $item->nama_penerbit }}</td>
                                        <td>
                                            <a href="{{ route('penerbit.edit', $item->id)}}" class="btn btn-success">Edit</a>
                                            <form action="{{route('penerbit.destroy', $item->id) }}" method="post">
                                            @csrf
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