<!-- resources/views/detail_penyusutan.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Detail Penyusutan</title>
</head>
<body>
    <h1>Detail Penyusutan Tahun <?php echo e($result[0]['tahun']); ?> - <?php echo e(end($result)['tahun']); ?></h1>

    <table border="1">
        <tr>
            <th>Tahun</th>
            <th>Harga Perolehan</th>
            <th>Residu</th>
            <th>Penyusutan</th>
        </tr>
        <?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($data['tahun']); ?></td>
            <td><?php echo e($data['hargaPerolehan']); ?></td>
            <td><?php echo e($data['residu']); ?></td>
            <td><?php echo e($data['penyusutan']); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

</body>
</html>
<?php /**PATH D:\XAMPP\htdocs\penyusutan\penyusutan_barang\resources\views/detail_penyusutan.blade.php ENDPATH**/ ?>