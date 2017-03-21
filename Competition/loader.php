<?php
    function  __autoload($class){
    $classes= array("Competition","DBM","Equipe", "Rencontre","Joueur");
      foreach ($classes as $class ) {
      require 'class/'.$class.".php";
      }
  }

 ?>
