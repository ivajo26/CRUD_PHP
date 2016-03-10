<?php
require '../../models/project.class.php';

$name=$_POST['name'];
$id_adviser=$_POST['adviser'];
$note=$_POST['note'];
$line=$_POST['line'];
$author=$_POST['author'];

$project = new Project();
$json = array('status'=> "True" );
if(!ereg("^[A-Za-z\s]+$",$name) and !ereg("^[A-Za-z\s]+$",$line) ){
  $json = array('status'=> "False");
}elseif (0<=$note and $note<=5){
  if (isset($_POST['id'])) {
    if($project->update($first_name, $last_name,$id)){
      $json = array('status'=> "True" );
    }else{
      $json = array('status'=> "Faile" );
    }
  }else if($project->create($name, $id_adviser,$note,$line,$author)){
    $json = array('status'=> "True" );
  }else{
      $json = array('status'=> "Faile" );
  }
}else{
  $json = array('status'=> "False" );
}

echo json_encode($json);
?>
