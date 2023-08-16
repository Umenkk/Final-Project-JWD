<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem informasi penjualan</title>
</head>
<link rel="stylesheet" href="style.css">

<body>

<div class="container">
    <center><h1>Daftar Menu</h1></center>
    
    <table>
        <tr>
            <th>No</th>
            <th>Nama Makanan</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Link Order</th>
        </tr>

        <?php

            $file_json = file_get_contents('dbmakanan.json');
            $data_makanan = json_decode($file_json, true);

            $no = 1;
            foreach ($data_makanan as $key => $value){

                ?>
                <tr>
                    <td><?= $no ?> </td>
                    <td><?= $value['nama_makanan']?></td>
                    <td><?= $value['satuan']?></td>
                    <td>Rp.<?= $value['harga']?></td>
                    <!-- <td><img src="<? $value['src'] ?>" alt=""></td> -->
                    <td><a href="order.php?nm=<?= $value['nama_makanan']?> &satuan=<?= $value ['satuan'] ?>
                    &hrg=<?= $value['harga']?>">Order</a></td>
                </tr>
                <?php
                $no++;
            }
?>

        
    </table></div>

    <center><a href="add.php">Tambah data makanan</a></center>
    
</body>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer>
             <p>Copyright &copy; 2023</p>
        </footer>
</html>