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
    <title> Profil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" -->
    <link href="hom_admin.css" rel="stylesheet">
  </head>

  <body>
    <?php
    $email = $_SESSION['email'];
    $sql = "select * from professeurs where professeur_email='$email' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_all($result);

    $sql2 = "select module_nom from modules where prof_email1='$email' or prof_email2='$email' or prof_email3='$email' ";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_all($result2);

    
    $n = mysqli_num_rows($result);
    for ($i = 0; $i < $n; $i++) {
      if ($row[$i][1] == $email) {
        $id=$row[$i][0];
        $nom = $row[$i][2];
        $prenom = $row[$i][3];
        $dpt = $row[$i][4];
        $tel = $row[$i][5];
      }
    }
    ?>
    <div id="myDIV">
      <a href="homeprof.php"><img src="ensias.png" class="logo"></a>
        <div class="chip">
              <img src="prof.png" alt="Admin" width="96" height="96">
              <?php echo prof; ?>
            </div>
        <button class="btn"><a href="homeprof.php">Acceuil</a></button>
        <button class="btn"><a href="listeabs.php">Afficher la liste des absences</a></button>
        <button class="btn"><a href="ajoutabs.php">Ajouter l'absences</a></button>
        <button class="btn active"><a href="#">Profil</a> </button>
        <button class="btn"><a href="logout.php">Logout</a></button>
    </div><br /><br /><br /><br /><br /><br /><br />
    <center>
        <button class="button-edit"> <a href="editp.php?id=<?php echo $id; ?>">Modifier mes informations personnelles</a></button>
    </center>

    
    <br /><br /><br /><br />
    <center>
        
      <div class="container1">
        <div class="main-body">

          <!-- Breadcrumb -->

          <!-- /Breadcrumb -->

          <div class="col-md-8">
            <div class="card mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <h5 class="mb-0">Nom</h5>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php echo $nom; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h5 class="mb-0">Prenom</h5>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php echo $prenom; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h5 class="mb-0">Email</h5>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php echo $email; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h5 class="mb-0">Téléphone</h5>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php echo $tel; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h5 class="mb-0">Département</h5>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php echo $dpt; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h5 class="mb-0">Modules</h5>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php foreach ($row2 as $module) :
                      echo $module[0];
                      echo "<br>";
                    endforeach;
                    
    
   
        $sql = "SELECT imagep FROM professeurs WHERE professeur_email=' $email'";
		$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
		$row = mysqli_fetch_array($result);
 
      echo '<img src="data:image/png;base64,'.base64_encode($row ['imagep'] ->load()) .'" />';
	mysqli_close($conn);
?>
                   

                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      </div>

    </center>
    <?php


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