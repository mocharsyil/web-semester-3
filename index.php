<?php
 session_start();

 include("config.php");
 include("functions.php");

 if($_SERVER['REQUEST_METHOD'] == "POST")
 {
     //something was posted
     $user_name = $_POST['user_name'];
     $password = $_POST['password'];

     if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
     {

         //read from database
         
         $query = "SELECT * FROM users WHERE user_name = '$user_name' limit 1";

         $result = mysqli_query($koneksi, $query);
            if ($result){
                if($result && mysqli_num_rows($result) > 0){

                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] === $password){
                        $id = $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: main.php");
                        die;
                    }
                }
            }
        
     }else
     {
        echo '<script>alert("Data yang anda masukan salah"); document.location="index.php";</script>';
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
        <h1>Login</h1>
            <form method="post">
                <div class="textbox">
                <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" name="user_name">
                </div>

                <div class="textbox">
                <i class="fas fa-key"></i>
                    <input type="password" placeholder="Password" name="password">
                </div>
                    
                    <input class="btn" type="submit" name="" value="Signin">
                   
            </form>
            <br>Doesn't have an account? <a href="signup.php">Register</a> 
    </div>

    
</body>
</html>
