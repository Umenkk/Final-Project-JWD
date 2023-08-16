<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
    <div class="container">
        <h1>Tambah Data</h1>
<form action="add.php" method="post">
    <table>
        <tr>
            <td>Nama Makanan</td>
            <td><input type="text" name="nama_makanan" id="nama_makanan"></td>
        </tr>
        <tr>
            <td>Satuan</td>
            <td><input type="text" name="satuan" id="satuan"></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td><input type="text" name="harga" id="harga"></td>
        </tr>
        <tr>
            <td></td>
            <td><button type="submit">Tambahkan Data</button></td>
        </tr>
    </table></div>
    </form>

    <?php
    if (@($_POST)){
    $file_json = file_get_contents('dbmakanan.json');
            $data_makanan = json_decode($file_json, true);

            foreach ($data_makanan as $key => $value){
                $_data_makanan[]=[
                    'nama_makanan' => $value['nama_makanan'],
                    'satuan'       => $value['satuan'],
                    'harga'        => $value['harga']
                ];
            }
            $_data_makanan[]= [
                'nama_makanan' => $_POST['nama_makanan'],
                'satuan'       => $_POST['satuan'],
                'harga'        => $_POST['harga']
            ];


            $new_makanan = json_encode($_data_makanan, JSON_PRETTY_PRINT);
            $file = fopen('dbmakanan.json', 'w');
            fwrite($file, $new_makanan);
            fclose($file);
            header('Location: read.php');
        }
        ?>
    
</body>
</html>