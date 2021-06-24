<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="home.css" rel="stylesheet">
 
  <title>Gestion des absences</title>
</head>

<body>
  <header>
   <center> 
      <img src="//moodle-ensias.um5.ac.ma/pluginfile.php/1/theme_moove/logo/1614286588/logo%20um5%20-%20ensias.png"></center>
     <center>  <h1 id="gest">Gestion des absences</h1></center> 
    </div>
  </header><br/>
  <center> <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                  se connecter:
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form action="test.php" method="post" id="login">
                            <div class="form-group"> <?php if (isset($_GET['error'])) { ?>
      <p class="error"><?php echo $_GET['error']; ?></p>

    <?php } ?>
                                <label class="form-control-label">EMAIL</label>
                                <input type="text" name="email" id="email" class="form-control" value="" placeholder="email">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                               <input type="password" name="password" id="password" value="" class="form-control" placeholder="Password">
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button type="submit" class="btn btn-outline-primary">LOGIN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>


 
  <br>
  <br><br /><br /><br /><br />

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
  </div></center> 


</html>