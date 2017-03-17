<?php
  require "class/Rencontre.php";
  require "class/Competition.php";
  require "class/DBM.php";
  require "class/Equipe.php";

  $equipe = new Equipe();
  // $equipes= $equipe->liste();
  $rencontre = new Rencontre();
  $rencontres =  $rencontre->liste();
  $competition = new DBM('Competition');

  var_dump($rencontres);

 ?>
<!DOCTYPE html>
<html>
  <head>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>
     <!--Let browser know website is optimized for mobile-->
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8">
    <title>Les rencontres</title>
  </head>
  <body>
    <div class="container">
      <h3>Rencontres sportives</h3>
      <div class="row">
        <form class="col s12" action="app.php" method="post">
          <div class="col s6">
            <div class="input-field col s6">
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
              <select  id= "selectEquipe1" name="rencontres[equipe2]">
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
        </form>
      </div>
    </div>
  </body>
</html>
