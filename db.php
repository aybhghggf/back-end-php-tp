<?php 
try {
    $pdo= new PDO('mysql:host=localhost;dbname=objet_db', 'root', '');
} catch ( PDOException $e) {
    echo "Erreur de connexion à la base de données";
}
?>