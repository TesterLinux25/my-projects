<?php 

$conn=mysqli_connect(hostname:"localhost", username:"root", password:"", database: "my_cupboard");

if($conn){
    echo "Connected";
}else{
    echo "Not connected".mysqli_error($con);
}
?>