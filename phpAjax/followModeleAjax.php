<?php
$conn =new PDO("mysql:host=localhost; dbname=localprojweb6", "root", "");

$requeteUtil = $conn->prepare('SELECT idUtilisateur from utilisateur where login = ?');
$requeteUtil->execute(array($_REQUEST["login"]));
$iduser = $requeteUtil->fetch();

$reqFollow = $conn->prepare('SELECT * FROM suivremodele WHERE idUtilisateur=? AND idVoiture=?');
$reqFollow->execute(array($iduser['idUtilisateur'], $_REQUEST["idVoiture"]));
//$reqFollow->execute(array(1, 18));
$resultFollow = $reqFollow->fetch();

if (!$resultFollow) {
  //pas follow
  echo "Suivre la Voiture";
}else{
  //deja follow
  echo "Ne plus suivre la Voiture";
}
?>

