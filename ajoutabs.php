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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="hom_admin.css" rel="stylesheet">
  </head>

  <body>
    


      <div id="myDIV">
          <a href="homeprof.php"><img src="ensias.png" class="logo"></a>
        <div class="chip">
              <img src="prof.png" alt="Admin" width="96" height="96">
              <?php echo prof; ?>
            </div>
        <button class="btn"><a href="homeprof.php">Acceuil</a></button>
        <button class="btn"><a href="listeabs.php">Afficher la liste des absences</a></button>
        <button class="btn active"><a href="./ajoutabs.php">Ajouter l'absences</a></button>
        <button class="btn"><a href="profilp.php">Profil</a> </button>
        <button class="btn"><a href="logout.php">Logout</a></button>
      </div>

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
    <?php
    $email = $_SESSION['email'];
    $sql = "select professeurs.professeur_email, professeurs.professeur_nom, professeurs.professeur_prenom  from login ,professeurs where login.email=professeurs.professeur_email ";
    $result = mysqli_query($conn, $sql);


    $row = mysqli_fetch_all($result);
    $n = mysqli_num_rows($result);
    for ($i = 0; $i < $n; $i++) {
      if ($row[$i][0] == $email) {
    ?>
        <center>
          <h1> Hello <?php echo $row[$i][2]; ?> </h1>
        </center>
    <?php
      }
    }
    ?>
    <?php
    $sql2 = "select module_nom from modules where prof_email1='$email' or prof_email2='$email' or prof_email3='email' ";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_all($result2); ?>

    <br /><br /><br />
    <center>
      <h2>Ajouter l'absences :</h2>
    </center>
    <center>
    <h3>Importer depuis un fichier:</h3>
    </center>
<div class="container">
      <div class="row">
 <center>  <form name="form" method="post" action="" style="display: list-item;" 
                name="frmCSVImport" id="frmCSVImport"
                enctype="multipart/form-data">
                
                    <label class="col-md-4 control-label">Choose CSV
                        File</label> <input type="file" name="file"
                        id="file" accept=".csv">
                    <button type="submit" name="import"
                      class="button" id="join-btn">Import</button>
                    <br />


            </form>
       </center> 
      </div>
    </div>
    <br><br><br>
    
    <center><h3 >Insérer manuellement:</h3></center>
 <script type="text/javascript">
$(document).ready(function() {
    $("#frmCSVImport").on("submit", function () {

	    $("#response").attr("class", "");
        $("#response").html("");
        var fileType = ".csv";
        var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
        if (!regex.test($("#file").val().toLowerCase())) {
        	    $("#response").addClass("error");
        	    $("#response").addClass("display-block");
            $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
            return false;
        }
        return true;
    });
});
</script>
<?php 
if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            

            $sqlInsert = "INSERT into absences(date_seance,heure_debut,heure_fin,module,type_seance,nom_etudiant,prenom_etudiant,justifiee,commentaire)
                   values ('".$column[0]."','".$column[1]."','".$column[2]."','".$column[3]."','".$column[4]."','".$column[5]."','".$column[6]."','".$column[7]."','".$column[8]."')";
                   $result =mysqli_query($conn, $sqlInsert);
               if (mysqli_query($conn, $sqlInsert)) {
          echo "l'absence est bien ajouté";
        } else {
          echo "Error";
        }
           
        }
    }
}?>

    <center>
      <form name="form" method="post" action="" style="display: list-item; " >
        <label for="date">Date de la séance :</label>
        <p><input type="date" class="inputFields" id="date" name="date" required /></p>
        <label for="time">Heure_Début :</label>
        <p><input type="time" class="inputFields" id="heured" name="heured" required /></p>

        <label for="time">Heure_Fin :</label>
        <p><input type="time" class="inputFields" id="heuref" name="heuref" required /></p>
        <label for="pet-select">Module :</label>
        <br />
        <select id="pet-select" class="inputFields" name='module' required>
          <option value="">--Please choose an option--</option>
          <?php foreach ($row2 as $module) : ?>
            <option value=' <?php echo  $module[0]; ?>'><?php echo $module[0]; ?></option>

          <?php endforeach; ?>
        </select>
        <br />
        <label for="pet-select">Type de la séance :</label>
        <br />
        <select id="pet-select" class="inputFields" name="type" required>
          <option value="">--Please choose an option--</option>
          <option value="cours">Cours</option>
          <option value="td">TD</option>
          <option value="tp">TP</option>
        </select>
        <br />
        <label for="nom">Nom:</label>
        <p><input type="text" class="inputFields" id="nom" name="name" placeholder="Entrer le nom d'étudiant" required /></p>
        <label for="prenom">Prénom:</label>
        <p><input type="text" class="inputFields" id="prenom" name="prenom" placeholder="Entrer le Prenom d'étudiant" required /></p>
        <label for="justif">Justifiée:</label>
        <br />
        <select id="pet-select" class="inputFields" name='justifiee' required>
          <option value="">--Please choose an option--</option>
          <option value="0">NON</option>
          <option value="1">OUI</option>
        </select>
        <br />
        <label for="justification">Justification:</label>
        <p><input type="text" class="inputFields" id="justification" name="justification" placeholder="Entrer  la justification" /></p>
        <p><input name="submit" class="button" id="join-btn" type="submit" value="Submit" /></p>
      </form>

    </center>



    <?php
    function validate($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if (isset($_POST['date']) && isset($_POST['heured']) && isset($_POST['heuref']) && isset($_POST['module']) && isset($_POST['name']) && isset($_POST['prenom']) && isset($_POST['type']) && isset($_POST['justifiee']) && isset($_POST['justification'])) {
      $date = validate($_POST['date']);
      $heured = validate($_POST['heured']);
      $heuref = validate($_POST['heuref']);
      $module = validate($_POST['module']);
      $nom = validate($_POST['name']);
      $prenom = validate($_POST['prenom']);
      $type = validate($_POST['type']);
      $justifiee = validate($_POST['justifiee']);
      $justification = validate($_POST['justification']);
      if($justification==''){
          $justification='no comment';
      }
      if (empty($email)) {
        header("Location: login.php?error=Email is required");
        exit();
      } else {

        $sql3 = "insert into absences(module,cne,nom_etudiant,prenom_etudiant,date_seance,heure_debut,heure_fin,type_seance,justifiee,commentaire)  
        values('$module',null,'$nom','$prenom',' $date','$heured','$heuref','$type' ,'$justifiee',' $justification')";
        if (mysqli_query($conn, $sql3)) {
          echo "l'absence est bien ajouté";
        } else {
          echo "Error";
        }
      }
    }
    ?>

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
  </body>


  </html>
<?php


} else {
  header("Location: login.php");
  exit();
}


?>