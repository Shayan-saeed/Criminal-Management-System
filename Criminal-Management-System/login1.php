<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['uname']);
      $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
      
      $sql = "SELECT * FROM cmslogin WHERE uname = '$myusername' and pass = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
		
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         header("location: home.php");
      }else {
         echo "<script>alert('".'Invalid Username or Password'."')</script>";
      }
   }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Login</title>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
</head>

<style type="text/css">
body {
    margin: 0;
    padding: 0;
    background: url("login_bg.jpg");
    background-size: cover;
    background-position: center;
    font-family: sans-serif;
}

.login-box {
    width: 320px;
    height: 420px;
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%, -50%);
    box-sizing: border-box;
    padding: 70px 30px;
}

.avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: absolute;
    top: -50px;
    left: calc(50% - 50px);
}

h1 {
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;
}

.login-box p {
    margin: 0;
    padding: 0;
    font-weight: bold;
}

.login-box input {
    width: 100%;
    margin-bottom: 20px;
}

.login-box input[type="text"],
input[type="password"] {
    border: none;
    border-bottom: 1px solid #fff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #fff;
    font-size: 16px;
}

.login-box input[type="submit"] {
    border: none;
    outline: none;
    height: 40px;
    background: #1c8adb;
    color: #fff;
    font-size: 18px;
    border-radius: 20px;
}

.login-box input[type="submit"]:hover {
    cursor: pointer;
    background: #39dc79;
    color: #000;
}

.login-box a {
    text-decoration: none;
    font-size: 14px;
    color: #fff;
}

.login-box a:hover {
    color: #39dc79;
}
</style>

<body>
    </div>
    <div id="box-1" class="login-box">
        <img src="logo.jpg" class="avatar">
        <h1>Criminal Management System</h1>
        <form method="post">
            <p>Username</p>
            <input type="text" class="inp" name="uname" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="pass" placeholder="Enter Password">
            <input type="submit" name="submit" value="Login">
        </form>

    </div>
</body>

</html>