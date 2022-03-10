<?php
    session_start();

    include("config.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
        $user_email = $_POST['user_email'];
        $user_hp = $_POST['user_hp'];
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && !empty($user_email) && is_numeric($user_hp))
		{

			//save to database
			$user_id = random_num(20);
			$query = "INSERT INTO users (user_id, user_name, password, user_email, user_hp) values ('$user_id','$user_name','$password','$user_email','$user_hp')";

			mysqli_query($koneksi, $query);

			echo '<script>alert("Anda berhasil membuat akun"); document.location="index.php";</script>';
			die;
		}else
		{
			echo '<script>alert("Isi semua data"); document.location="signup.php";</script>';
		}
	}
?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-box">
        <h1>Sign Up</h1>
            <form method="post">
                <div class="textbox">
                <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" name="user_name">
                </div>

                <div class="textbox">
                <i class="fas fa-key"></i>
                    <input type="password" placeholder="Password" name="password">
                </div>
                    
                <div class="textbox">
                <i class="fas fa-email"></i>
                    <input type="text" placeholder="email" name="user_email">
                </div>
                <div class="textbox">
                <i class="fas fa-email"></i>
                    <input type="text" placeholder="no hp" name="user_hp">
                </div>
                    <input class="btn" type="submit" value="Signup">  
            </form>
            <br>Already have an account? <a href="index.php">Login</a> 
    </div>

    
</body>
</html>
