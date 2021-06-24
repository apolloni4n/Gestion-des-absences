<?php
session_start();
include "db_con.php";

if (isset($_SESSION['email'])) {
?>
<?php
    include "db_con.php";
    $sql = "select  id,module, cne, nom_etudiant, prenom_etudiant, date_seance, heure_debut, heure_fin, type_seance, justifiee, commentaire from absences";
    $setRec = mysqli_query($conn, $sql);
    $setData = '';
    while ($rec = mysqli_fetch_row($setRec)) {
        $rowData = '';
        foreach ($rec as $value) {
            $value = '"' . $value . '"' . "\t";
            $rowData .= $value;
        }
        $setData .= trim($rowData) . "\n";
    }
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=absence.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo  $setData . "\n"; ?><?php

                                } else {
                                    header("Location: login.php");
                                    exit();
                                }
                                    ?>