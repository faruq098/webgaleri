<?php
session_start();
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WEB GALERI FOTO</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<!-- header -->
<header>
    <div class="container">
        <h1><a href="dashboard.php">WEB GALERI FOTO</a></h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="data-image.php">Data Foto</a></li>
            <li><a href="keluar.php">Keluar</a></li>
        </ul>
    </div>
</header>

<!-- content -->
    <div class="section">
        <div class="container">
            <h3>Dashboard</h3>
            <div class="box">
                <h4>selamat datang <?php echo $_SESSION['a_global']->admin_name ?> di website galeri foto</h4>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer>
    <div class="container">
        <small>Copyright &copy; 2024 - Web Galeri Foto</small>
    </div>
</footer>
</body>
</html>