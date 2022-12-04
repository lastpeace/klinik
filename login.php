<?php 

ob_start();
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

$koneksi=new mysqli("localhost","root","","klinik");

if($_SESSION['admin'] || $_SESSION['petugas'] || $_SESSION['dokter'] || $_SESSION['apoteker']){
        header("location:index.php");
    }else{

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>login</title>
    <!-- Favicon-->
    <link rel="icon" href="images\logo.jpg" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">  
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">  
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page" style="background-color: gray;">
    <div class="login-box">
        <div class="card">
            <p align="center"><img src="images/logo.jpg" width="200px" height="200px"></p>
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">LOGIN</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <input type="submit" name="login" value="Login" class="btn btn-block bg-pink waves-effect">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>

<?php

    if(isset($_POST['login'])){
        $username =mysqli_real_escape_string($koneksi,$_POST['username']);
        $password =mysqli_real_escape_string($koneksi,$_POST['password']);

        $sql=$koneksi->query("select * from tb_pengguna where username='$username' and password='$password'");
        $data=$sql->fetch_assoc();
        $ketemu=$sql->num_rows;

        if ($ketemu >=1){
            session_start();

            if($data['level']=="admin"){
                $_SESSION['admin']=$data['id'];
                header("location:index.php");
            }else if($data['level']=="petugas"){
                $_SESSION['petugas']=$data['id'];
                header("location:index.php");
            }else if($data['level']=="dokter"){
                $_SESSION['dokter']=$data['id'];
                header("location:index.php");
            }else if($data['level']=="apoteker"){
                $_SESSION['apoteker']=$data['id'];
                header("location:index.php");
            }
        }else{
            ?>
            <script type="text/javascript">
                alert("Login Gagal, Username dan Password anda SALAH...Silahkan Ulangi Lagi!!!")
            </script>
            <?php
        }

    }
?>

<?php 

    }

?>