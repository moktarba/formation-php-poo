<?php

  class Rencontre{
    private $id;
    private $equipe1;
    private $equipe2;
    private $score1;
    private $score2;
    private $date;
    private $lieu;
    private $competition;

    public function hydrate($donnees){
      foreach ($donnees as $key => $value) {
        $method = 'set'.ucfirst($key);
        if (method_exists($this,$method)) {
          $this->$method($value);
        }
      }
    }
    public function __construct($donnees){
      $this->setDb('');
      if (!empty($donnees)) {
        $this->hydrate($donnees);
      }
    }
    public function liste(){
      $requete = "SELECT rencontre.id, E1.nom AS equipe1, E2.nom AS equipe2, score1, score2, lieu, competition
      FROM rencontre
      INNER JOIN equipe E1 ON rencontre.equipe1 = E1.id
      INNER JOIN equipe E2 ON rencontre.equipe1 = E2.id
      INNER JOIN competition C ON rencontre.competition = C.id";
      $results = $this->_db->query($requete);
      while($donnees = $results->fetch(PDO:FETCH_ASSOC{)){
        $rencontres[]= new Rencontre($donnees);
      }
      return  $rencontres;
    }
  }
?>
