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
    <a href="{{ route('createBarang') }}" class="btn btn-primary">Tambah Barang</a><br><br>

    <h1>Tabel Inventaris</h1>

    <table border="1">
        <thead>
            <th>ID</th>
            <th>barang ID</th>
            <th>Nama Barang</th>
            <th>Harga Perolehan</th>
            <th>Nilai Ekonomis</th>
            <th>Tanggal Pembelian</th>
            <th>Klasifikasi</th>
            <th>Nomor Seri</th>
            <th>Tipe</th>
            <th>Nomor Rangka</th>
            <th>Nomor Mesin</th>
            <th>Nomor Polisi</th>
        </thead>
        <tbody>
            @foreach ($inventaris as $inv)
            <tr>
    <td>{{ $inv->id  }}</td>
    <td>{{ $inv->barang_id }}</td>
    <td>{{ $inv->nama_barang }}</td>
    <td>{{ $inv->harga_perolehan }}</td> 
    <td>{{ $inv->nilai_ekonomis }}</td>
    <td>{{ $inv->tanggal_pembelian  }}</td>
    <td>{{ $inv->klasifikasi }}</td>
    <td>{{ $inv->nomor_seri }}</td>
    <td>{{ $inv->tipe }}</td>
    <td>{{ $inv->nomor_rangka }}</td>
    <td>{{ $inv->nomor_mesin }}</td>
    <td>{{ $inv->nomor_polisi }}</td>
        </tr>
    @endforeach
        </tbody>
    </table>
    
    <h1>Input Aset</h1>

    <form action="{{ route('storeInventory') }}" method="POST">
        @csrf

        <label for="nama_barang">Nama Barang:</label>
    <select id="nama_barang" name="nama_barang">
        <option value="">Pilih Barang</option>
        @foreach ($barangs as $barang)
            <option value="{{ $barang->nama_barang }}" data-klasifikasi="{{ $barang->klasifikasi }}">{{ $barang->nama_barang }}</option>
        @endforeach
    </select>

        <!-- Tampilan nama barang yang dipilih -->
        <div id="selected_barang" style="display: none;"></div>

        <div id="form-elektronik" style="display: none;">
            <h2>Form Elektronik</h2>
            <p>Nama Barang: <span id="selected_barang_elektronik"></span></p>

            <label for="nomor_seri">Nomor Seri Elektronik:</label>
            <input type="text" id="nomor_seri" name="nomor_seri" value="">

            <label for="tipe">Tipe Elektronik:</label>
            <input type="text" id="tipe" name="tipe" value="">
        </div>

        <div id="form-kendaraan" style="display: none;">
            <h2>Form Kendaraan</h2>
            <p>Nama Barang: <span id="selected_barang_kendaraan"></span></p>

            <label for="nomor_rangka">Nomor Rangka Kendaraan:</label>
            <input type="text" id="nomor_rangka" name="nomor_rangka" value="">
            
            <label for="nomor_mesin">Nomor Mesin Kendaraan:</label>
            <input type="text" id="nomor_mesin" name="nomor_mesin" value="">
            
            <label for="nomor_polisi">Nomor Polisi Kendaraan:</label>
            <input type="text" id="nomor_polisi" name="nomor_polisi" value="">

        </div>

        <button type="submit">Simpan</button>
    </form> 

    <script>
        // Ketika dropdown berubah
        document.getElementById('nama_barang').addEventListener('change', function() {
            var selectedValue = this.value; // Nilai yang dipilih dari dropdown
            var klasifikasi = this.options[this.selectedIndex].getAttribute('data-klasifikasi');

            // Tampilkan nama barang yang dipilih
            document.getElementById('selected_barang').style.display = 'block';
            document.getElementById('selected_barang').innerText = 'Nama Barang: ' + selectedValue;

            // Sembunyikan semua form terlebih dahulu
            document.getElementById('form-elektronik').style.display = 'none';
            document.getElementById('form-kendaraan').style.display = 'none';

            // Tampilkan form yang sesuai dengan klasifikasinya
            if (klasifikasi === 'E') {
                document.getElementById('form-elektronik').style.display = 'block';
                document.getElementById('selected_barang_elektronik').innerText = selectedValue;
            } else if (klasifikasi === 'K') {
                document.getElementById('form-kendaraan').style.display = 'block';
                document.getElementById('selected_barang_kendaraan').innerText = selectedValue;
            }
        });
    </script>
</body>
</html>
