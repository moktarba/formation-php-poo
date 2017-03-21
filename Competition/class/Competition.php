<?php

  class Competition{

    private $_id;
    private $_nom;


    public function hydrate($donnees){
      foreach ($donnees as $key => $value) {
        $method = "set".ucfirst($key);
        if(method_exists($this, $method)){
          $this->$method($value);
        }
      }
    }
    public function __construct($donnees){
      if(!empty($id)){
        $this->hydrate($donnees);
      }
    }

    public function getId(){
      return $this->_id;
    }
    public function setId($id){
      $this->_id = $id;
    }
    public function getNom(){
      return $this->_nom;
    }
    public function setNom($nom){
      $this->_nom = $nom;
    }

  }


 ?>
