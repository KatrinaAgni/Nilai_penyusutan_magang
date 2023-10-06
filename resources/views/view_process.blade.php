<!DOCTYPE html>
<html>
<head>
    <title>Lihat Proses Penyusutan</title>
</head>
<body>
    <h1>Lihat Proses Penyusutan</h1>

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

    <h2>Hasil Perhitungan Penyusutan</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th>Residu</th>
                    <th>Nilai Aset per Tahun</th>
                </tr>
            </thead>
            <tbody id="hasil-body">
                @foreach ($result as $index => $data)
                <tr>
                    <td>{{ $data['tahun'] }}</td>
                    <td>{{ number_format($data['residu'], 0, ',', '.') }}</td>
                    <td>{{ number_format($data['nilai_aset'], 0, ',', '.') }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- Skrip JavaScript untuk melakukan perhitungan -->
    <script>
        var result = @json($result);
    
        function updateTable() {
            var tbody = document.getElementById("hasil-body");
            tbody.innerHTML = '';
    
            for (var i = 0; i < result.length; i++) {
                var data = result[i];
                var row = document.createElement("tr");
                row.innerHTML = "<td>" + data.tahun + "</td>" +
                    "<td>" + data.residu + "</td>" +
                    "<td>" + data.penyusutan + "</td>" +
                    "<td>" + data.nilai_aset + "</td>";
                tbody.appendChild(row);
            }
        }
    
        // Panggil fungsi untuk mengupdate tabel saat halaman dimuat
        window.onload = function() {
            updateTable();
        };
    
        // Fungsi untuk menampilkan atau menyembunyikan tabel hasil perhitungan
        var tabelHasil = document.getElementById("tabel-hasil");
        var tombolLihatProses = document.getElementById("lihat-proses");
        var tabelTampil = false;
    
        function toggleTampilanTambahan() {
            var tampilanTambahan = document.getElementById("tampilan-tambahan");
            if (tampilanTambahan.style.display === "none" || tampilanTambahan.style.display === "") {
                tampilanTambahan.style.display = "block"; // Menampilkan tampilan tambahan
            } else {
                tampilanTambahan.style.display = "none"; // Menyembunyikan tampilan tambahan
            }
        }
    
        <button onclick="toggleTampilanTambahan()">Lihat Proses</button>
    </script>
</body>
</html>
