<?php
    /* //test securiser fichier
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
        exit();
    }*/

    //$bdd = new PDO("mysql:host=database-etudiants.iut.univ-paris8.fr; dbname=dutinfopw201632; port=mon_port", "dutinfopw201632", "jynuhuby");
    //$bdd = new PDO("mysql:host=database-etudiants.iut.univ-paris8.fr; dbname=dutinfopw201636; port=mon_port", "dutinfopw201636", "neqeragy");
    $bdd = new PDO("mysql:host=localhost; dbname=localprojweb6; port=3306", "root", "");

    $sql = 'SELECT nomVoiture FROM voiture';
    foreach($bdd->query($sql) as $row) {
        $a[] = $row['nomVoiture'];
    }
    /*   //TESTS
    $a[]= "ved";
    $a[]= "vezeg";
    $a[]= "vegre";
    */

    // get the q parameter from URL
    $q = $_REQUEST["q"];
    $hint = "";

    // lookup all hints from array if $q is different from ""
    if ($q !== "") {
      $q = strtolower($q);
      $len=strlen($q);
      $i=0;
      foreach($a as $name) {
        if($i > 5) break;
        if(stristr($q, substr($name, 0, $len))) {
          if($hint === "") {
              $hint = $name;
          }else{
              $hint .= ", $name";
          }
            $i+=1;
        }

      }
    }
    echo $hint === "" ? "aucune suggestion" : $hint;
?>