<?php

// Classe non instanciable
  abstract class Animals{

    public function quiSuiJe(){
        echo "je suis un animal <br>";
    }
//Fatal error: Abstract function Animal::hurler() cannot contain body in
  //  abstract  public function hurler(){
  //
  // }

  }
