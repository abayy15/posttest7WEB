<?php
    require 'koneksi.php';

    session_start();
 
    if (isset($_SESSION['username'])) {
        header("Location: index.php");
    }

    if(isset($_POST['daftar'])){
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cPassword = $_POST['confirm_password'];

        if($password === $cPassword){
            $password = password_hash($password, PASSWORD_DEFAULT);

            $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
            if(mysqli_fetch_assoc($result)){
                ?>
                    <script>
                        alert("Username atau Email Telah Digunakan");
                        window.location='regis.php';
                    </script>
                <?php
            }else{
                $push_data = mysqli_query($conn, "INSERT INTO user (nama, email, username, password) 
                                        VALUES ('$nama', '$email', '$username', '$password')");
                if(mysqli_affected_rows($conn) > 0){
                    ?>
                        <script>
                            alert("Registrasi Berhasil");
                            window.location='index.php';
                        </script>
                    <?php
                }else{
                    ?>
                        <script>
                            alert("Registrasi Gagal");
                            window.location='regis.php';
                        </script>
                    <?php
                }
            }
        }else{
            echo"
            <script>
            alert('Password yang Anda Masukkan Salah');
            document.location.href = 'regis.php';
            </script>";
        }
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
    <link rel="stylesheet" href="stylesheet/stylelogin.css">
    <link rel="stylesheet" href="stylesheet/darkmode.css">
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
        <a href="index.php"><img src="image.png" alt=""></a>
        <div class="header-logo"><a href="index.php">Gahwa Story Coffee</a></div>
        <div class="navbar">
            <nav>
                <ul>
                    <li><a href="index1.php">Home</a></li>
                    <li><a href="#footer-judul">About Us</a></li>
                </ul>
            </nav>
        </div>
        <div class="datetime">
            <?php
                date_default_timezone_set("Asia/Makassar");
                echo date("h:i:sa");
            ?>
        </div>
    </header>

    <div class="main">
        <div class="login">
            <h2>Daftar</h2>
            <form action="" method="POST">
                <div class="user">
                    <input type="text" name="nama" required="">
                    <label>Nama</label>
                </div>
                <div class="user">
                    <input type="email" name="email" required="">
                    <label>Email</label>
                </div>
                <div class="user">
                    <input type="text" name="username" required="">
                    <label>Username</label>
                </div>
                <div class="user">
                    <input type="password" name="password" required="">
                    <label>Password</label>
                </div>
                <div class="user">
                    <input type="password" name="confirm_password" required="">
                    <label>Konfirmasi Password</label>
                </div>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                <input type="submit" name="daftar" value="Daftar" class="submit-login">
            </form>
        </div>
    </div>

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