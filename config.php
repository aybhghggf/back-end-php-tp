<?php
require_once 'db.php';

function getAllObjects()
{
    global $pdo;
    $stmt = $pdo->prepare("
        SELECT * from objects INNER JOIN photos ON objects.lot = photos.object_lot
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getObjectById($id)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * 
FROM objects 
INNER JOIN photos ON objects.lot = photos.object_lot 
WHERE objects.lot = :id;
");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $objet = $stmt->fetch();
    return $objet;
}
function SignIn($Nom, $email, $password)
{
    global $pdo;
    $stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?,?,?)');
    $stmt->execute([$Nom, $email, $password]);
    header('location:login.php?message=sign');
}
function getMesSign()
{
    if (isset($_GET['message'])) {
        echo '';
    }
}
function Login($email, $password)
{
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['id_user'] = $user['id'];
        $_SESSION['user'] = true;
        $_SESSION['username'] = $user['name'];
        header('Location: index.php?message=login');
        exit();
    } else {
        header('Location: login.php?message=error');
        exit();
    }
}
function InsertBid($id_user, $objLot, $price)
{
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO `bids`(`user_id`, `object_lot`, `amount`) VALUES (?, ?, ?)");
    $stmt->execute([$id_user, $objLot, $price]);
    header('Location: index.php?message=bid');
    exit();
}
function getALLBids($idobj)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT users.name, bids.amount, bids.date_bid FROM bids INNER JOIN users ON bids.user_id = users.id WHERE bids.object_lot = 4 ORDER BY bids.date_bid DESC;");
    $stmt->execute();
    $bids = $stmt->fetchAll();
    return $bids;
}
