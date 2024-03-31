<?php 
    require_once("services/database.php");
    session_start();

    if($_SESSION['is_login'] == false) {
        header("Location: login.php");
    }

    define("APP_NAME", "RestoApp");

    $select_meja_query = "SELECT * FROM meja";
    $select_meja = $db->query($select_meja_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title><?= APP_NAME; ?></title>
</head>
<body>
    <a href="logout.php">logout</a>
    <h1>DAFTAR MEJA</h1>

    <div class="container">
        <?php 
            foreach($select_meja as $meja) {
        ?>
        <div class="card" onclick="goToMeja('<?= $meja['no_meja']; ?>', '<?= $meja['nama_pelanggan']; ?>')">
            <b><?= $meja['tipe_meja'] . " " . $meja['no_meja']; ?></b>
            <p>
                <?= $meja['nama_pelanggan'] == NULL && $meja['jumlah_orang'] == NULL ? "KOSONG" : $meja['nama_pelanggan']. " " . $meja['jumlah_orang']. " Orang"; ?>
            </p>
        </div>
        <?php } ?>        
    </div>

    <script>
        function goToMeja(no_meja, nama_pelanggan){
            const url = "meja.php"
            const params = `?no_meja=${no_meja}&nama_pelanggan=${nama_pelanggan}`

            window.location.replace(url + params);
        }
    </script>
</body>
</html>