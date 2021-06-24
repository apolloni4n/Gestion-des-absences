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
        <style data-href="/styles.7fc03ab678f8f28e3963.css">
            @font-face {
                font-family: Roboto;
                font-style: normal;
                font-display: fallback;
                font-weight: 400;
                src: url(/static/roboto-v18-latin-regular-68889c246da2739681c1065d15a1ab0b.eot);
                src: local("Roboto"), local("Roboto-Regular"), url(/static/roboto-v18-latin-regular-68889c246da2739681c1065d15a1ab0b.eot?#iefix) format("embedded-opentype"), url(/static/roboto-v18-latin-regular-5d4aeb4e5f5ef754e307d7ffaef688bd.woff2) format("woff2"), url(/static/roboto-v18-latin-regular-bafb105baeb22d965c70fe52ba6b49d9.woff) format("woff"), url(/static/roboto-v18-latin-regular-372d0cc3288fe8e97df49742baefce90.ttf) format("truetype"), url(/static/roboto-v18-latin-regular-8681f434273fd6a267b1a16a035c5f79.svg#Roboto) format("svg")
            }

            @font-face {
                font-family: Roboto;
                font-style: normal;
                font-display: fallback;
                font-weight: 700;
                src: url(/static/roboto-v18-latin-700-376e0950b361fbd3b09508031f498de5.eot);
                src: local("Roboto Bold"), local("Roboto-Bold"), url(/static/roboto-v18-latin-700-376e0950b361fbd3b09508031f498de5.eot?#iefix) format("embedded-opentype"), url(/static/roboto-v18-latin-700-037d830416495def72b7881024c14b7b.woff2) format("woff2"), url(/static/roboto-v18-latin-700-cf6613d1adf490972c557a8e318e0868.woff) format("woff"), url(/static/roboto-v18-latin-700-cae5027f600d2a0d88ac309655618e31.ttf) format("truetype"), url(/static/roboto-v18-latin-700-57888be7f3e68a7050452ea3157cf4de.svg#Roboto) format("svg")
            }
        </style>
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
            </div>
        </center>
        <center>
            <div class="btn_admin_modifier">
                <p><a href="hom_admin.php">Dashboard</a>
                    | <a class="btn active" href="view_Profs.php">Afficher La liste des professeurs</a>
                    | <a href="insert_profs.php">Ajouter un professeur</a>
                    | <a href="logout.php">Logout</a>
                </p>
            </div>
        </center>

        <center>
            <table id="table_view" width="70%" border="1" style="border-collapse:collapse;">
                <thead>
                    <tr>
                        <th><strong>Id</strong></th>
                        <th><strong>Nom et Prénom</strong></th>
                        <th><strong>Email</strong></th>
                        <th><strong>Département</strong></th>
                        <th><strong>Téléphone</strong></th>

                        <th><strong>Edit</strong></th>
                        <th><strong>Delete</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "db_con.php";

                    $sql = "select id_prof, professeur_nom , professeur_prenom , professeur_email, professeur_dpt, professeur_tel from professeurs";
                    $result = mysqli_query($conn, $sql);
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <div id="liste_etud">

                            <td align="center"> <a href="profile.php?id=<?php echo $row["id_prof"]; ?>"><?php echo $row["id_prof"]; ?> </a></td>


                            <td align="center"><?php echo $row["professeur_nom"]; ?> <?php echo $row["professeur_prenom"]; ?></td>
                            <td align="center"><?php echo $row["professeur_email"]; ?></td>
                            <td align="center"><?php echo $row["professeur_dpt"]; ?></td>
                            <td align="center"><?php echo $row["professeur_tel"]; ?></td>
                            <td align="center">
                                <button class="button-edit"> <a href="edit_prof.php?id=<?php echo $row["id_prof"]; ?>">Edit</a></button>
                            </td>
                            <td align="center">
                                <button class="button-delete"> <a href="delete_prof.php?id=<?php echo $row["id_prof"]; ?>">Delete</a></button>
                            </td>

                            </tr><br />
                        </div>
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