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
    private $_db;

    public function hydrate($donnees){
      foreach ($donnees as $key => $value) {
        $method = 'set'.ucfirst($key);
        if (method_exists($this,$method)) {
          $this->$method($value);
        }
      }
    }
    public function __construct(array $donnees = []){
      $this->setDb(new PDO("mysql:host=localhost; dbname=formation-php-poo", "root",""));
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
      while($donnees = $results->fetch(PDO::FETCH_ASSOC)){
        $rencontres[]= new Rencontre($donnees);
      }
      return  $rencontres;
    }

    public function getId(){
      return $this->id;

    }
    public function getEquipe1(){
      return $this->equipe1;
    }
    public function setEquipe1($equipe1){
      $this->equipe1 = $equipe1;
    }
    public function getEquipe2(){
      return $this->equipe2;
    }
    public function setEquipe2($equipe2){
      $this->equipe2 = $equipe2;
    }
    public function getScore1(){
      return $this->score1;
    }
    public function setScore1($score1){
      $this->score1 = $score1;
    }
    public function getScore2(){
      return $this->score1;
    }
    public function setScore2($score2){
      $this->score2 = $score2;
    }
    public function getDate(){
      return $this->date;
    }
    public function setDate($date){
      $this->date= $date;
    }
    public function getLieu(){
      return $this->lieu;
    }
    public function setLieu($lieu){
      $this->lieu = $lieu;
    }
    public function getCompetition(){
      return $this->competition;
    }
    public function setCompetition($competition){
      $this->competition = $competition;
    }

    public function setDb($db){
      $this->_db = $db;
    }
  }
?>
