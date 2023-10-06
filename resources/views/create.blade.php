<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
</head>
<body>
    <h1>Tambah Barang</h1>

    <!-- Form tambah barang -->
    <form action="{{ route('storeBarang') }}" method="POST">
        @csrf <!-- CSRF token untuk keamanan -->
        <div>
            <label for="nama_barang">Nama Barang:</label>
            <input type="text" name="nama_barang" id="nama_barang" required>
        </div>
        <div>
            <label for="harga_perolehan">Harga Perolehan:</label>
            <input type="number" name="harga_perolehan" id="harga_perolehan" required>
        </div>
        <div>
            <label for="nilai_ekonomis">Nilai Ekonomis:</label>
            <input type="number" name="nilai_ekonomis" id="nilai_ekonomis" required>
        </div>
        <div>
            <label for="tgl_pembelian">Tanggal Pembelian:</label>
            <input type="date" name="tgl_pembelian" id="tgl_pembelian" required>
        </div>
        <div>
            <button type="submit">Tambah Barang</button>
        </div>
    </form>
</body>
</html>
