<?php
  abstract class Animal{


  }

  //Fatal error: Class Tigre may not inherit from final class (Felin) in
 // final  class Felin extends Animal{
 class Felin extends Animal{
  }
  class Tigre extends Felin{

  }

  class Insecte extends Animal{

    //Fatal error: Cannot override final method Insecte::attaquer() in
      // final public function attaquer(){
      public function attaquer(){
      echo "L\'insecte attaque pique <br>";
    }
  }

  class Fourmi extends Insecte {
    public function attaquer(){
      echo "La fourmi attaque et mord <br>";
    }
  }
 ?>
