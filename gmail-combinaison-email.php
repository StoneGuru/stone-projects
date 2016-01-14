<?php
set_time_limit(0);
ini_set('memory_limit', '-1');


$adress = "monadressegmail";


// Array des adresses possibles.
$adresses_possibles = array();
$adresses_possibles[] = $adress;

// Constante
$longueur_base = strlen($adress);

for($i = 1; $i < 500000; $i++) {

  $nombre_point = rand(1,$longueur_base-1);
  $adress_modif = $adress;
  for ($j=0; $j < $nombre_point ; $j++) {
    $position = rand(1,strlen($adress_modif)-1);
    if (substr($adress_modif, (1+$position)*(-1), ($position)*(-1)) != "." && substr($adress_modif, ($position)*(-1), ($position-1)*(-1)) != ".") {
      $adress_modif = substr_replace($adress_modif, ".", (-1)*$position, 0);
    }
  }
  $adresses_possibles[] = $adress_modif;
}

$adresses_possibles = array_flip($adresses_possibles);
$adresses_possibles = array_flip($adresses_possibles);
$adresses_possibles = array_merge($adresses_possibles);

foreach ($adresses_possibles as $a) {
  file_put_contents("adress.txt", $a."@gmail.com\n", FILE_APPEND);
}

?>
