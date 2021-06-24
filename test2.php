<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="home.css" rel="stylesheet">
    <link href="app.css" rel="stylesheet">
    <?php
    session_start();
    include "db_con.php";

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (isset($_POST['email'])) {
        $email = validate($_POST['email']);
        if (empty($email)) {
            header("Location: forgetpass.php?error=Email is required");
            exit();
        } else {
            
            $sql = "select * from login where email='$email'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if ($row['type_user']=='student'){
                $sql1="select etudiant_nom ,etudiant_prenom from etudiant where etudiant_email='$email'";
                $result1= mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_assoc($result1);
                $nom=$row1['etudiant_nom'];
                $prenom=$row1['etudiant_prenom'];
            }else if($row['type_user']=='professeur'){
                $sql1="select professeur_nom ,professeur_prenom from professeurs where professeur_email='$email'";
                $result1= mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_assoc($result1);
                $nom=$row1['professeur_nom'];
                $prenom=$row1['professeur_prenom'];
            }else {
                header("Location: forgetpass.php?error=Incorect email1");
                exit();
            }
            function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = 16; 
    for ($i = 0; $i < 8; $i++) {
        $n = rand(8, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

            $passw=randomPassword();
            $hash_passw=password_hash($passw,PASSWORD_DEFAULT);
            $upd="update login set password='$hash_passw' where email='$email'";
            mysqli_query($conn, $upd);
            $message="Bonjour ".$prenom."\n"."votre nouveau mot de passe est : ".$passw ."\n
            veuillez à le modifier une fois connectez dans notre application ." ;
            $subject="Reset password";
            mail($email,$subject,$message);
            header("Location: login.php");
                exit();
            }else {
                header("Location: forgetpass.php?error=Incorect email2 $resultat");
                exit();
            }
        
        }
    } else {
        header("Location: forgetpass.php");
        exit();
    }
