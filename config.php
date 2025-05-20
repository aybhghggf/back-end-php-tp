<?php 
require_once 'db.php';

function getAllObjects() {
    global $pdo; 
    $stmt = $pdo->prepare("
        SELECT * from objects INNER JOIN photos ON objects.lot = photos.object_lot
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
function Login($email, $password){
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if($user && password_verify($password, $user['password'])){
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['user'] = true;
        $_SESSION['username'] = $user['name'];
        header('Location: index.php?message=login');
        exit();
    } else {
        header('Location: login.php?message=error');
        exit();
    }
}

?>