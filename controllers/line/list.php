<?php
require '../../models/line.class.php';

$line = new Line();
$json = $line->read_all();
echo json_encode($json)
?>
