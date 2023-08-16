<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Order</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
    <div class="container">
    <center><h1>Form Order</h1></center>
    <form action="order.php" method="post">
        <table>
            <tr>
                <td>Nama Makanan</td>
                <td>: <?= $_GET['nm'] ?>
                <input type="hidden" name="nama_makanan" value="<?= $_GET['nm'] ?>"></td>
            </td>
            </tr>
            <tr>
                <td>Satuan</td>
                <td>: <?= $_GET['satuan'] ?>
                <input type="hidden" name="satuan" value="<?= $_GET['satuan'] ?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>: <?= $_GET['hrg'] ?>
                <input type="hidden" name="harga" value="<?= $_GET['hrg'] ?>">
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: <input type="text" name="nama" id=""></td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td>: <input type="number" name="qty" id=""></td>
            </tr>
            <tr>
                <td></td>
                <td><button class="button" type="submit">Order</button></td>
            </tr>
        </table></div>
    </form>

    <?php
    if(@($_POST)){
        $file_json = file_get_contents('order.json');
        $data_order = json_decode($file_json, true);

        foreach($data_order as $key => $value){
            $_data_order[] = [
                'nama_makanan' => $value ['nama_makanan'],
                'satuan' => $value ['satuan'],
                'harga' => $value ['harga'],
                'nama' => $value ['nama'],
                'qty' => $value ['qty']
            ];
        }

        $_data_order[] = [
            'nama_makanan' => $_POST['nama_makanan'],
            'satuan' => $_POST['satuan'],
            'harga' => $_POST['harga'],
            'nama' => $_POST['nama'],
            'qty' => $_POST['qty']
        ];

        $new_order = json_encode($_data_order, JSON_PRETTY_PRINT);
        $file = fopen('order.json', 'w');
        fwrite($file, $new_order);
        fclose($file);
        header('Location: transaksi.php');
    }
    ?>
</body>
</html>