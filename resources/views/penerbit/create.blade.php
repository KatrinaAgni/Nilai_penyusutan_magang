@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ ('Form Tambah Data Penerbit') }}</div>
                    <div class="card-body">
                        <form action="{{ route('penerbit.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_penerbit" class="form-Label">Nama Penerbit</label>
                                <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" placeholder="Masukan Nama Penerbit">

                                @error('nama_penerbit')
                                    <span class="text-danger fw-bold">Nama penerbit wajib</span>
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