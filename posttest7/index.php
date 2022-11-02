<?php
    require 'koneksi.php';

    session_start();
 
    if (isset($_SESSION['username'])) {
        header("Location: index1.php");
    }

    if(isset($_POST['masuk'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            header("Location: index1.php");
            
            if(password_verify($password, $row['password'])){
                ?>
                    <script>
                        window.location='index1.php';
                    </script>
                <?php
            }else{
                $error = true;
            }
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
            <h2>Masuk</h2>
            <?php
                if(isset($error)){
                    echo "<p style='font-weight: bold; padding-bottom: 15px;'> Username atau password Anda salah. Silahkan coba lagi!</p>";
                }
            ?>
            <form action="" method="POST">
                <div class="user">
                    <input type="text" name="username" required="">
                    <label>Username</label>
                </div>
                <div class="user">
                    <input type="password" name="password" required="">
                    <label>Password</label>
                </div>
                <div class="button-regis">
                    <a href="regis.php">Belum punya akun???</a>
                </div>
                <div class="submit-login">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <input type="submit" name="masuk" value="Masuk">
                </div>
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