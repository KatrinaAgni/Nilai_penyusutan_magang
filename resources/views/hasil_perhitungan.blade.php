<!DOCTYPE html>
<html>
<head>
    <title>Hasil Perhitungan Penyusutan</title>
</head>
<body>
    <h1>Hasil Perhitungan Penyusutan</h1>

    @if(isset($barang))
    <h2>Data Barang</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Harga Perolehan</th>
            <th>Nilai Ekonomis</th>
            <th>Tanggal Pembelian</th>
        </tr>
        <tr>
            <td>{{ $barang->id }}</td>
            <td>{{ $barang->nama_barang }}</td>
            <td>{{ number_format($barang->harga_perolehan, 0, ',', '.') }}</td>
            <td>{{ $barang->nilai_ekonomis }}</td>
            <td>{{ $barang->tgl_pembelian }}</td>
        </tr>
    </table>

    <a href="{{ route('viewProcess', ['id' => $barang->id]) }}" class="btn btn-primary">Lihat Proses</a>
    @endif

</body>
</html>
