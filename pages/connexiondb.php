<?php
try {

    $pdo = new PDO("mysql:host=localhost;dbname=gestion_stag",
        "root", "Tr@mW0rk");

}catch (Exception $e){
    die('Erreur : ' . $e->getMessage());

    //die('Erreur : impossible de se connecter à la base de donnée');
}
?>

