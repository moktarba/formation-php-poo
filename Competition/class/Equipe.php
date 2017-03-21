<?php
<<<<<<< HEAD

  class Equipe{
    private $_id;
    private $_nom;
    private $_logo;
    private $_annee_de_creation;
    private $_db;

    public function __construct(array $donnees= []){
      if(!empty($donnees)){
        $this->setDb(new PDO('mysql:host=localhost;dbname=formation-php-poo;charset=utf8', 'root', ''));

        $this->setId($donnees['id']);
        $this->setNom($donnees['nom']);
        $this->setLogo($donnees['logo']);
        $this->setAnneeDeCreation($donnees['annee_de_creation']);
      }

    }

    public function getJoueurs()
    {
      $joueurs = [];

      $requete = 'SELECT * FROM joueur WHERE equipe = :id';
      $prepare = $this->db->prepare($requete);
      $prepare->bindValue(':id', $this->getId());
      $prepare->execute();

      while($donnees = $prepare->fetch(PDO::FETCH_ASSOC)) {
        $joueurs[] = new Joueur($donnees);
      }

      return $joueurs;
    }
    public function getButs()
    {
      $buts = [];

      $requete = 'SELECT * FROM but, rencontre, joueur WHERE equipe = :id
      AND but.joueur = joueur.id
      AND but.rencontre = rencontre.id
      ';
      $prepare = $this->db->prepare($requete);
      $prepare->bindValue(':id', $this->getId());
      $prepare->execute();

      while($donnees = $prepare->fetch(PDO::FETCH_ASSOC)) {
        $joueurs[] = new But($donnees);
      }

      return $buts;
    }

    public function liste()
    {
      $equipes = [];
      $requete =
      'SELECT DISTINCT nom, id, logo, annee_de_creation
        FROM Equipe GROUP BY nom ORDER BY nom ASC';
      $reponse = $this->_db->query($requete);
      while($donnees = $reponse->fetch(PDO::FETCH_ASSOC)) {
        $equipes[] = new Equipe($donnees);
      }
      return $equipes;
    }

    public function getId(){
      return $this->_id;
    }
    public function getNom(){
      return $this->_nom;
    }
    public function getlogo(){
      return $this->_logo;
    }
    public function getAnneeDeCreation(){
      return $this->_annee_de_creation;
    }

    public function setId($id){
      $this->_id = $id;
    }
    public function setNom($nom){
      $this->_nom = $nom;
    }
    public function setLogo($logo){
      $this->_logo = $logo;
    }
    public function setAnneeDeCreation($annee_de_creation){
      $this->_annee_de_creation = $annee_de_creation;
    }
    public function setDb($db){
      $this->_db = $db;
    }
  }
