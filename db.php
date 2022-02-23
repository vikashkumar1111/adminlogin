<?php
$servername="localhost";
$username="root";
$password="";
$database="admin";

$conn=mysqli_connect($servername,$username,$password,$database);

if($conn){
    //echo"connected:";
}
else{
    echo "not connected";
    
}


?>