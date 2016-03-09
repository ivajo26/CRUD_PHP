<?php
require '../../models/authors.class.php';

$data= json_decode(stripslashes($_POST['data']));

$author = new Author();

foreach($data as $d){
     $author->delete($d);
  }
?>
