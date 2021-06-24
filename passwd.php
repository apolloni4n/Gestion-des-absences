<?php
session_start();
include "db_con.php";

if (isset($_SESSION['email'])) {

    include "db_con.php";

    $id = $_REQUEST['id'];
    $sql = "SELECT * from etudiant where id_etudiant='" . $id . "'";
    $result = mysqli_query($conn, $sql);
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
    <script>
    function validatePassword() {
       var currentPassword,newPassword,confirmPassword,output = true;

       currentPassword = document.frmChange.currentPassword;
       newPassword = document.frmChange.newPassword;
       confirmPassword = document.frmChange.confirmPassword;

       if(!currentPassword.value) {
          currentPassword.focus();
          document.getElementById("currentPassword").innerHTML = "required";
          output = false;
        }
       else if(!newPassword.value) {
          newPassword.focus();
          document.getElementById("newPassword").innerHTML = "required";
          output = false;
        }
       else if(!confirmPassword.value) {
          confirmPassword.focus();
          document.getElementById("confirmPassword").innerHTML = "required";
          output = false;
        }
        if(newPassword.value != confirmPassword.value) {
           newPassword.value="";
           confirmPassword.value="";
           newPassword.focus();
           document.getElementById("confirmPassword").innerHTML = "not same";
           output = false;
        } 	
        return output;
    }
</script>
<br /><br /><br /><br />
        <center>
            <h1>Modifier le password</h1>
        </center>

        <div>

            <center>
            <form name="frmChange" method="post" action="" onSubmit="return validatePassword()">
<div style="width:500px;">
<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tblSaveForm">
<tr class="tableheader">
<td colspan="2">Change Password</td>
</tr>
<tr>
<td width="40%"><label>Mot de passe actuel</label></td>
<td width="60%"><input type="password" name="currentPassword" class="txtField"/><span id="currentPassword"  class="required"></span></td>
</tr>
<tr>
<td><label>Nouveau mot de passe</label></td>
<td><input type="password" name="newPassword" class="txtField"/><span id="newPassword" class="required"></span></td>
</tr>
<td><label>Confirmez le mot de passe</label></td>
<td><input type="password" name="confirmPassword" class="txtField"/><span id="confirmPassword" class="required"></span></td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
</tr>
</table>
</div>
</form>
            </center>


        </div>
        <?php
$email=$row['etudiant_email'];
if (count($_POST) > 0) {
    $query1 = "SELECT * from login where email='".$email."'";
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_array($result1);
    if (password_verify($_POST["currentPassword"],$row1["password"])) {
        $pass=password_hash($_POST["newPassword"],PASSWORD_DEFAULT);
        mysqli_query($conn, "UPDATE login set password='" . $pass . "' WHERE email='" . $email . "'");
        $message = "Password Changed";
    } else
        $message = "Current Password is not correct";
}

?>
<center>
    <br /><br />
    <h2><i> <?php echo $message; ?> </i></h2>
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