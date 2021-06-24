<?php 
session_start();
include "db_con.php";

if ($_SESSION["type_user"] == "student") {
    ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home student</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic" class="css-httpsfontsgoogleapiscomcssfamilyRoboto400300300italic400italic500500italic700700italic">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,700" class="css-httpsfontsgoogleapiscomcssfamilyRobotoMono400700">
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

      <button class="btn active"><a href="#">Acceuil</a></button>
      <button class="btn"><a href="profils.php">Profil</a></button>
      <button class="btn"><a href="logout.php">Logout</a></button>
<ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:40px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
   <ul class="dropdown-menu"></ul>
      </li>
     </ul>
    </div>
  </center>
<hr />
 <?php if(isset($_GET['id'])) {
        $sql = "SELECT type,downloads FROM files WHERE id=" . $_GET['id'];
		$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["type"]);
        echo $row["downloads"];
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


  <script>
$(document).ready(function(){
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{
 $.ajax({
  url:"fetch.php",
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
$('#comment_form').on('submit', function(event){
 event.preventDefault();
 if($('#subject').val() != '' && $('#comment').val() != '' )
 {
  var form_data = $(this).serialize();
  $.ajax({
   url:"avertiss.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#comment_form')[0].reset();
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





</br>
</br>



</body>
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
</html>
<?php
}
?>
