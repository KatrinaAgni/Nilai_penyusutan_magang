<!DOCTYPE html>
<html>
<head>
    <title>Hasil Perhitungan Penyusutan</title>
</head>
<body>
    <h1>Hasil Perhitungan Penyusutan</h1>

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

    <a href="<?php echo e(route('viewProcess', ['id' => $barang->id])); ?>" class="btn btn-primary">Lihat Proses</a>
    <?php endif; ?>

</body>
</html>
<?php /**PATH D:\XAMPP\htdocs\penyusutan\penyusutan_barang\resources\views/hasil_perhitungan.blade.php ENDPATH**/ ?>