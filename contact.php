<?php

include "db.php";
if(isset($_POST['submit'])){
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$subj=$_POST['subject'];
$img=$_FILES['image'];
$mess=$_POST['message'];

print_r($img);

$filename=$img['name'];
$fileerror=$img['error'];
$filetmp=$img['tmp_name'];

$path='upload/'.$filename;
move_uploaded_file($filetmp,$path);




  $ins="INSERT INTO `contact`( `name`, `email`, `phone`, `subject`,`image`,`message`) VALUES ('$name','$email','$phone','$subj','$path','$mess')";

  $query=mysqli_query($conn,$ins);
  if($query){
    echo "<script>alert('Form Created' );</script>";
    
  }
  else{
    echo "not inserted";
    echo mysqli_error($conn);
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
  <link rel="stylesheet" href="./style.css">

<style>
  .login a{
    text-decoration: none;
    color: rgb(8, 247, 8);
    position: relative;
    right: -100px;

}
</style>

  <title>contact</title>
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
        <div class="login"><a href="login.php"> <i class="bi bi-box-arrow-in-right"></i> Admin Login</a></div>
      </div>
    </nav>
  </div>
  <div class="container-fluid dis">





  <div class="contact ">
    <section class="col">
      <div class="card-header">
        <h2 class="text-center h2_col">CONTACT </h2>
      </div>

      <form action="" method="POST" enctype="multipart/form-data" >

     
        <div class="form-group">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"> your Name </label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" > 
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="email" >
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">your phone</label>
            <input type="text" class="form-control" id="" name="phone">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Subject</label>
            <input type="text" class="form-control" id="" name="subject" >
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">image</label>
            <input type="file" class="form-control" id="" name="image" >
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Send</button> <br>






        </div>
      </form>

    </section>

    <section class="col map">
      <!-- <h1><img src="map.jpg" width="100%%" alt="map"></h1> -->
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.4885203829485!2d78.48413900000001!3d17.436317000000013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTfCsDI2JzEwLjciTiA3OMKwMjknMDIuOSJF!5e0!3m2!1sen!2s!4v1425802412032" width="400" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </section>

    <section class="col info">
      <h2 class="h2_col">Business Hours</h2>

      <p class="text-secondary"> Our support is throughout your business lifecycle. </p>

      <h2 class="h2_col"> Contact Information </h2>
      <p class="text-secondary"> <b> #5-2-50/51,FIRST FLOOR </b> HYDERABAD, BEHIND BIBLE HOUSE, SECUNDERABAD ANDHRA
        PRADESH PIN: 500 003 <br>
        <i class="bi bi-telephone-fill h2_col">+91-7799285123</i><br>
        <i class="bi bi-skype h2_col">businesslabs</i><br>
        <i class="bi bi-linkedin h2_col">Your Business Labs</i><br>
        <i class="bi bi-facebook h2_col">Business Lab </i><br>
        <i class="bi bi-twitter h2_col">@business_labs</i><br>

        <br>
        <p>General enquiries: <i class=" h2_col">reception@businessslabs.org</i></p>

        <p> Support:
        <i class=" h2_col"> support@businesslabs.org</i></p>

        <p> Sales:
        <i class=" h2_col"> sales@businesslabs.org</i></p>

        <p> Editorial: just fill out the contact form and we will get back to you</p>



      </p>
    </section>


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