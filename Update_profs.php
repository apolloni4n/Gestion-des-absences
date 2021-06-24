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
        <button class="btn active"><a href="Update_profs.php">Modifier profs</a></button>
        <button class="btn"><a href="Update_absenses.php">Modifier Absences</a></button>
          <button  > <a href="logout.php"><img src="logoutbutto.png" class="logoutbutt"></a></button>  
      </div>
    </center>
    <br />
    <center>
      <div class="btn_admin_modifier">
        <p><a href="hom_admin.php">Dashboard</a>
          | <a href="view_Profs.php">Afficher La liste des professeurs</a>
          | <a href="insert_profs.php">Ajouter un professeur</a>
          | <a href="logout.php">Logout</a>
        </p>
      </div>
    </center>
    <br /><br />

    <div class="container3">
      <center>
        <diV> <img src="banner-elc1.png" id="bannerelearn"></diV>
      </center><br /> <strong>Le gestionnaire des absences est un service qui relève de l'Ensias ,<br />réalisé par les étudiants pour les étudiants. <br />Il a pour mission principale d'organniser le service d'absence au sein de l'école.</strong>
    </div>




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