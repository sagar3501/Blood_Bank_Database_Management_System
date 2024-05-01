<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Blood Bank & Management - Admin Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-image: url('admin_image/blood-cells.jpg');
      background-size: cover;
    }

    .card {
      background-image: url('admin_image/glossy1.jpg');
      background-size: cover;
    }

    .form-control {
      border-radius: 20px;
    }
  </style>
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <h1 class="text-center mb-5" style="color:#D2F015;">
          Blood Bank & Management
          <br>Admin Login Portal
        </h1>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
              <div class="form-group">
                <label for="username" class="font-weight-bold">Username<span style="color:red">*</span></label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
              </div>
              <div class="form-group">
                <label for="password" class="font-weight-bold">Password<span style="color:red">*</span></label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your Password" required>
              </div>
              <div class="text-center">
                <input type="submit" name="login" class="btn btn-primary" value="LOGIN">
              </div>
            </form>
            <?php
              include 'conn.php';
              if(isset($_POST["login"])){
                $username=mysqli_real_escape_string($conn,$_POST["username"]);
                $password=mysqli_real_escape_string($conn,$_POST["password"]);
                $sql="SELECT * from admin_info where admin_username='$username' and admin_password='$password'";
                $result=mysqli_query($conn,$sql) or die("query failed.");
                if(mysqli_num_rows($result)>0) {
                  while($row=mysqli_fetch_assoc($result)){
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION["username"]=$username;
                    header("Location: dashboard.php");
                  }
                }
                else {
                  echo '<div class="alert alert-danger mt-3" style="font-weight:bold"> Username and Password are not matched!</div>';
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
