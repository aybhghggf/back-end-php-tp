<?php 
require_once 'db.php';

function getAllObjects(){
    global $pdo; 
    $stmt = $pdo->prepare('SELECT * FROM objects');
    $stmt->execute();
    $obj= $stmt->fetchAll();
    return $obj;
}
function SignIn(){
    global $pdo;
}

?>