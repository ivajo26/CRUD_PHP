<?php
require '../../models/authors.class.php';

$author = new Author();
$json = $author->read_all();
echo json_encode($json)
?>
