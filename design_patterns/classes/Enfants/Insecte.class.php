<?php

class Insecte extends Animal{

  //Fatal error: Cannot override final method Insecte::attaquer() in
    // final public function attaquer(){
    public function attaquer(){
    echo "L\'insecte attaque pique <br>";
  }
}
 ?>
