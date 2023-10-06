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
            <?php $__currentLoopData = $barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($barang->id); ?></td>
                    <td><?php echo e($barang->nama_barang); ?></td>
                    <td><?php echo e(number_format($barang->harga_perolehan, 0, ',', '.')); ?></td>
                    <td><?php echo e($barang->nilai_ekonomis); ?></td>
                    <td><?php echo e($barang->tgl_pembelian); ?></td>
                    <td>
                        <a href="<?php echo e(route('calculateDepreciation', ['id' => $barang->id])); ?>" class="btn btn-primary">Hitung</a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <a href="<?php echo e(route('createBarang')); ?>" class="btn btn-primary">Tambah Barang</a>
</body>
</html>
<?php /**PATH D:\XAMPP\htdocs\penyusutan\penyusutan_barang\resources\views/index.blade.php ENDPATH**/ ?>