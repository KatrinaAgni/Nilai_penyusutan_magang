<?php
    $koneksi = mysqli_connect("localhost","root","","db_barang");
    $barang = mysqli_query($koneksi, "SELECT * FROM tb_barang");

    if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaBarang = $_POST["nama_barang"];
    $hargaPerolehan = $_POST["harga_perolehan"];
    $nilaiEkonomis = $_POST["nilai_ekonomis"];
    $tanggalPembelian = $_POST["tgl_pembelian"];

    $query = "INSERT INTO tb_barang (nama_barang, harga_perolehan, nilai_ekonomis, tgl_pembelian) VALUES ('$namaBarang', $hargaPerolehan, $nilaiEkonomis, '$tanggalPembelian')";

    
    if (mysqli_query($koneksi, $query)) {
        // Data berhasil disimpan
        // Anda dapat melakukan tindakan lain seperti mengarahkan pengguna ke halaman lain atau memperbarui tampilan tabel
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Aset</title>
</head>
<body>

  <h1>BARANG</h1>
    <table border="1">
        <thead>
          <tr>
            <td>ID</td>
            <td>NAMA BARANG</td>
            <td>HARGA PEROLEHAN</td>
            <td>NILAI EKONOMIS</td>
            <td>TANGGAL PEMBELIAN</td>
            <td>aksi</td>
        </tr>
        </thead>
        <tbody>
          <?php while($row=mysqli_fetch_assoc($barang)) : ?>
    
          <tr>
              <td><?php echo $row["id"]; ?></td>
              <td><?php echo $row["nama_barang"];?></td>
              <td><?php echo $row["harga_perolehan"];?></td>
              <td><?php echo $row["nilai_ekonomis"];?></td>
              <td><?php echo $row["tgl_pembelian"];?></td>
              <td><button class='view-barang' data-id='<?php echo $row["id"];?>'>View</button></td>
          </tr>
          <?php endwhile ?>
            
        </tbody>
    </table>

    <button id="tambah-barang">Tambah</button>

    <div id="form-tambah" style="display: none;">
        <h2>Tambah Barang Baru</h2>
        <form id="form-input" method="POST">
          <label for="nama_barang">Nama Barang:</label>
          <input type="text" id="nama_barang" name="nama_barang" required><br>
          
          <label for="harga_perolehan">Harga Perolehan:</label>
          <input type="number" id="harga_perolehan" name="harga_perolehan" required><br>
          
          <label for="nilai_ekonomis">Nilai Ekonomis:</label>
          <input type="number" id="nilai_ekonomis" name="nilai_ekonomis" required><br>
          
          <label for="tgl_pembelian">Tanggal Pembelian:</label>
          <input type="date" id="tgl_pembelian" name="tgl_pembelian" required><br>
          
            <button type="submit">Simpan</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const viewButtons = document.querySelectorAll('.view-barang');
            viewButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const barangId = button.getAttribute('data-id');
                    viewBarang(barangId);
                });
            });

            const tambahButton = document.getElementById('tambah-barang');
            const formTambah = document.getElementById('form-tambah');

            tambahButton.addEventListener('click', () => {
                formTambah.style.display = 'block';
            });

            const formInput = document.getElementById('form-input');
            formInput.addEventListener('submit', (e) => {
                e.preventDefault();

                // Ambil nilai dari input
                const namaBarang = document.getElementById('nama_barang').value;
                const hargaPerolehan = document.getElementById('harga_perolehan').value;
                const nilaiEkonomis = document.getElementById('nilai_ekonomis').value;
                const tanggalPembelian = document.getElementById('tgl_pembelian').value;

                // Data akan dikirimkan sebagai permintaan POST ke server
                // Logika penyimpanan data ke dalam database telah ditambahkan di atas (PHP)
                // Di sini, Anda dapat menambahkan tindakan lain yang sesuai dengan kebutuhan Anda.
            });
        });
    </script>
</body>
</html>
<?php /**PATH D:\XAMPP\htdocs\penyusutan\penyusutan_barang\resources\views/welcome.blade.php ENDPATH**/ ?>