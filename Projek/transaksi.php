<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
       <center> <h1>Daftar Transaksi</h1></center>
        <a href="read.php">Tambah Order</a>

        <table>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Nama Makanan</th>
                <th>harga</th>
                <th>Quantity</th>
                <th>Total Order</th>
             </tr>
        

        <?php
        include_once 'php-func.php';
        $file_json = file_get_contents('order.json');
        $data_order = json_decode($file_json, true);

        $no = 1;
        foreach($data_order as $key => $value){
            ?>

            <tr>
                <td><?= $no ?></td>
                <td><?= $value['nama'] ?></td>
                <td><?= $value['nama_makanan'] ?></td>
                <td><?= $value['harga'] ?></td>
                <td><?= $value['qty'] ?></td>
                <td><?= hitung($value['qty'], $value['harga'],'kali') ?></td>
            </tr>
            <?php
            $no++;
        }
        ?>


</table></div>


    
</body>
</html>