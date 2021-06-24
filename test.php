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
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = validate($_POST['email']);
        $passwd =validate($_POST['password']);
        $email=strtolower($email);
        if (empty($email)) {
            header("Location: login.php?error=Email is required");
            exit();
        } else if (empty($passwd)) {
            header("Location: login.php?error=Password is required");
            exit();
        } else {
            
            $sql = "select password from login where email='$email'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            foreach ($row as $password):
                  if(password_verify($passwd,$password)){
                    $sql2 = "select * from login where email='$email' and password='$password'";
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) === 1) {
                $row2 = mysqli_fetch_assoc($result2);
                
                if ($row2['email'] === $email) {
                    $_SESSION['email'] = $row2['email'];
                    $_SESSION['password'] =$row2['password'];
                    $_SESSION['type_user'] = $row2['type_user'];
                    if ($_SESSION['type_user'] == "admin") {
                        header("Location: hom_admin.php");
                        exit();
                    } else if ($_SESSION['type_user'] == "student") {
                        header("Location: homestudent.php");
                        exit();
                    } elseif ($_SESSION['type_user'] == "professeur"){
                        header("Location: homeprof.php");
                        exit();
                    }
                } else {
                    header("Location: login.php?error=Incorect email or password1");
                    exit();
                }
            } else {
                header("Location: login.php?error=Incorect email or password2");
                exit();
            }
            }else {
                header("Location: login.php?error=Incorect email or password3 ");
                exit();
            }
            endforeach;
            }else {
                header("Location: login.php?error=Incorect email or password4");
                exit();
            }
        
        }
    } else {
        header("Location: login.php");
        exit();
    }
