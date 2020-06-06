<?php
    require_once('identifier.php');

    require_once('connexiondb.php');

    $iduser=isset($_POST['iduser'])?$_POST['iduser']:0;

    $login=isset($_POST['login'])?$_POST['login']:"";

    $email=isset($_POST['email'])?strtoupper($_POST['email']):"";
    
    $requete="update utilisateur set login=?,email=? where iduser=?";

    $params=array($login,$email,$iduser);

    $resultat=$pdo->prepare($requete);

    $resultat->execute($params);
    
    header('location:login.php');
?>
