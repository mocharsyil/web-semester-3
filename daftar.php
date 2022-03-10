<?php
    session_start();

    include("config.php");
    include("functions.php");

    // menyimpan data kedalam variabel
$user_id = $_POST['user_id'];
$user_name   = $_POST['user_name'];
$user_email  = $_POST['user_email'];
$user_hp     = $_POST['user_hp'];
// query SQL untuk insert data
$query="UPDATE users SET user_name='$user_name',user_email='$user_email',user_hp='$user_hp' where user_id='$user_id'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:main.php");
?>
?>