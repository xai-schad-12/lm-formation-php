<?php 

try {

   $pdo = new PDO("mysql:host=localhost;dbname=lmpresence", "root", "");

   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
} catch (\Throwable $th) {
    //throw $th;
    die("Erreur de connexion à la base de données : " . $th->getMessage());
}


?>