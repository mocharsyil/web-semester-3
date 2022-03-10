<?php
session_start();
include("config.php");
include("functions.php");
$id = $_SESSION['user_id'];


if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg');
    
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0 ) {
            if ($fileSize <1000000) {
                $fileNameNew = "$id".".".$fileActualExt;
                $fileDestination = ''.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                $sql="UPDATE users SET status=0 WHERE id='$id'";
                $result = mysqli_query($koneksi, $sql);
                header("location: main.php?page=profile?uploadsuccess");
            } else {
                echo "pastikan file anda < 1mb";
            }
        } else{
            echo "Terjadi kesalahan saat mengupload";
        }
    } else {
        echo '<script>alert("file harus berupa jpg"); document.location="main.php?page=profile";</script>';
    }
}
