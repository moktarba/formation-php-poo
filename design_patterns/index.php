<?php

require "abstract.php";
require "final.php";

$felin = new Felins();
$insecte = new Insecte();
$fourmi = new Fourmi();
//Fatal error: Cannot instantiate abstract class Animal in
// $animal = new Animal();
$felin->quiSuiJe();


$insecte->attaquer();
$fourmi ->attaquer();

 ?>
