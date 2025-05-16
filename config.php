<?php 
require_once 'db.php';

function getAllObjects(){
    global $pdo; 
    $stmt = $pdo->prepare(SELECT * FROM objects);
}

?>