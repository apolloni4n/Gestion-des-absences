<?php
session_start();
include "db_con.php";

if (isset($_SESSION['email'])) {
?>
  <!doctype html>
  <html lang="en">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Home Prof </title>
    <link href="hom_admin.css" rel="stylesheet">

  </head>

  <body>
    <?php
    $email = $_SESSION['email'];
    $sql = "select professeurs.professeur_email, professeurs.professeur_nom, professeurs.professeur_prenom from login ,professeurs where login.email=professeurs.professeur_email ";
    $result = mysqli_query($conn, $sql);


    $row = mysqli_fetch_all($result);
    $n = mysqli_num_rows($result);
    for ($i = 0; $i < $n; $i++) {
      if ($row[$i][0] == $email) {

    ?>
        <center>
          <div id="myDIV">
            <a href="homeprof.php"><img src="ensias.png" class="logo"></a>

            <div class="chip">
              <img src="prof.png" alt="Admin" width="96" height="96">
              <?php echo $row[$i][2]; ?>
            </div>

            <button class="btn"><a href="homeprof.php">Acceuil</a></button>
            <button class="btn active"><a href="./listeabs.php">Afficher la liste des absences</a></button>
            <button class="btn"><a href="ajoutabs.php">Ajouter l'absences</a></button>
            <button class="btn"><a href="profilp.php">Profil</a> </button>
            <button class="btn"><a href="logout.php">Logout</a></button>
          </div>
        </center><br /><br /><br /><br /><br /><br />

        <script>
          var btnContainer = document.getElementById("myDIV");

          // Get all buttons with class="btn" inside the container
          var btns = btnContainer.getElementsByClassName("btn");

          // Loop through the buttons and add the active class to the current/clicked button
          for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
              var current = document.getElementsByClassName("active");
              current[0].className = current[0].className.replace(" active", "");
              this.className += " active";
            });
          }
        </script>

        <center>
          <h1> Hello <?php echo $row[$i][2]; ?> </h1>
        </center>
    <?php
      }
    }
    $sql2 = "select module_nom from modules where prof_email1='$email' or prof_email2='$email' or prof_email3='$email' ";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_all($result2); ?>
    <center>
      <form id="form1" name="form1" method="get" action="" style="display: list-item; " >
        <label for="pet-select">Choix du module :</label>
        <select id="pet-select" class="inputFields" name='module' required>
          <option value="">--Please choose an option--</option>
          <?php foreach ($row2 as $module) : ?>
            <option value=' <?php echo  $module[0]; ?>'><?php echo $module[0]; ?></option>

          <?php endforeach; ?>
        </select>
        <p><input name="submit" class="button" id="join-btn" type="submit" value="Submit" /></p>
      </form>
    </center>
    <?php function validate($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    if (isset($_GET['module'])) {
      $modulei = validate($_GET['module']);


      $sql3 = "select `id`, `nom_etudiant`, `prenom_etudiant`, `date_seance`, `heure_debut`, `heure_fin`, `type_seance`, `justifiee`, `commentaire` from absences where module='$modulei' ";
      $result3 = mysqli_query($conn, $sql3);
      $row3 = mysqli_fetch_all($result3);
      $sqli = "select module_promo from modules where module_nom='$modulei' ";
      $resulti = mysqli_query($conn, $sqli);

      $rowi = mysqli_fetch_row($resulti);
      if ($rowi[0] == '1ere annee') {

    ?>
        <center>
          <form id="form1" method="post" action="" style="display: list-item; ">
            <label for="pet-select">Choix du groupe :</label>
            <select id='pet-select' class="inputFields" name='groupe' required>
              <option value="">--Please choose an option--</option>
              <option value="1">Groupe1</option>
              <option value="2">Groupe2</option>
              <option value="3">Groupe3</option>
              <option value="4">Groupe4</option>
              <option value="5">Groupe5</option>
              <option value="6">Groupe6</option>
            </select>
            <p><input name="submit" class="button" id="join-btn" type="submit" value="Submit" /></p>
          </form>
        </center>
        <?php

        if (isset($_POST['groupe'])) {
          $ivar = validate($_POST['groupe']);

          $sql3i = "select  absences.id,absences.nom_etudiant, absences.prenom_etudiant, absences.date_seance , absences.heure_debut, absences.heure_fin, absences.type_seance, absences.justifiee, absences.commentaire from absences,etudiant where 
          absences.nom_etudiant=etudiant.etudiant_nom and absences.module='$modulei' and etudiant.etudiant_groupe='$ivar' order by absences.date_seance ";
          $result3i = mysqli_query($conn, $sql3i);

          $row3i = mysqli_fetch_all($result3i);
        ?>
          <center>
            <h2>La liste d'absences du module <?php echo $modulei; ?> groupe <?php echo $ivar; ?></h2>
              
          </center>
      
          <center>
            <table   id="table_view" width="70%" border="1" style="border-collapse:collapse;">
             <center>  <thead  id="table_view" width="70%" border="1" style="border-collapse:collapse;">
                <tr>
                  <th scope="col">Nom </th>
                  <th scope="col">Prenom </th>
                  <th scope="col">Date de la seance</th>
                  <th scope="col">Heure_debut</th>
                  <th scope="col">Heure_fin</th>
                  <th scope="col">Type de la seance</th>
                  <th scope="col">Justifiée</th>
                  <th scope="col">Justification</th>
                  <th scope="col">Action</th>
                </tr>
              </thead> </center>
             <center>  <tbody   id="table_view" width="70%" border="1" style="border-collapse:collapse;">
<?php foreach ($row3i as  $j=>$absence):?>
                  <tr>
                    <td> <?php echo $absence[1] ?></td>
                    <td> <?php echo $absence[2] ?></td>
                    <td> <?php echo $absence[3] ?></td>
                    <td> <?php echo $absence[4] ?></td>
                    <td> <?php echo $absence[5] ?></td>
                    <td> <?php echo $absence[6] ?></td>
                    <td> <?php echo $absence[7] ?></td>
                    <td> <?php echo $absence[8] ?></td>

                    <td> 
                      <form name="form" method="post" action="" style="display: initial; ">
                        <input type="hidden" name="id" value="<?php echo $absence[0]; ?>">
                        <button type="submit" name="delete" id="join-btn">Supprimer</button>
                      </form>
                    </td>
                    
                  </tr> 
                 
                  <?php endforeach;
}
?> 
</tbody>
</table><?php  if($row3i){?> <center><button class="button-export"> <a href="exportabsencesp.php">Export to excel</a><?php } ?>


          <?php
          if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $sql = "delete from absences where id='$id'";
            if (mysqli_query($conn, $sql)) {
              echo "l'absence est bien ajouté";
            } else {
              echo "Error";
            }
          }
        } else {
          ?>
          <center>
          <h2>La liste d'absences totales du module<br/> <?php echo $modulei; ?></h2>
          <table   id="table_view" width="70%" border="1" style="border-collapse:collapse;">
            <thead>
              <tr>
                <th scope="col">Nom </th>
                <th scope="col">Prenom </th>
                <th scope="col">Date de la seance</th>
                <th scope="col">Heure_debut</th>
                <th scope="col">Heure_fin</th>
                <th scope="col">Type de la seance</th>
                <th scope="col">Justifiée</th>
                <th scope="col">Justification</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($row3 as $i => $absence) : ?>
                <tr>
                  <td> <?php echo $absence[1] ?></td>
                  <td> <?php echo $absence[2] ?></td>
                  <td> <?php echo $absence[3] ?></td>
                  <td> <?php echo $absence[4] ?></td>
                  <td> <?php echo $absence[5] ?></td>
                  <td> <?php echo $absence[6] ?></td>
                  <td> <?php echo $absence[7] ?></td>
                  <td> <?php echo $absence[8] ?></td>
                  <td><button class="btnSubmit"><a href="spfabs.php">Supprimer</a></button></td>
                </tr>
              <?php endforeach;?>
              
            </tbody>
          </table></center>
       <?php  if($row3i){?> <center><button class="button-export"> <a href="exportabsencesp.php">Export to excel</a><?php } ?>
      <?php
        }
      }
      ?>
  </body>
  <footer class="footer">
            <div class="container-fluid">
              <div id="course-footer"></div>

              <div>


                <div id="site-footer" class="d-flex">
                  <div class="footer-left-col d-flex">
                    <div id="helpdesk_footer">
                      <div class="contact">
                        <h3>Contact</h3>Gestion des absenses<br><i class="fa fa-phone" aria-hidden="true"></i>+41 58 606 90 17<span id="support_hours">09.00-12.00 13.30-17.00</span>
                        <div id="footer-email"><i class="fa fa-envelope-o" aria-hidden="true"></i>
                          <a class="contact-mail" href="mailto:khaoula_boukar@um5.ac.ma">khaoula_boukar@um5.ac.ma</a><br>
                          <a class="contact-mail" href="mailto:ikram_bourhim@um5.ac.ma">ikram_bourhim@um5.ac.ma</a>
                        </div>
                      </div>
                    </div>

                  </div>


                  <div style="clear:both;"></div>
                </div>
              </div>


            </div>
        </div>
        </footer>

  </html>
<?php

} else {
  header("Location: login.php");
  exit();
}
?>