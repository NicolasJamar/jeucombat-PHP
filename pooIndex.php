<?php

function chargerPerso($Personnage){

	require $Personnage . ".php";
}

spl_autoload_register('chargerPerso');

$perso1 = new Personnage(Personnage::FORCE_MIN, 2);
$perso2 = new Personnage(Personnage::FORCE_MOY, 5);
$Perso3 = new Personnage(Personnage::FORCE_MAX, 10);


$perso1->frapper($perso2);
$perso1->gagnerExperience();

$perso2->frapper($perso1);
$perso2->gagnerExperience();

echo "Le Perso1 a " . $perso1->experience() . " d'expérience, <br>";
echo $perso1->force() . " de force";
echo " et " . $perso1->degats() . " de dégats. <br><br>";

echo "Le Perso2 a " . $perso2->experience() . " d'expérience, <br>";
echo $perso2->force() . " de force";
echo " et " . $perso2->degats() . " de dégats. <br><br>";

$perso1->frapper($perso2);
$perso1->gagnerExperience();

echo "Le Perso1 a " . $perso1->experience() . " d'expérience, <br>";
echo $perso1->force() . " de force";
echo " et " . $perso1->degats() . " de dégats. <br><br>";


echo "Le Perso3 a ". $Perso3->experience() . " points d'expérience. <br>";

echo "Perso3 dit : <quote>" . $Perso3::parler() . "</quote>";