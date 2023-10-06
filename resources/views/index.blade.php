<!DOCTYPE html>
<html>
<head>
    <title>Daftar Barang</title>
</head>
<body>
    <h1>Daftar Barang</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Harga Perolehan</th>
                <th>Nilai Ekonomis</th>
                <th>Tanggal Pembelian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangs as $barang)
                <tr>
                    <td>{{ $barang->id }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ number_format($barang->harga_perolehan, 0, ',', '.') }}</td>
                    <td>{{ $barang->nilai_ekonomis }}</td>
                    <td>{{ $barang->tgl_pembelian }}</td>
                    <td>
                        <a href="{{ route('calculateDepreciation', ['id' => $barang->id]) }}" class="btn btn-primary">Hitung</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('createBarang') }}" class="btn btn-primary">Tambah Barang</a>
</body>
</html>
