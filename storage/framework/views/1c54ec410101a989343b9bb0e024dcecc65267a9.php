<?php
    $koneksi = mysqli_connect("localhost","root","","db_barang");
    $barang = mysqli_query($koneksi, "SELECT * FROM tb_barang");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PENYUSUTAN</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
    <!-- HEADER -->
    <header>
        <h1 style="text-align: center">BARANG</h1>
    </header>

    <section>
    <!-- ISI -->
    <article class="table">
        <table border="1" cellpaddings="8" cellspacing="0" align="center">
            <tr>
                <td>ID</td>
                <td>NAMA BARANG</td>
                <td>HARGA PEROLEHAN</td>
                <td>NILAI EKONOMIS</td>
                <td>TANGGAL PEMBELIAN</td>
                <td>aksi</td>
            </tr>
    
            <?php while($row=mysqli_fetch_assoc($barang)) : ?>
    
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["nama_barang"];?></td>
                    <td><?php echo $row["harga_perolehan"];?></td>
                    <td><?php echo $row["nilai_ekonomis"];?></td>
                    <td><?php echo $row["tgl_pembelian"];?></td>
                    <td>
                        <a href="" class="btn btn-primary">View</a>
                    </td>
                </tr>
                <?php endwhile ?>
        </table>
    </article>
    </section>
</body>
</html><?php /**PATH D:\XAMPP\htdocs\penyusutan\penyusutan_barang\resources\views/data.blade.php ENDPATH**/ ?>