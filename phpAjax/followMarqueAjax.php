<?php
$conn =new PDO("mysql:host=localhost; dbname=localprojweb", "root", "");

$reqIdConstructeur = $conn->prepare('SELECT idConstructeur FROM voiture WHERE idVoiture=?');
$reqIdConstructeur->execute(array($_REQUEST["idVoiture"]));
$resultIdConstructeur = $reqIdConstructeur->fetch();

$requeteUtil = $conn->prepare('SELECT idUtilisateur from utilisateur where login = ?');
$requeteUtil->execute(array($_REQUEST["login"]));
$iduser = $requeteUtil->fetch();

$reqFollow = $conn->prepare('SELECT * FROM suivreconstructeur WHERE idUtilisateur=? AND idConstructeur=?');
$reqFollow->execute(array($iduser['idUtilisateur'], $resultIdConstructeur['idConstructeur']));
//$reqFollow->execute(array(1, 18));
$resultFollow = $reqFollow->fetch();

if (is_null($resultFollow['idUtilisateur'])) {
  //pas follow
  echo "Suivre la Marque";
}else{
  //deja follow
  echo "Ne plus suivre la Marque";
}
?>

