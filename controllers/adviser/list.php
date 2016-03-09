<?php
require '../../models/adviser.class.php';

$adviser = new Adviser();
$json = $adviser->read_all();
echo json_encode($json)
?>
