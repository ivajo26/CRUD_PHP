<?php
require '../../models/line.class.php';

$data= json_decode(stripslashes($_POST['data']));

$line = new Line();

foreach($data as $d){
     $line->delete($d);
  }
?>
