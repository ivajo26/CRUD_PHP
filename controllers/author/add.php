<?php
require '../../models/authors.class.php';

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];

$author = new Author();


if(!ereg("^[A-Za-z\s]+$",$first_name) && !ereg("^[A-Za-z\s]+$",$last_name) ){
  $json = array('status'=> "False" );
}elseif ($author->create($first_name, $last_name)) {
  $json = array('status'=> "True" );
}else {
  $json = array('status'=> "Faile" );
}

echo json_encode($json);
?>
