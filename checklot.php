<?php 
if($_POST && isset($_SESSION['user'])){
     $prix = $_POST['bid'];
    $lotobj = $_POST['lotobj'];
    $user_id = $_POST['userid'];
    echo $prix.'<br>';
    echo $lotid.'<br>';
    echo $user_id.'<br>';
    require_once 'config.php';
   $insert= InsertBid($user_id,$lotobj ,$prix);
   if($insert){
    echo "bid inserted";
   }else{
    echo "bid not inserted";
   }
   
}else{
   header( 'Location: login.php' );
}
?>