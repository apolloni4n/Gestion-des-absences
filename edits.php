<?php
session_start();
include "db_con.php";

if (isset($_SESSION['email'])) {

    include "db_con.php";

    $id = $_REQUEST['id'];
    $query = "SELECT * from etudiant where id_etudiant='" . $id . "'";
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
            <a href="homestudent.php"><img src="ensias.png" class="logo"></a>

        </div>
        
        <center>
      <div id="myDIV">
          <a><img src="ensias.png" class="logo"></a>

      <div class="chip">
        <img src="admin.png" alt="Admin">
        Student
      </div>
        <button class="btn"><a href="homestudent.php">Acceuil</a></button>
        <button class="btn"><a href="profils.php">Profil</a></button>
        <button class="btn"><a href="logout.php">Logout</a></button>
      </div>
    </center>
        
<br /><br /><br /><br />
        <div>

            <center>
                <h1>Modifier mes informations:</h1>
                <form name="form" method="post" action="" style="display: list-item; ">
                    <label for="email">Email:</label>
                    <p><input type="text" class="inputFields" value="<?php echo $row["etudiant_email"]; ?>" id="email" name="email" placeholder="Entrer email" required /></p>

                    <label for="tel">Téléphone:</label>
                    <p><input type="text" class="inputFields" value="<?php echo $row["etudiant_tel"]; ?>" id="tel" name="tel" placeholder="Entrer tel" required /></p>
                    <label for="nom">Nom:</label>
                    <p><input type="text" class="inputFields" id="nom" value="<?php echo $row["etudiant_nom"]; ?>" name="name" placeholder="Entrer Name" required /></p>
                    <label for="prenom">Prénom:</label>

                    <p><input type="text" class="inputFields" id="prenom" value="<?php echo $row["etudiant_prenom"]; ?>" name="prenom" placeholder="Entrer Prenom" required /></p>
                    <label for="cin">Cin:</label>

                    <p><input type="text" class="inputFields" id="cin" value="<?php echo $row["etudiant_cin"]; ?>" name="cin" placeholder="Entrer cin" required /></p>
                    <label for="cne">cne:</label>

                    <p><input type="text" class="inputFields" value="<?php echo $row["etudiant_cne"]; ?>" id="cne" name="cne" placeholder="Entrer cne" required /></p>
                    <label for="filliere">Fillière:</label>

                    <p><input type="text" class="inputFields" id="filliere" value="<?php echo $row["etudiant_filiere"]; ?>" name="filliere" placeholder="Entrer filliere" required /></p>
                    <label for="mdp">Groupe:</label>

                    <p><input type="text" class="inputFields" id="grp" value="<?php echo $row["etudiant_groupe"]; ?>" name="grp" placeholder="Entrer groupe" required /></p>

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
        if (isset($_POST['email']) && isset($_POST['grp']) && isset($_POST['tel']) && isset($_POST['name']) && isset($_POST['prenom']) && isset($_POST['cin']) && isset($_POST['cne']) && isset($_POST['filliere'])) {
            $email =validate($_POST['email']);
            $grp =validate($_POST['grp']);
            $tel =validate($_POST['tel']);
            $nom =validate($_POST['name']);
            $prenom =validate($_POST['prenom']);
            $cin = validate($_POST['cin']);
            $cne =validate($_POST['cne']);
            $filliere =validate($_POST['filliere']);
            
            $update = "update etudiant set id_etudiant='" . $id . "', etudiant_email='" . $email . "',
etudiant_nom='" . $nom . "', etudiant_groupe='" . $grp . "', etudiant_prenom='" . $prenom . "',etudiant_cin='" . $cin . "',etudiant_cne='" . $cne . "',etudiant_filiere='" . $filliere . "',
etudiant_tel='" . $tel  . "' where id_etudiant='" . $id . "'";
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