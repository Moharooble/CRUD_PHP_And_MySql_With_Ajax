<?php

header("Content-type: application/json");
include 'conn.php';

// function readAll.
// function Insert.
// function Delete.
// function Update.


$action = $_POST['action'];


function readAll($conn){

  $data = array();
  $message = array();

  $query = "SELECT * FROM student";

  $result =$conn->query($query);


  if($result){
    while($row = $result->fetch_assoc()){
      $data [] = $row;

    }
    $message = array("status" => true, "data" => $data);
      
    
  }else {
    $message = array("status" => false, "data" => $conn->error);
  }

  echo json_encode($message);
}
function readStudentInfo($conn){

  $data = array();
  $message = array();

  $id = $_POST['id'];
  $query = "SELECT * FROM student WHERE id = '$id'";

  $result =$conn->query($query);


  if($result){
    while($row = $result->fetch_assoc()){
      $data [] = $row;

    }
    $message = array("status" => true, "data" => $data);
      
    
  }else {
    $message = array("status" => false, "data" => $conn->error);
  }

  echo json_encode($message);
}

function deleteStudent($conn){

  $data = array();
  $message = array();

  $id = $_POST['id'];
  $query = "DELETE FROM student WHERE id = '$id'";

  $result =$conn->query($query);


  if($result){
    $message = array("status" => true, "data" => "Deleted Successfully");
      
    
  }else {
    $message = array("status" => false, "data" => $conn->error);
  }

  echo json_encode($message);
}

function registerStudent($conn){

  $studentId = $_POST['id'];
  $studentName = $_POST['name'];
  $studentClass = $_POST['class'];

  $data = array();

  $query = "INSERT INTO student(id,name,class) VALUES('$studentId','$studentName','$studentClass')";

  $result = $conn->query($query);

  if($result){
    $data = array("status" =>true, "data" =>"Registered Successfully");
  }else {
    $data = array("status" => false, "data" => $conn->error);
  }

  echo json_encode($data);
}
function updateStudent($conn){

  $studentId = $_POST['id'];
  $studentName = $_POST['name'];
  $studentClass = $_POST['class'];

  $data = array();

  $query = "UPDATE student set name = '$studentName', class = '$studentClass' WHERE id='$studentId'";

  $result = $conn->query($query);

  if($result){
    $data = array("status" =>true, "data" =>"Updated Successfully");
  }else {
    $data = array("status" => false, "data" => $conn->error);
  }

  echo json_encode($data);
  
}


if(isset($action)){
  $action($conn);

}else {
  echo "Action is required...";
}

?>