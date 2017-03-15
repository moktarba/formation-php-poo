<?php

class Rectangle {
  private $hauteur;
  private $largeur;
  private $couleur;

  // La classe est responsable de la gestion du carré
  public static $estCarre;

  public function __construct($params) {
    $this->hauteur = $params['hauteur'];
    $this->largeur = $params['largeur'];

    // opérateur ternaire (expression booléenne) ? instruction si vrai : instruction si faux
    $this->couleur = ($params['couleur'] == 0)
      ? $this->couleurAleatoire() : $params['couleur'];

    self::$estCarre = $this->hauteur === $this->largeur;

  }

  public function getHauteur() {
    return $this->hauteur;
  }
  public function getLargeur() {
    return $this->largeur;
  }
  public function getCouleur() {
    return $this->couleur;
  }

  private function couleurAleatoire() {
    $couleurs = array('red', 'green', 'blue', 'orange', '#44ff66');
    $index = rand(0, sizeof($couleurs) - 1);
    return $couleurs[$index];
  }

  public function genereDiv() {
    $css = 'margin:10px;';
    $css .= 'width:' . $this->getLargeur() . 'px;';
    $css .= 'height:' . $this->getHauteur() . 'px;';
    $css .= 'background-color:' . $this->getCouleur();

    return '<div style="'. $css .'"></div>';
  }
}

$nb_rectangles = $_POST['rectangles']['nombre'];

for ($i=0; $i<$nb_rectangles; $i++) {
  $rectangle = new Rectangle($_POST['rectangles']);
  if (Rectangle::$estCarre) {
    echo 'Le carré n\'est pas autorisé';
    break;
  } else {
    echo $rectangle->genereDiv();
  }

}

?>
