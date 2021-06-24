<?php
session_start();
if ($_SESSION["type_user"] === "admin") {
} else {
    header("Location:javascript:window.location.reload(true)");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Gestion Des Absenses</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="hom_admin.css" rel="stylesheet">
</head>

<body>


    <center>
        <div id="myDIV">
            <a href="hom_admin.php"><img src="ensias.png" class="logo"></a>

            <div class="chip">
                <img src="admin.png" alt="Admin">
                Admin
            </div>

            <button class="btn"><a href="hom_admin.php">Acceuil</a></button>
            <button class="btn"><a href="Update_student.php">Modifier Etudiants</a></button>
            <button class="btn"><a href="Update_filliere.php">Modifier Fillières</a></button>
            <button class="btn"><a href="Update_profs.php">Modifier profs</a></button>
            <button class="btn active"><a href="Update_absenses.php">Modifier Absences</a></button>
            <button> <a href="logout.php"><img src="logoutbutto.png" class="logoutbutt"></a></button>

        </div>
    </center>
    <hr />
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
    </div>
    <br /><br /><br />
    <center>
        <form name="form" class="forms" method="post" action="" style="display: list-item; ">
        <div class="form-group">
            <label>Subject</label>
            <input type="text" name="subject" id="subject" class="form-control">
        </div>
        <div class="form-group">
            <label><br/>Commentaire</label>
            <input name="comment" id="comment" class="form-control" rows="5"></input>
        </div>
         <div class="form-group">
            <label><br/>Nom</label>
            <input name="nom" id="nom" class="form-control" ></input>
        </div>
         <div class="form-group">
            <label><br/>Email</label>
            <input name="email" id="email" class="form-control" ></input>
        </div>
        <div class="form-group">
            <input type="submit" name="post" id="post" class="btn btn-info" value="Post" />
        </div>
    </form></center>
  <?php  if(isset($_POST["subject"]))
{
include("db_con.php");
$subject = mysqli_real_escape_string($conn, $_POST["subject"]);
$comment = mysqli_real_escape_string($conn, $_POST["comment"]);
$nom = mysqli_real_escape_string($conn, $_POST["nom"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$query = "INSERT INTO comments(comment_subject, comment_text,nom, email)VALUES ('$subject', '$comment','$nom','$email')";
mysqli_query($conn, $query);
}
?>
    
  
    <div>
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


</html>