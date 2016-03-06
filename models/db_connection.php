<?php
include'../config.php';
try {
    $db = new PDO($type_db.':host='.$host_db.';dbname='.$name_db, $user_db, $password_db);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>
