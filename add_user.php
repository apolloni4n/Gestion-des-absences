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
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <style>
            * {
                box-sizing: border-box;
            }

            /* Style the body */
            body {
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
                background-color: #F5F5F5
            }

            /* Header/logo Title */
            .header {
                padding: 20px;
                text-align: center;
                color: white
            }

            .logo {

                height: 30px;
                width: 40px;
                float: left;
                margin-top: 0px;
                margin-left: 100px
            }

            /* Increase the font size of the heading */
            /* .header h1 {
            font-size: 40px;
        }

        /* Style the top navigation bar */
            .navbar {
                overflow: hidden;
                background-color: #333;

            }

            * .navbar a {

                float: left;
                display: flex;
                color: white;
                text-align: center;
                padding: 14px 20px;
                text-decoration: none;
            }

            .navbar a:hover {
                background-color: #007CB7;
            }

            .active {
                background-color: #4CAF50;
            }

            .menu-icons {
                float: left;
                padding-right: 0px;
                margin-right: 40px;
            }

            * .menu-icons a {

                float: left;
                display: flex;
                color: white;
                text-align: center;
                padding: 14px 20px;
                text-decoration: none;
            }




            /* Right-aligned link */
            /* .navbar a.right {
            float: right;
        }



        /* Column container */

            /* Create two unequal columns that sits next to each other */
            /* Sidebar/left column */

            /*.avatar {
            height: 70px;
            width: 70px;
            float: left;
            border-radius: 50%;

        }*/

            #zone-subfooter {
                padding: 3em;
                font-size: 0.8em;
                background: #22262e;
                color: rgba(255, 255, 255, 0.8);
                font-weight: normal;
            }

            * {
                font-family: sans-serif;
                box-sizing: border-box;
            }

            form {
                width: 500px;
                border: 2px solid #ccc;
                padding: 30px;
                background: #fff;
                border-radius: 15px;
            }

            #login {
                align-items: center;
                width: 300px;
                padding: 64px 15px 24px;
                margin: 0 auto;



            }

            #email-login-imgc {
                width: 30px;
                height: 20px;

                margin: 0 0 0 0;
                border: none;
                height: 22px;
                border-radius: 5px;
                border-top-right-radius: 0px;
                border-bottom-left-radius: 0px;
                border-bottom-right-radius: 0px;
                margin-bottom: 0px;
            }

            #pass-login-imgc {
                border-radius: 5px;
                border-top-left-radius: 0px;
                border-top-right-radius: 0px;
                border-bottom-right-radius: 0px;

                width: 30px;
                height: 22px;

                margin: 0 0 0 0;
                border: none;
                height: 22px;
                border-radius: 5px;
            }

            #email {
                border-radius: 5px;
                border-bottom-right-radius: 0px;
                border-bottom-left-radius: 0px;
                border-top-left-radius: 0px;
                margin-bottom: 0px;
            }

            #password {
                margin-bottom: 30px;
                border-radius: 5px;
                border-top-right-radius: 0px;
                border-bottom-left-radius: 0px;
                border-top-left-radius: 0px;

            }

            #loginbtn {
                color: darken(#8c7569, 5%);
                font-family: "Nunito", sans-serif;
                font-size: 16px;
                height: 30px;
                cursor: pointer;
                border: 0;
                outline: 0;
                padding: 0px 30px;
                border-radius: 30px;
                background: #2F78A2;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.16);
                transition: 0.3s;
            }


            #phone {
                height: 25px;
                padding-top: 9px;
            }

            #sesouvenir {
                font-size: 5px;
                font-family: sans-serif
            }

            #form {
                padding: 0px 0px;

            }

            #email-img {
                height: 25px;
                padding-top: 9px;
            }

            .contact {
                float: left;
                text-align: left;
                padding: 20px 20px
            }


            a:hover {
                color: hotpink;
            }

            a {
                color: white;
                text-decoration: none;

            }

            /* Footer */
            .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: #0D2235;
                color: white;
                text-align: center;
            }
        </style>
    </head>

    <body>

        <div class="header">
            <a href="pfa.html"><img src="ensias.png" class="logo"></a>

        </div><br />
        <div class="navbar">
            <div href="#" class="menu-icons">
                <div class="menu-icon"></div>
                <div class="menu-icon"></div>
                <div class="menu-icon"></div>
            </div>
            <a class="active" href="#">Link</a>
            <a id="MyElement" href="#" onclick="myFunction()">Link</a>
            <a id="MyElement" href="#" onclick="myFunction()">Link</a>
            <a id="MyElement" href="#" onclick="myFunction()">Link</a>
        </div>
        <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
            <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
            <a href="add_user.php" class="w3-bar-item w3-button">Ajouter utilisateur</a>
            <a href="#" class="w3-bar-item w3-button">Link 2</a>
            <a href="#" class="w3-bar-item w3-button">Link 3</a>
        </div>

        <div id="main">

            <div class="w3-teal">
                <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
                <div class="w3-container">
                    <h1>My Page</h1>
                </div>
            </div>





        </div>

        <script>
            function w3_open() {
                document.getElementById("main").style.marginLeft = "25%";
                document.getElementById("mySidebar").style.width = "25%";
                document.getElementById("mySidebar").style.display = "block";
                document.getElementById("openNav").style.display = 'none';
            }

            function w3_close() {
                document.getElementById("main").style.marginLeft = "0%";
                document.getElementById("mySidebar").style.display = "none";
                document.getElementById("openNav").style.display = "inline-block";
            }
        </script>




        <div class="row">
            <div class="side">

            </div>

        </div>
        </div>
        <div class="container"></div>
        <br>
        <form action="test.php" method="post" id="login">
            <strong>Login: </strong>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error">
                    <?php echo $_GET['error']; ?>
                </p>

            <?php } ?>
            <div id="form"> <input type="text" name="email" id="email" class="form-control" value="" placeholder="email"><br>
                <input type="password" name="password" id="password" value="" class="form-control" placeholder="Password">
            </div>
            <input type="checkbox" id="sesouvenir">
            <label for="sesouvenir"> Se souvenir de mon choix</label><br>
            <br>

            <button type="submit" class="btn btn-primary btn-block" id="loginbtn">Log in</button>
        </form>



    </body>

    </html><?php

        } else {
            header("Location: login.php");
            exit();
        }
            ?>