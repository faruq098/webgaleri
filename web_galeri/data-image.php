<?php session_start();
include 'db.php';
if
($_SESSION['status_login'] != true) {
    echo
        '<script>window.location="login.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB GALERI FOTO</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<!-- header -->
<header>
<div class="container">
<h1><a style="color: white; text-decoration: none; font-weight: bold;" href="dashboard.php">WEB GALERI FOTO</a></h1>
<ul style="color: white;">
<li><a style="color: white; text-decoration: none; " href="dashboard.php">Dashboard</a></li>
<li><a style="color: white; text-decoration: none; " href="profil.php">Profil</a></li>
<li><a style="color: white; text-decoration: none; " href="data-image.php">Data Foto</a></li>
<li><a style="color: white; text-decoration: none; " href="Keluar.php">Keluar</a></li>
</ul>
</div>
</header>
    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Data Galeri Foto</h3>
            <div class="box">
                <p><a class="btn btn-primary" href="tambah-image.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Kategori</th>
                            <th>Nama User</th>
                            <th>Nama Foto</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;

                        $user = $_SESSION['a_global']->admin_id;

                        $foto = mysqli_query($conn, "SELECT * FROM tb_image WHERE admin_id =
'$user' ");
                        if (mysqli_num_rows($foto) > 0) {
                            while ($row = mysqli_fetch_array($foto)) { ?>
                                <tr>
                                    <td>
                                        <?php echo $no++ ?>
                                    </td>
                                    <td>
                                        <?php echo $row['category_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['admin_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['image_name'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['image_description'] ?>
                                    </td>           
                                    <td><a href="foto/<?php echo $row['image'] ?>" target="_blank"><img src="foto/<?php echo
                                           $row['image'] ?>" width="50px"></a></td>
                                    <td>
                                        <?php echo ($row['image_status'] == 0) ? 'Tidak Aktif'
                                            : 'Aktif'; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="edit-image.php?id=<?php echo $row['image_id']
                                            ?>">Edit</a>
                                        <a class="btn btn-primary" href="proses-hapus.php?idp=<?php echo $row['image_id'] ?>" onclick="return confirm('Yakin Ingin Hapus ?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="8">Tidak ada data</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - Web Galeri Foto.</small>
        </div>
    </footer>
</body>

</html>