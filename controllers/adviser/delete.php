<?php
require '../../models/adviser.class.php';

$data= json_decode(stripslashes($_POST['data']));

$adviser = new Adviser();

foreach($data as $d){
     $adviser->delete($d);
  }
?>
