<?php
require '../../models/adviser.class.php';

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];

$adviser = new Adviser();


if(!ereg("^[A-Za-z\s]+$",$first_name) and !ereg("^[A-Za-z\s]+$",$last_name) ){
  $json = array('status'=> "False" );
}elseif (isset($_POST['id'])){
  $id=$_POST['id'];
  if($adviser->update($first_name, $last_name,$id)){
    $json = array('status'=> "True" );
  }
}elseif($adviser->create($first_name, $last_name)) {
  $json = array('status'=> "True" );
}else {
  $json = array('status'=> "Faile" );
}

echo json_encode($json);
?>
