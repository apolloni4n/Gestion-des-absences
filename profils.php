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
    <title> Profil </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" -->
    <link href="hom_admin.css" rel="stylesheet">

  </head>

  <body>
    <center>
      <div id="myDIV">
        <a><img src="ensias.png" class="logo"></a>

      <div class="chip">
        <img src="admin.png" alt="Admin">
        Student
      </div>
        <button class="btn"><a href="homestudent.php">Acceuil</a></button>
        <button class="btn active"><a href="#">Profil</a></button>
        <button class="btn"><a href="logout.php">Logout</a></button>
      </div>
    </center><br /><br /><br /><br /><br /><br />
    <br />
    <?php
    $email = $_SESSION['email'];
    $sql = "select etudiant.etudiant_email, etudiant.etudiant_tel ,etudiant.etudiant_nom, etudiant.etudiant_prenom ,etudiant.etudiant_cin ,etudiant.etudiant_cne ,etudiant.etudiant_filiere ,etudiant.etudiant_groupe, etudiant.id_etudiant from login ,etudiant where login.email=etudiant.etudiant_email ";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_all($result);
    $n = mysqli_num_rows($result);
    for ($i = 0; $i < $n; $i++) {
      if ($row[$i][0] == $email) {
        $tel = $row[$i][1];
        $nom = $row[$i][2];
        $prenom = $row[$i][3];
        $cin = $row[$i][4];
        $cne = $row[$i][5];
        $filiere = $row[$i][6];
        $groupe = $row[$i][7];
        $id=$row[$i][8];
      }
    }
    ?>
    <center>
        <button class="button-edit"> <a href="edits.php?id=<?php echo $id; ?>">Modifier mes informations personnelles</a></button>
        <button class="button-edit"> <a href="passwd.php?id=<?php echo $id; ?>">Changer mon mot de passe</a></button>
      <div class="container">
        <div id="table_view">
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
                    <h5 class="mb-0">CIN</h5>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php echo $cin; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h5 class="mb-0">CNE</h5>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php echo $cne;
                    ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h5 class="mb-0">Filliére</h5>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php echo $filiere; ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h5 class="mb-0">Groupe</h5>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php echo $groupe; ?>
                  </div>
                </div>
                                <hr>
               
              </div>
            </div>

          </div>
        </div>
      </div>
      </div>

    </center>
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
  <?php
} else {
  header("Location: login.php");
  exit();
}
  ?>