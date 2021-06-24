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
                <button class="btn active"><a href="Update_filliere.php">Modifier Fillières</a></button>
                <button class="btn"><a href="Update_profs.php">Modifier profs</a></button>
                <button class="btn"><a href="Update_absenses.php">Modifier Absences</a></button>
            </div>
        </center>
        <center>
            <div class="btn_admin_modifier">
                <p><a href="hom_admin.php">Dashboard</a>
                    | <a href="view_filliere.php">Afficher la liste des filières</a>
                    | <a class="btn active" href="insert_filliere.php">Ajouter une filière</a>
                    | <a href="logout.php">Logout</a>
                </p>
                <div>
        </center>

        <center>
            <h1>Insérer une nouvelle filière</h1>
            <form name="form" method="post" action="" style="display: list-item; ">
                <input type="hidden" name="new" value="1" />
                <label for="filliere_id">Id:</label>
                <p><input type="text" class="inputFields" id="filliere_id" name="filliere_id" placeholder="Entrer l'id" required /></p>
                <label for="filliere_nom">Nom du filière:</label>
                <p><input type="text" class="inputFields" id="filliere_email" name="filliere_nom" placeholder="Entter le nom de la filière" required /></p>

                <p><input name="submit" id="join-btn" type="submit" value="Submit" /></p>
            </form>
        </center>




        <?php function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if (isset($_POST['filliere_id']) && isset($_POST['filliere_nom'])) {
            $filliere_nom = validate($_POST['filliere_nom']);
            $filliere_id = validate($_POST['filliere_id']);

            if (empty($filliere_nom)) {
                header("Location: insert_filliere.php?error=filliere name is required");
                exit();
            } else if (empty($filliere_id)) {
                header("Location: insert_filliere.php?error=filliere id is required");
                exit();
            } else {
                $sql = "insert into filliere
        (`filliere_id`,`filliere_nom`)  values  ('$filliere_id',
        '$filliere_nom')";
                mysqli_query($conn, $sql);
            }
        }
        $status = "New Record Inserted Successfully.";

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