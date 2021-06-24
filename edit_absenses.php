<?php
session_start();
include "db_con.php";

if (isset($_SESSION['email'])) {

    include "db_con.php";

    $id = $_REQUEST['id'];
    $query = "SELECT * from absences where id='" . $id . "'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
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

        <div class="header">
            <a href="hom_admin.php"><img src="ensias.png" class="logo"></a>

        </div>
        <center>
            <div id="myDIV">
                <a href="hom_admin.php"><img src="ensias.png" class="logo"></a>

                <div class="chip">
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
                    | <a href="view_absenses.php">Afficher la liste des Absenses</a>
                    | <a class="btn active" href="modify_absenses.php">Modifier l'absense</a>
                    | <a href="logout.php">Logout</a>
                </p>
                <div>
        </center>


        <div>

            <center>
                <h1>Modifier l'absence:</h1>
                <form name="form" method="post" action="" style="display: list-item; ">
                    <input type="hidden" name="new" value="1" />
                    <label for="id">Id:</label>
                    <p><input type="text" value="<?php echo $id; ?>" class="inputFields" id="id" name="id" placeholder="Entrer id" required /></p>
                    <label for="mdl">Module:</label>
                    <p><input type="text" class="inputFields" value="<?php echo $row["module"]; ?>" id="mdl" name="mdl" placeholder="Entrer module" required /></p>

                    <label for="cne">cne:</label>
                    <p><input type="text" class="inputFields" value="<?php echo $row["cne"]; ?>" id="tel" name="cne" placeholder="Entrer cne" required /></p>
                    <label for="nom_etudiant">nom etudiant:</label>
                    <p><input type="text" class="inputFields" id="nom_etudiant" value="<?php echo $row["nom_etudiant"]; ?>" name="nom_etudiant" placeholder="Entrer Name" required /></p>
                    <label for="prenom_etudiant">prenom etudiant:</label>

                    <p><input type="text" class="inputFields" id="prenom_etudiant" value="<?php echo $row["prenom_etudiant"]; ?>" name="prenom_etudiant" placeholder="Entrer Prenom" required /></p>
                    <label for="date_seance">date de seance:</label>

                    <p><input type="text" class="inputFields" id="date_seance" value="<?php echo $row["date_seance"]; ?>" name="date_seance" placeholder="Entrer la date" required /></p>
                    <label for="heure_debut">heure debut:</label>

                    <p><input type="text" class="inputFields" value="<?php echo $row["heure_debut"]; ?>" id="heure_debut" name="heure_debut" placeholder="Entrer heure debut sceance" required /></p>
                    <label for="heure_fin">heure fin:</label>

                    <p><input type="text" class="inputFields" id="heure_fin" value="<?php echo $row["heure_fin"]; ?>" name="heure_fin" placeholder="Entrer heure fin" required /></p>
                    <label for="type_seance">type seance:</label>

                    <p><input type="text" class="inputFields" id="type_seance" value="<?php echo $row["type_seance"]; ?>" name="type_seance" placeholder="Entrer type de seance" required /></p>

                    <p><input name="submit" id="join-btn" type="submit" value="Submit" /></p>
                </form>
            </center>


        </div>
        <?php

        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if ( isset($_POST['mdl'])  && isset($_POST['id']) && isset($_POST['cne']) && isset($_POST['nom_etudiant']) && isset($_POST['prenom_etudiant']) && isset($_POST['date_seance']) && isset($_POST['heure_debut']) && isset($_POST['heure_fin']) && isset($_POST['type_seance'])) {
            $id = validate($_POST['id']);
            $mdl = validate($_POST['mdl']);
            $cne = validate($_POST['cne']);
            $nom_etudiant = validate($_POST['nom_etudiant']);
            $prenom_etudiant = validate($_POST['prenom_etudiant']);
            $date_seance = validate($_POST['date_seance']);
            $heure_debut = validate($_POST['heure_debut']);
            $heure_fin = validate($_POST['heure_fin']);
            $type_seance = validate($_POST['type_seance']);
            $sql = "update `absences` set
module='" . $mdl . "', cne='" . $cne . "', nom_etudiant='" . $nom_etudiant . "',prenom_etudiant='" . $prenom_etudiant . "',date_seance='" . $date_seance . "',heure_debut='" . $heure_debut . "',
heure_fin='" . $heure_fin  . "',
type_seance='" . $type_seance  . "' where id='" . $id . "'";
            mysqli_query($conn, $update);
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