<?php
session_start();
include "db_con.php";
?>
<?php
 


      $sql3 = "select `id`, `nom_etudiant`, `prenom_etudiant`, `date_seance`, `heure_debut`, `heure_fin`, `type_seance`, `justifiee`, `commentaire` from absences where module='$modulei' ";
      $result3 = mysqli_query($conn, $sql3);
      $row3 = mysqli_fetch_all($result3);
      $sqli = "select module_promo from modules where module_nom='$modulei' ";
      $resulti = mysqli_query($conn, $sqli);
    
  $sql3i = "select  absences.id,absences.nom_etudiant, absences.prenom_etudiant, absences.date_seance , absences.heure_debut, absences.heure_fin, absences.type_seance, absences.justifiee, absences.commentaire from absences,etudiant where 
          absences.nom_etudiant=etudiant.etudiant_nom and absences.module='$modulei' and etudiant.etudiant_groupe='$ivar' order by absences.date_seance ";
          $result3i = mysqli_query($conn, $sql3i);
        $setRec = $result3i;
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
        header("Content-Disposition: attachment; filename=User_Detail.xls");
        header("Pragma: no-cache");
        header("Expires: 0");
        echo  $setData . "\n"; ?>