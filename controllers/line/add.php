<?php
require '../../models/line.class.php';

$name=$_POST['name'];

$line = new Line();

$json = array('status'=> "True" );

if(!ereg("^[A-Za-z\s]+$",$name)){
  $json = array('status'=> "False" );
}elseif (isset($_POST['id'])){
  $id=$_POST['id'];
  if($line->update($name, $id)){
    $json = array('status'=> "Update" );
  }
}elseif($line->create($name)) {
  $json = array('status'=> "True" );
}else {
  $json = array('status'=> "Faile" );
}

echo json_encode($json);
?>
