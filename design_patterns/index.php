<?php

require "autoload.php";
require "classes/Animal.class.php";
require "classes/Animals.class.php";
// require "classes/Final.class.php";


$felin = new Felins();
$insecte = new Insecte();
$fourmi = new Fourmi();
$tigre = new Tigre();
//Fatal error: Cannot instantiate abstract class Animal in
// $animal = new Animal();
$felin->quiSuiJe();


$insecte->attaquer();
$fourmi ->attaquer();

 ?>
