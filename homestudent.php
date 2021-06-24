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
$email=$_SESSION['email'];
$sql="select etudiant.etudiant_email, etudiant.etudiant_nom, etudiant.etudiant_prenom from login ,etudiant where login.email=etudiant.etudiant_email ";
$result =mysqli_query($conn, $sql);

$row= mysqli_fetch_all($result);
$n=mysqli_num_rows($result);
for($i=0;$i<$n;$i++){
if($row[$i][0]==$email){
    $fname=$row[$i][2];
    $sname=$row[$i][1];
  ?>
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

  <br /> <br /><br /><br /> <br /><br />
  <center>
  <h2> Hello <?php echo $fname,' ', $sname,' ', '!';?> </h2>
  <h2>La listes des absences </h2>
  </center>
<?php 
}
?>
<center>

<?php
}
$sql2="select * from absences where nom_etudiant='$sname' and prenom_etudiant='$fname'";
$result2 =mysqli_query($conn, $sql2);

$row2= mysqli_fetch_all($result2);


?>

<table id="table_view" width="70%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th scope="col">Module </th>
<th scope="col">date de la seance</th>
<th scope="col">heure_debut</th>
<th scope="col">heure_fin</th>
<th scope="col">type de la seance</th>
<th scope="col">justifiée</th>
<th scope="col">justification</th>
</tr>
</thead>
<tbody>
<?php foreach ($row2 as $i=>$absence):?>
<tr>
<td align="center"> <?php echo $absence[1]?></td>
<td align="center"> <?php echo $absence[5]?></td>
<td align="center"> <?php echo $absence[6]?></td>
<td align="center"> <?php echo $absence[7]?></td>
<td align="center"> <?php echo $absence[8]?></td>
<td align="center"> <?php echo $absence[9]?></td>
<td align="center"> <?php if($absence[10]==''){
  echo 'no justification';}
  else{ echo $absence[10];}
  ?></td>
</tr>

<?php endforeach;
?>
</tbody>
</table>
<?php
if (!$row2)
echo "le nombre total d'absences: ",0;
else echo "le nombre total d'absences: ",$i+1;
?>

</br>
</br>

<?php
$sql4="select YEAR(date_seance) as year,Month(date_seance) as month,count(*) as x from absences where nom_etudiant='$sname' and prenom_etudiant='$fname' group by MONTH(date_seance) order by date_seance ";
$result4 =mysqli_query($conn, $sql4);
$row4= mysqli_fetch_all($result4);
$tab=[9,10,11,12,1,2,3,4,5,6];
$t=array();
foreach ($row4 as $abs):
  $t[]=$abs[1];
endforeach;
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

      google.charts.load('current', {'packages':['line', 'corechart']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var button = document.getElementById('change-chart');
      var chartDiv = document.getElementById('chart_div');

      var data = new google.visualization.DataTable();
      data.addColumn('date', 'Month');
      data.addColumn('number', "Absences");

      data.addRows([
              <?php
        foreach($tab as $a):
          if(in_array($a,$t)){
            foreach ($row4 as $abs):
              if($a==$abs[1]){
                echo "[";?> new Date(<?php echo $abs[0].",".($abs[1]-1); ?>)<?php echo ",".$abs[2]."],";
            }
          endforeach;
        }
          else{
            if($a>=9){
              echo "[";?> new Date(<?php echo "2020,".($a-1);?>)<?php echo ",0],";
      
            }else{
              echo "[";?> new Date(<?php echo "2021,".($a-1);?>)<?php echo ",0],";
            }
          }
      
      endforeach;
        ?>
      ]);

      var materialOptions = {
        chart: {
          title: "La représentation d'absences par mois "
        },
        width: 1200,
        height: 300,
        
        series: {
          // Gives each series an axis name that matches the Y-axis below.
          0: {axis: 'Month'},
        },
        axes: {
          // Adds labels to each axis; they don't have to match the axis names.
          y: {
            Temps: {label: 'Absences'
          }
        }}
      };

      var classicOptions = {
        // Gives each series an axis that matches the vAxes number below.
        series: {
          0: {targetAxisIndex: 0},
          1: {targetAxisIndex: 1}
        }
      };

      function drawMaterialChart() {
        var materialChart = new google.charts.Line(chartDiv);
        materialChart.draw(data, materialOptions);
      }

      drawMaterialChart();

    }
</script>
<div id="chart_div"></div>
</center>

<h3>Upload Justificatif:</h3>
<div class="container">
      <div class="row">
         <form name="frmImage" enctype="multipart/form-data" action=""
        method="post" class="forms">
        <label>Upload Image File:</label>
        <br /> 
        <p><input name="userImage"
            type="file" class="inputFile" id="userImage"/></p> 
            <br />
        <p><input type="submit" id="join-btn"
            value="Submit"  /></p>
    </form>
      </div>
    </div>
    
<?php
if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
       
        $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
        $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
        $file_name = $_FILES['userImage']['name'];
        $sql = "INSERT INTO files(type ,downloads, email,nom_file)
	VALUES('{$imageProperties['mime']}', '{$imgData}','{$email}','{$file_name}')";
        $current_id = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($conn));
        if (isset($current_id)) {
            header("Location: mesjustif.php");
        }
    }
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
<?php
}
?>
