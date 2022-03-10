<?php

$id = $_SESSION['user_id'];
    $user_name = check_login($koneksi);
  
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <div class="container">
    <div class="profile_pic">
                <img src="<?php echo "$id.jpg";?>"  class="img-circle profile_img" height="50%" width="50%">
              </div>
    
    Change profile photo
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <<button type="submit" name="submit"> UPLOAD </>
    </form>
    </div>
    
    <center><b>PROFIL</B></CENTER>
    
  <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="container-fluid">
                <form method="post" action="daftar.php">
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="user_name" value="<?php echo $user_name['user_name'] ?>" class="form-control">
                    </div> 
           
                <div class="form-group">
                    <label>User ID</label>
                    <input type="text" name="user_id" readonly value="<?php echo $user_name['user_id'] ?>" class="form-control">
                </div> 
            
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="user_email" value="<?php echo $user_name['user_email'] ?>" class="form-control" >
                </div> 
            
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" >
                </div> 
            
                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="user_hp" value="<?php echo $user_name['user_hp'] ?>" class="form-control" >
                </div> 
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update Profile</button>

         
        </div>
    </div>
</body>
</html>
