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
    <div id="box-1" class="login-box">
        <img src="logo.jpg" class="avatar">

        <form method="post">
            <div class="btn_div"><button class="btn" name="btn1"
                    style="width: 250px;height:60px  ;margin-left: -75px;">Login to Criminal Management System</button>
            </div>
            <div class="btn_div"><button class="btn" name="btn2"
                    style="width: 250px;height:60px ;margin-left: -75px;">Login to Police Officer Management
                    System</button></div>
        </form>


    </div>
</body>

</html>
<?php

if (isset($_POST['btn1'])) {
    header("location: login1.php");
}
else if (isset($_POST['btn2'])){
    header("location: login2.php");
}
?>