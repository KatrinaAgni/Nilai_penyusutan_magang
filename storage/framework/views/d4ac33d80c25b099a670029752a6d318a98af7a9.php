<!DOCTYPE html>
<html>
<head>
    <title>Lihat Proses Penyusutan</title>
</head>
<body>
    <h1>Lihat Proses Penyusutan</h1>

    <?php if(isset($barang)): ?>
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
            <td><?php echo e($barang->id); ?></td>
            <td><?php echo e($barang->nama_barang); ?></td>
            <td><?php echo e(number_format($barang->harga_perolehan, 0, ',', '.')); ?></td>
            <td><?php echo e($barang->nilai_ekonomis); ?></td>
            <td><?php echo e($barang->tgl_pembelian); ?></td>
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
                <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($data['tahun']); ?></td>
                    <td><?php echo e(number_format($data['residu'], 0, ',', '.')); ?></td>
                    <td><?php echo e(number_format($data['nilai_aset'], 0, ',', '.')); ?></td>

                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>

    <!-- Skrip JavaScript untuk melakukan perhitungan -->
    <script>
        var result = <?php echo json_encode($result, 15, 512) ?>;
    
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
<?php /**PATH D:\XAMPP\htdocs\penyusutan\penyusutan_barang\resources\views/view_process.blade.php ENDPATH**/ ?>