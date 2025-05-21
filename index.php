<?php 
include'system/conn.php';
session_start();
if (isset($_SESSION['id'])) {
	header("location:system/dashboard.php");
}?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Lorem ipsum. | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <style>
    body {
        padding-top:0%;
        overflow-y:hidden;
    }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php">Lorem ipsum dolor sit amet, consectetur adipisicing.</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="login_error_message"></div>
    <p class="login-box-msg">Sign in</p>

      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="username" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div class="col-xs-12">
          <center>  <button id="submit_login" class="btn btn-primary btn-block btn-flat" style="width: 50%">Sign In</button></center>
        </div>
        <!-- /.col -->
      </div>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>
function login() {
 var username = $('#username').val();
 var password = $('#password').val();
 if (username == "" && password == "") {
  $('.login_error_message').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-times"></i> FAILED TO LOGIN!</h4>Please enter username and password</div>');
 }
 else {
   $.post("system/login.php", {username: username, password: password}, function(data) {
      if (data == "success") {
        window.location.replace("system/dashboard.php");
      }
      else {
        $('.login_error_message').html('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><i class="icon fa fa-times"></i> FAILED TO LOGIN!</h4>Incorrect Username or Password</div>');
      }
   });
 }
}

$(document).keypress(function(event){
  var keycode = (event.keyCode ? event.keyCode : event.which);
  if(keycode == '13'){
    login();
  }
});
$("#submit_login").click(function(){
  login();
});
</script>
</body>
</html>
