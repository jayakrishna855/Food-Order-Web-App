<?php include('../config/constants.php');?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Food Order Login System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="login ">
        <h1 class="text-center">Login</h1>
        <br>
        <?php
         if(isset($_SESSION['login'])){
             echo $_SESSION['login'];
             unset($_SESSION['login']);
         }
         if(isset($_SESSION['no-login'])){
            echo $_SESSION['no-login'];
            unset($_SESSION['no-login']);
        }
         ?>
        <br>

        <form action="" method="POST" class="text-center">
            Username:<br>
            <input type="text" name="username" placeholder="Enter your Username">
            <br><br>
            Password:<br>
            <input type="password" name="password" placeholder="Enter your Password">
            <br><br>
            <input type="submit" name="submit" value="Login" class="btn-primary">
        </form>
        <br><br>
        <p class="text-center">Created By JK</p>

    </div>

    <script src="" async defer></script>
</body>
<?php
  if(isset($_POST['submit'])){
      $username=$_POST['username'];
      $password=md5($_POST['password']);

      $sql="SELECT * FROM tbl_admin WHERE 
      username='$username' AND  password='$password'";

      $res=mysqli_query($conn,$sql);
      $count=mysqli_num_rows($res);
      if($count==1){
          $_SESSION['login']="<div class='success text-center'>Login Successfull.</div>";
          $_SESSION['user']='logged';
          header('location:'.SITEURL.'admin/');

      }
      else{
        $_SESSION['login']="<div class='error text-center'>Login Failed.</div>";
        
        header('location:'.SITEURL.'admin/login.php');

      }
  }

?>

</html>