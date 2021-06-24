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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <link href="hom_admin.css" rel="stylesheet">
    <script>
      function search() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("table_view");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[1];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display == "";
            } else {
              tr[i].style.display = "none";
            }
          }
        }
      }
    </script>
  </head>

  <body>

    <div class="header">

    </div>
    <center>
      <div id="myDIV">
      <a href="hom_admin.php"><img src="ensias.png" class="logo"></a>

        <div class="chip">
                    <img src="admin.png" alt="Admin">

          Admin
        </div>

        <button class="btn"><a href="hom_admin.php">Acceuil</a></button>
        <button class="btn active"><a href="Update_student.php">Modifier Etudiants</a></button>
        <button class="btn"><a href="Update_filliere.php">Modifier Fillières</a></button>
        <button class="btn"><a href="Update_profs.php">Modifier profs</a></button>
        <button class="btn"><a href="Update_absenses.php">Modifier Absences</a></button>
      </div>
    </center>
    <center>
      <div class="btn_admin_modifier">
        <p><a href="hom_admin.php">Dashboard</a>
          | <a class="btn active" href="view.php">Afficher la liste des étudiants</a>
          | <a href="insert.php">Ajouter un étudiant</a>
          | <a href="logout.php">Logout</a>
        </p>
        <div>
    </center>
    <center>
      <h2>View Records</h2>
    </center>
    <center> <input type="text" id="myInput" onkeyup="search()" placeholder="Search for names..">
      <table id="table_view" width="70%" border="1" style="border-collapse:collapse;">
        <thead>
          <tr>
            <th><strong>Id</strong></th>
            <th><strong>Nom et Prénom</strong></th>
            <th><strong>Email</strong></th>
            <th><strong>filliere</strong></th>
            <th><strong>Groupe</strong></th>

            <th><strong>Edit</strong></th>
            <th><strong>Delete</strong></th>
          </tr>
        </thead>
        <tbody>

          <?php
          include "db_con.php";

          $sql = "select id_etudiant, etudiant_nom , etudiant_prenom , etudiant_email ,etudiant_filiere, etudiant_groupe from etudiant";
          $result = mysqli_query($conn, $sql);
          $count = 1;




          while ($row = mysqli_fetch_assoc($result)) { ?>


            <div id="liste_etud">
              <tr>
                <td align="center"><?php echo $row["id_etudiant"]; ?></td>



                <td align="center"><?php echo $row["etudiant_prenom"]; ?> <?php echo $row["etudiant_nom"]; ?></td>

                <td align="center"><?php echo $row["etudiant_email"]; ?></td>

                <td align="center"><?php echo $row["etudiant_filiere"]; ?></td>

                <td align="center"><?php echo $row["etudiant_groupe"]; ?></td>

                <td align="center">
                  <button class="button-edit"> <a href="edit.php?id=<?php echo $row["id_etudiant"]; ?>">Edit</a></button>
                </td>
                <td align="center">
                  <button class="button-delete"> <a href="delete.php?id=<?php echo $row["id_etudiant"]; ?>">Delete</a></button>
                </td>


            </div>
            </tr>
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