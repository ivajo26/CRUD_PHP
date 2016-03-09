<?php
require '../../models/authors.class.php';

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];

$author = new Author();

$json = array('status'=> "True" );

if(!ereg("^[A-Za-z\s]+$",$first_name) and !ereg("^[A-Za-z\s]+$",$last_name) ){
  $json = array('status'=> "False" );
}elseif (isset($_POST['id'])){
  $id=$_POST['id'];
  if($author->update($first_name, $last_name,$id)){
    $json = array('status'=> "True" );
  }
}elseif($author->create($first_name, $last_name)) {
  $json = array('status'=> "True" );
}else {
  $json = array('status'=> "Faile" );
}

echo json_encode($json);
?>
