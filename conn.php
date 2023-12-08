<?php

$conn = new mysqli("localhost","root","","mydbs");

if($conn->connect_error){
  echo $conn->error;
}



?>