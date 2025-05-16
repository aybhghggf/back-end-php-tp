<?php 
require_once 'db.php';

function getAllObjects(){
    global $pdo; 
    $stmt = $pdo->prepare('SELECT * FROM objects');
    $stmt->execute();
    $obj= $stmt->fetchAll();
    return $obj;
}
function SignIn($Nom,$email,$password){
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?,?,?)');
    $stmt->execute([ $Nom , $email, $password]);
    header('location:login.php?message=sign');
}
function getMesSign(){
    if(isset($_GET['message'])){
        echo '';
    }
}
function Login( $email, $password){
    global $pdo;
    $stmt = $pdo->prepare( 'SELECT * FROM users WHERE email = ? AND password = ?' );
    $stmt-> execute([$email, $password]);
    $user = $stmt-> fetch();
    if($user){
            if($user['email'] == $email && $user['password'] == $password){
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['user']= true;
                    $_SESSION['username']= $user['name'];
                    header('location:index.php?message= login');
            }else{
                header('location:login.php?message= error');
            }
    }
}
?>