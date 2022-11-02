<?php
    require 'koneksi.php';

    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $result = mysqli_query($conn, "SELECT * FROM hubungi WHERE nama LIKE '%".$cari."%'");			
    }else{
        $result = mysqli_query($conn, "SELECT * FROM hubungi");		
    }

    $hubungi = [];

    while ($row = mysqli_fetch_assoc($result)){
        $hubungi[] = $row; 
    }

    session_start();
 
    if (!isset($_SESSION['username'])) {
        header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gahwa Story Coffee: Kedai Kopi Super</title>
    <link rel="icon" href="image1.png">
    <link rel="stylesheet" href="stylesheet/style.css">
    <link rel="stylesheet" href="stylesheet/darkmode.css">
    <link rel="stylesheet" href="stylesheet/styleform.css">
    <script src="jquery.js"></script>
    <script src="https://kit.fontawesome.com/d6e78495c8.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <header class="header">
        <div class="toggle"> <!--Untuk latar belakang-->    
            <div class="circle"></div> <!--Icon lingkaran-->    
            <div class="toggle-moon"><i class="fas fa-moon"></i></div> <!--Icon bulan-->    
            <div class="toggle-sun"><i class="fas fa-sun"></i></div> <!--Icon matahari-->
        </div>
        <div class="datetime-masukan">
            <?php
                date_default_timezone_set("Asia/Makassar");
                echo date("h:i:sa");
            ?>
        </div>
        <div class="logout">
            <a href="logout.php">Keluar</a>
        </div>
        <a href="index.php"><img src="image.png" alt=""></a>
        <div class="header-logo"><a href="index.php">Gahwa Story Coffee</a></div>
        <div class="navbar">
            <nav>
                <ul>
                    <li><a href="index.php">Login</a></li>
                    <li><a href="index1.php">Home</a></li>
                    <li><a href="#footer-judul">About Us</a></li>
                </ul>
            </nav>
        </div>
        <form action="masukan.php" method="GET">
            <div class="search">
                <input type="text" name="cari" placeholder="Search..." required>
            </div>
            <input type="submit" class="search-submit" value="Cari">
        </form>
    </header>

    <div class="main"> 
        <br>
        <br>
        <br>
        <br>
        <div>
            <h1>Daftar Saran dan Kritik Gahwa Story Coffee</h1>
            <a href="contact.php" role="button" class="button-tambah">Tambah Data</a>
        </div>
        <br>
        <?php 
        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            echo "<b>Hasil pencarian</b>";
        }
        ?>
        <table id="table-contact">
            <tr>
                <th>No</th>
                <th>nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Jenis Kelamin</th>
                <th>Lokasi Gerai</th>
                <th>Pesan</th>
                <th>File</th>
                <th>Action</th>
            </tr>
            <?php $id = 1; foreach($hubungi as $hub) :?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $hub ["nama"]; ?></td>
                <td><?php echo $hub ["email"]; ?></td>
                <td><?php echo $hub ["telepon"]; ?></td>
                <td><?php echo $hub ["jenis"]; ?></td>
                <td><?php echo $hub ["lokasi"]; ?></td>
                <td><?php echo $hub ["pesan"]; ?></td>
                <td class="gambar"><img src="file/<?php echo $hub ["nama_file"] ?>" alt="game-img" style="width: 120px;"></td>
                <td class="icon">
                    <a href="update.php?id=<?php echo $hub ["id"]; ?>" role="button"><i class="fas fa-pencil-alt"></i></a>
                    <a href="delete.php?id=<?php echo $hub ["id"]; ?>" role="button" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php $id++; endforeach; ?>
        </table>
    </div>
    <br>
    <br>
    <footer class="footer">
        <a href="index.php"><img src="image.png" alt=""></a>
        <div id="footer-judul">ABOUT US</div>
        <div class="footer-logo"><a href="index.php">Gahwa Story Coffee</a></div>
        <div class="footer-list">
            <h3 id="sosmed-footer">Temukan Kami Di</h3>
            <nav>
                <ul>
                    <li><a href="index2.php">Tentang</a></li>
                    <li><a href="masukan.php">Hubungi Kami</a></li>
                </ul>
            </nav>
        </div>
        <div class="sosmed-container">
            <div class="sosmed-ig">
                <a href="https://www.instagram.com/gahwa.storycoffee/">
                    <img src="ig.png" alt="">
                </a>
            </div>
            <div class="sosmed-maps">
                <a href="https://www.google.com/maps/place/Kedai+Gahwa+Story+Coffee/@-1.3904786,116.617455,17z/data=!4m12!1m6!3m5!1s0x2df117bc26c3de59:0x47f0caa11d90495e!2sKedai+Gahwa+Story+Coffee!8m2!3d-1.3904968!4d116.6174563!3m4!1s0x2df117bc26c3de59:0x47f0caa11d90495e!8m2!3d-1.3904968!4d116.6174563">
                    <img src="maps.png" alt="">
                </a>
            </div>
        </div>
        <div class="copyright">
            © 2020 | 
            <a href="https://www.instagram.com/aby.krnwn/">Aby Kurniawan.</a>
            All Rights Reserved.
        </div>
    </footer>

    <script src="script.js"></script>

</body>
</html>