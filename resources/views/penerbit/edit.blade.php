@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ ('Form Edit Data Penerbit') }}

                    </div>

                    <div class="card-body">
                        <form action="{{ route('penerbit.update', $penerbit->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="nama_penerbit" class="form-label">Nama Penerbit</label>
                                <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit" placeholder="Masukkan Nama Penerbit" value="{{ $penerbit->nama_penerbit }}">
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