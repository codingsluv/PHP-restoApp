<?php 
    require_once("services/database.php");
    session_start();

    if($_SESSION['is_login'] == false) {
        header("Location: login.php");
    }

    define("APP_NAME", "NOMOR MEJA ");

$no_meja = "";
$nama_pelanggan = "";
$update_notif = "";

if (isset($_GET['no_meja']) && $_GET['no_meja'] !== "") {
    $no_meja = $_GET['no_meja'];
}

if (isset($_GET['nama_pelanggan']) && $_GET['nama_pelanggan'] !== "") {
    $nama_pelanggan = $_GET['nama_pelanggan'];
    header("location: finish_order.php?no_meja=$no_meja&nama_pelanggan=$nama_pelanggan");
}

if (isset($_POST['update'])) {
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $jumlah_orang = $_POST['jumlah_orang'];

        $update_meja_query = "UPDATE meja SET nama_pelanggan='$nama_pelanggan', jumlah_orang='$jumlah_orang' WHERE no_meja='$no_meja'";
        $update_meja = $db->query($update_meja_query);

    if ($update_meja) {
        header("Location: index.php");
    } else {
        $update_notif = "Update Meja Gagal, silahkan coba kembali";
    }
    $db->close();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>Update Meja</title>
</head>
<body>
    <?php include ("layouts/header.php"); ?>
    <div class="super-center">
        <h1><?= APP_NAME; echo $no_meja ?></h1>
        <i>
            <?= $update_notif ?>
        </i>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="nama_pelanggan">Nama Pelanggan</label>
            <input type="text" name="nama_pelanggan" id="">
            <label for="jumlah_orang">Jumlah orang</label>
            <input type="text" name="jumlah_orang" id="">
        <button type="submit" name="update">Update Meja</button>
        </form>
    </div>
</body>
</html>