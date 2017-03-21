<?php
  require 'loader.php';

  $equipe = new Equipe();
  $equipes= $equipe->liste();
  $rencontre = new Rencontre();
  $rencontres= $rencontre->liste();
  // print_r($rencontres);
  $dbm = new DBM('Equipe');
  $equipes = $dbm->findAll();
  // $dbm2 = new DBM();
  // print_r($equipes);
  // $equipesbyEquipe = new Equipe();
  // $equipesbyEquipes = $equipesbyEquipe->liste();
  // // print_r($equipesbyEquipes);
 ?>

<!DOCTYPE html>
<html>
  <head>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Compétitions sportives</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <h3>Rencontres Sportives</h3>
          <div class="col-md-12">
            <form class="formulaire" action="app.php" method="post">
              <div class="form-group col-md-6">
                <h5>Equipe recevant</h5>
                <div class="" id= "selectedEquipe1">
                  <select class="col-md-6" name="rencontre[equipe1]">
                    <option value="0">Sélectionnez une équipe</option>
                    <?php foreach($equipes as $equipe): ?>
                      <option id="<?php echo $equipe->getId(); ?>" value="<?php echo $equipe->getId(); ?>"><?php echo  $equipe->getNom(); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-3"  id="score_equipe1">
                  <input type="text" name="rencontres[score1]" disabled="disabled" value="0">
                </div>
                  <div class="row">
                    <ul class="listeButeurs1"></ul>
                    <div class="formButeurEquipe1">
                        <div style="display:inline-block">Buteur </div> <div id="joueursEquipe1" class="inline">
                          Minute <input type="text" class="">
                          <button type="button" id="ajouteButeur1">Ajouter un buteur</button>
                        </div>
                    </div>
                  </div>

              </div>
              <div class="form-group col-md-6">
                <h5>Equipe reçue</h5>
                <div class="col-md-6" id= "selectedEquipe2">
                  <select class="" name="rencontre[equipe2]">
                    <option value="0">Sélectionnez une équipe</option>
                    <?php foreach($equipes as $equipe): ?>
                      <option id="<?php echo $equipe->getId(); ?>" value="<?php echo $equipe->getId(); ?>"><?php echo  $equipe->getNom(); ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-3"  id="score_equipe1">
                  <input type="text" name="rencontres[score2]" disabled="disabled" value="0">
                </div>
              </div>
            </form>
        <form class="col s12" action="app.php" method="post">
          <div class="col s6">
            <div class="input-field col s6">
              <label for="selectEquipe1">Equipe recevant</label>
              <select  id= "selectEquipe1" name="rencontres[equipe1]">
                <option value="0">Sélectionnez une équipe</option>
                <?php foreach ($rencontres as $rencontre): ?>
                  <option value="<?php echo $rencontre->getId(); ?>"><?php echo $rencontre->getEquipe1(); ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="input-field col s4">
              <label for="ScoreEquipe1">Score</label><br>
              <input type="text" id="ScoreEquipe1" disabled value="0">
              <input type="hidden" id="ScoreHidden" name="rencontres[score1]" >
            </div>
          </div>
          <div class="col s6">
            <div class="input-field col s6">
              <label for="selectEquipe2">Equipe reçue</label>
              <select  id= "selectEquipe2" name="rencontres[equipe2]">
                <option value="0">Sélectionnez une équipe</option>
                <?php foreach ($rencontres as $rencontre): ?>
                  <option value="<?php echo $rencontre->getId(); ?>"><?php echo $rencontre->getEquipe2(); ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="input-field col s4">
              <label for="ScoreEquipe2">Score</label><br>
              <input type="text" id="ScoreEquipe2" disabled value="0">
              <input type="hidden" id="ScoreHidden" name="rencontres[score2]" >
            </div>
          </div>
      </div>
    </div>
  </body>
</html>
