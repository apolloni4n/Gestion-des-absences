<?php
session_start();
include "db_con.php";

if (isset($_SESSION['email'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Gestion Des Absenses</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="hom_admin.css" rel="stylesheet">
    </head>

    <body>


        <center>
            <div id="myDIV">
                <a href="hom_admin.php"><img src="ensias.png" class="logo"></a>
                <div class="chip">
                    <img src="admin.png" alt="Admin" width="96" height="96">
                    Admin
                </div>

                <button class="btn"><a href="hom_admin.php">Acceuil</a></button>
                <button class="btn"><a href="Update_student.php">Modifier Etudiants</a></button>
                <button class="btn"><a href="Update_filliere.php">Modifier Fillières</a></button>
                <button class="btn"><a href="Update_profs.php">Modifier profs</a></button>
                <button class="btn active"><a href="Update_absenses.php">Modifier Absences</a></button>
            </div>
        </center>
        <center>
            <div class="btn_admin_modifier">
                <p><a href="hom_admin.php">Dashboard</a>
                    | <a class="btn active" href="view_absenses.php">Afficher la liste des Absenses</a>
                    | <a href="modify_absenses.php">Modifier l'absense</a>
                    | <a href="logout.php">Logout</a>
                </p>
                <div>
        </center>

        <center>
            <h2>La liste des absences</h2>
        </center>
 <center><button class="button-export"> <a href="exportabsences.php">Export to excel</a>
                                </button></center>
        <center>
            <table id="table_view" width="70%" border="1" style="border-collapse:collapse;">
                <thead>
                    <tr>
                        <th><strong>Id</strong></th>

                        <th><strong>Module</strong></th>
                        <th><strong>cne</strong></th>
                        <th><strong>nom d'étudiant</strong></th>
                        <th><strong>prénom d'étudiant</strong></th>
                        <th><strong>date de séance</strong></th>
                        <th><strong>heure début</strong></th>
                        <th><strong>heure de fin</strong></th>
                        <th><strong>type séance</strong></th>
                        <th><strong>justification</strong></th>
                        <th><strong>commentaire</strong></th>
                        <th><strong>Delete</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "db_con.php";

                    $sql = "select  id,module, cne, nom_etudiant, prenom_etudiant, date_seance, heure_debut, heure_fin, type_seance, justifiee, commentaire from absences";
                   
 $result = mysqli_query($conn, $sql);
                    $count = 1;
                    $sql2 = "select  `id`,`module`, `cne`, `nom_etudiant`, `prenom_etudiant`, `date_seance`, `heure_debut`, `heure_fin`, `type_seance`, `justifiee`, `commentaire` from `absences` INTO OUTFILE   '/tmp/myfile.csv' FIELDS    TERMINATED BY ',' ESCAPED BY '\\' ";
                    $result2 = mysqli_query($conn, $sql2);

                    while ($row = mysqli_fetch_assoc($result)) { ?>

                        <div id="liste_etud">

                            <td align="center"><?php echo $row["id"]; ?></td>

                            <td align="center"><?php echo $row["module"]; ?></td>
                            <td align="center"><?php echo $row["cne"]; ?></td>
                            <td align="center"><?php echo $row["nom_etudiant"]; ?></td>
                            <td align="center"><?php echo $row["prenom_etudiant"]; ?></td>
                            <td align="center"><?php echo $row["date_seance"]; ?></td>
                            <td align="center"><?php echo $row["heure_debut"]; ?></td>
                            <td align="center"><?php echo $row["heure_fin"]; ?></td>
                            <td align="center"><?php echo $row["type_seance"]; ?></td>
                            <td align="center"><?php echo $row["justifiee"]; ?></td>
                            <td align="center"><?php echo $row["commentaire"]; ?></td>

                            <td align="center">
                                <button class="button-delete"> <a href="delete_absenses.php?module=<?php echo $row['id']; ?>">Delete</a>
                                </button>
                            </td>

                            </tr><br />
                        </div>
                    <?php $count++;
                    } ?>
                </tbody>
            </table>
        </center>

<center><form id="form1" name="form1" method="get" action="" style="display: list-item; " >
        <label for="pet-select">Choix de la fillière :</label>
        <select id="pet-select" class="inputFields" name='filliere' required>
          <option value="">--Please choose an option--</option>
          <?php
           $sql2 = "select filliere_nom from filliere";
            $result2 = mysqli_query($conn, $sql2);
            
           while($row2 = mysqli_fetch_assoc($result2)) { ?>
            <option value=' <?php echo  $row2["filliere_nom"]; ?>'><?php echo  $row2["filliere_nom"];} ?></option>
           

        </select>
        <p><input name="submit" class="button" id="join-btn" type="submit" value="Submit" /></p>
      </form></center>
      <?php   if (isset($_GET['filliere'])) {
      $fill = validate($_GET['filliere']);
      $sql3 = "select id,module, cne, nom_etudiant, prenom_etudiant, date_seance, heure_debut, heure_fin, type_seance, justifiee, commentaire from absences join etudiant e on e.etudiant_nom=absence.nom_etudiant having e.etudiant_filiere=$fill";
      $result3 = mysqli_query($conn, $sql3);
      $row3 = mysqli_fetch_all($result3);
      ?>
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
<?php foreach ($row3 as  $j=>$absence):?>
                  <tr>
                    <td> <?php echo $absence[1] ?></td>
                    <td> <?php echo $absence[2] ?></td>
                    <td> <?php echo $absence[3] ?></td>
                    <td> <?php echo $absence[4] ?></td>
                    <td> <?php echo $absence[5] ?></td>
                    <td> <?php echo $absence[6] ?></td>
                    <td> <?php echo $absence[7] ?></td>
                    <td> <?php echo $absence[8] ?></td>

                    <td>   <?php endforeach;
}
?> 
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
        </div>


    </body>

    </html><?php

        } else {
            header("Location: login.php");
            exit();
        }
            ?>