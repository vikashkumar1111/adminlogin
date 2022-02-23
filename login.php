<?php
session_start();
include "db.php";
if(isset($_POST['login'])){
  $username=$_POST['name'];
  $password=$_POST['pass'];

  $qe="select * from admin_login where `name`='$username' and `password`='$password'";
  $query=mysqli_query($conn,$qe);

  $row=mysqli_num_rows($query);

  if($row==1){
    echo "login successful:";
    $_SESSION ['admin']=$username;
    header('location:adminpage.php');
  }
  else{
    echo "<script>alert ('Incorrect username or password');</script>";
    header("login.php");
  }
}





?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">

  <style>
      .card{
    /* margin: 20px; */
    margin-top: 55px;
    background-color: #54c1bc;
}
.car-title{
    text-align: center;
    color: black;
    padding-bottom: 20px;
    
}
.login a{
    text-decoration: none;
    color: rgb(8, 247, 8);
    position: relative;
    right: -100px;

}


  </style>

  <title>login</title>
</head>

<body>
  <div class="nan">
    <nav class="navbar navbar-expand-lg text-white bg-dark">
      <a class="img" href="#">
        <img src="BL_logo.jpg" width="250" height="40" alt="logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse col-6" id="navbarNavAltMarkup">
        <div class="navbar-nav nav ">
          <a class="nav-item nav-link active nav-items-c" href="#">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link active nav-items-c" href="#">About us <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link active nav-items-c" href="#">Services <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link active nav-items-c" href="#">Blog <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link active nav-items-c" href="contact.php">Contact <span class="sr-only">(current)</span></a>

        </div>
        <div class="login"><a href="signup.php"> <i class="bi bi-box-arrow-in-right"></i> Sign Up</a></div>
      </div>
    </nav>
  </div>
     <div class="container">
      <div class="card">
          <div class="card-body">
              <div class="car-title">
                 Admin Login
              </div>
              <form action="" method="POST">
                <div>
                    <labels>
                        Username:
                    </labels>
                    <input type="text" name="name" placeholder="input username" required>
                        <lables>
                            Password:
                        </lables>
                        <input type="password" name="pass" id="" placeholder="input password" required>
                        <button class="btn btn-success" type="submit" name="login">Login</button>
                </div>
              </form>
          </div>
      </div>



   
    </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>


</body>

</html>