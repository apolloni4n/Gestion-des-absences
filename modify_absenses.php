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
                    | <a href="view_absenses.php">Afficher la liste des Absenses</a>
                    | <a class="btn active" href="modify_absenses.php">Modifier l'absense</a>
                    | <a href="logout.php">Logout</a>
                </p>
                <div>
        </center>

        <center>
        <button class="button-export"><a href="avertiss.php" >Envoyer un avertissement</a>
                                </button>
        </center>
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

                    $sql = "select  `id`,`module`, `cne`, `nom_etudiant`, `prenom_etudiant`, `date_seance`, `heure_debut`, `heure_fin`, `type_seance`, `justifiee`, `commentaire` from `absences`";
                    $result = mysqli_query($conn, $sql);
                    $count = 1;
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
                                <button class="button-edit"> <a href="edit_absenses.php?id=<?php echo $row["id"]; ?>">Edit</a>
                                </button>
                            </td>

                            </tr><br />
                        </div>
                    <?php $count++;
                    } ?>
                </tbody>
            </table>
        </center>



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