
<?php
session_start();

include "db_con.php";
if ( $_SESSION["type_user"] === "professeur") {
} else {
  header("Location:javascript:window.location.reload(true)");
}
?>
  <!doctype html>
  <html lang="en">

  <head>
    <title>Home prof</title>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic" class="css-httpsfontsgoogleapiscomcssfamilyRoboto400300300italic400italic500500italic700700italic">

 <link href="hom_admin.css" rel="stylesheet">
  </head>

  <body><?php
        $email = $_SESSION['email'];
        $sql = "select professeurs.professeur_email, professeurs.professeur_nom, professeurs.professeur_prenom from login ,professeurs where login.email=professeurs.professeur_email ";
        $result = mysqli_query($conn, $sql);

        $row = mysqli_fetch_all($result);
        $n = mysqli_num_rows($result);
        for ($i = 0; $i < $n; $i++) {
          if ($row[$i][0] == $email) {
        ?>
        <center>
          <div id="myDIV"> <a href="homeprof.php"><img src="ensias.png" class="logo"></a>

            <div class="chip">
              <img src="prof.png" alt="Admin">
              <?php echo $row[$i][2]; ?>
            </div>
            <button class="btn"><a href="listeabs.php">Afficher la liste des absences</a></button>
            <button class="btn"><a href="ajoutabs.php">Ajouter l'absences</a></button>
            <button class="btn"><a href="profilp.php">Profil</a></button>
            <button class="btn"><a href="logout.php">Logout</a></button>

          </div>
           <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:40px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
   <ul class="dropdown-menu"></ul>
      </li>
     </ul>

        </center>
        
        <script>
$(document).ready(function(){
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{
 $.ajax({
  url:"fetch_file.php",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)
  {
   $('.dropdown-menu').html(data.notification);
   if(data.unseen_notification > 0)
   {
    $('.count').html(data.unseen_notification);
   }
  }
 });
}
load_unseen_notification();

// submit form and get new records
$('#frmImage').on('submit', function(event){
 event.preventDefault();
 if($('#userImage').val() != '' )
 {
  var form_data = $(this).serialize();
  $.ajax({
   url:"homestudent.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#frmImage')[0].reset();
    load_unseen_notification();
   }
  });
 }
 else
 {
  alert("Both Fields are Required");
 }
});
// load new notifications

$(document).on('click', '.dropdown-toggle', function(){
 $('.count').html('');
 load_unseen_notification('yes');
});
setInterval(function(){
 load_unseen_notification();;
}, 5000);
});
</script>

  <br /><br /><br /><br /><br /><br />

        <div id="region-main-box">
          <div>
            <h1 id="welcome"> Welcome <?php echo $row[$i][2]; ?> ! <h1>
          </div>
      <?php
          }
        }
      ?>

      <center>
        <div class="logoutbutton">
          <a href="logout.php">Déconnexion</a>
        </div>
      </center>
        </div>
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
  </body>

  </html>
