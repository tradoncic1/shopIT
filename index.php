<?php
    include './php/dbconfig.php';
    include './php/dbclass.php';

    $db = new DB;
    
    $pdo;
    
    //login
    if(isset($_POST['login'])){
      $email = $_POST['email'];
      $pass = $_POST['password'];

      $adm = $db->login($email, $pass, $pdo);
      
    }
    
    //register
    if(isset($_POST['signup'])){
      $email = $_POST['email'];
      $pass = $_POST['password'];
      $fname = $_POST['firstname'];
      $lname = $_POST['lastname'];

      $db->register($email, $pass, $fname, $lname, $pdo);
    }
    
    //logout
    if (isset($_POST['logout'])){
        session_destroy();
        session_unset();
        $_SESSION = array();
        
        ?>
        <script type="text/javascript">
        window.location.href = '#login';
        </script>
        <?php
    }
    
    //add/update phone
    if(isset($_POST['phone'])){
      $manufacturer = $_POST['manufacturer'];
      $name = $_POST['name'];
      $dim= $_POST['dimensions'];
      $d_type= $_POST['display_type'];
      $d_res= $_POST['display_res'];
      $os= $_POST['os'];
      $storage= $_POST['storage'];
      $ram= $_POST['ram'];
      $cam= $_POST['camera'];
      $price= $_POST['price'];

      $db->phone($manufacturer, $name, $dim, $d_type, $d_res, $os, $storage, $ram, $cam, $price, $pdo);
      
      $adm = 1;
      
    }

    if(isset($_POST['update_phone'])){
      	  $old_name = $_POST['old_name'];
          $manufacturer = $_POST['manufacturer'];
          $name = $_POST['name'];
          $dim= $_POST['dimensions'];
          $d_type= $_POST['display_type'];
          $d_res= $_POST['display_res'];
          $os= $_POST['os'];
          $storage= $_POST['storage'];
          $ram= $_POST['ram'];
          $cam= $_POST['camera'];
          $price= $_POST['price'];

          $db->update_phone($old_name, $manufacturer, $name, $dim, $d_type, $d_res, $os, $storage, $ram, $cam, $price, $pdo);

          $adm = 1;

        }
    
    //add/update camera
    if(isset($_POST['photo'])){
      $manufacturer = $_POST['manufacturer'];
      $model = $_POST['name'];
      $sensor= $_POST['sensor_format'];
      $ratio= $_POST['ratio'];
      $manufacturer= $_POST['manufacturer'];
      $price= $_POST['price'];

      $db->photo($model, $sensor, $ratio, $manufacturer, $price, $pdo);
      
      $adm = 1;
    }

	if(isset($_POST['update_photo'])){
      $old_name = $_POST['old_name'];
      $manufacturer = $_POST['manufacturer'];
      $model = $_POST['name'];
      $sensor= $_POST['sensor_format'];
      $ratio= $_POST['ratio'];
      $manufacturer= $_POST['manufacturer'];
      $price= $_POST['price'];

      $db->update_photo($old_name, $model, $sensor, $ratio, $manufacturer, $price, $pdo);
      
      $adm = 1;
    }
    
    //add/update desktop
    if(isset($_POST['desktop'])){
      $manufacturer = $_POST['manufacturer'];
      $name = $_POST['name'];
      $gpu= $_POST['gpu'];
      $cpu= $_POST['cpu'];
      $os= $_POST['os'];
      $storage= $_POST['storage'];
      $ram= $_POST['ram'];
      $price= $_POST['price'];

      $db->desktop($name, $manufacturer, $gpu, $cpu, $os, $storage, $ram, $price, $pdo);
      
      $adm = 1;
    }

    if(isset($_POST['update_desktop'])){
      $old_name = $_POST['old_name'];
      $manufacturer = $_POST['manufacturer'];
      $name = $_POST['name'];
      $gpu= $_POST['gpu'];
      $cpu= $_POST['cpu'];
      $os= $_POST['os'];
      $storage= $_POST['storage'];
      $ram= $_POST['ram'];
      $price= $_POST['price'];

      $db->update_desktop($old_name, $name, $manufacturer, $gpu, $cpu, $os, $storage, $ram, $price, $pdo);
      
      $adm = 1;
    }
    
    //add/update laptop
    if(isset($_POST['laptop'])){
      $manufacturer = $_POST['manufacturer'];
      $name = $_POST['name'];
      $gpu= $_POST['gpu'];
      $cpu= $_POST['cpu'];
      $os= $_POST['os'];
      $storage= $_POST['storage'];
      $ram= $_POST['ram'];
      $price= $_POST['price'];

      $db->laptop($name, $manufacturer, $gpu, $cpu, $os, $storage, $ram, $price, $pdo);
      
      $adm = 1;
    }

    if(isset($_POST['update_laptop'])){
      $old_name = $_POST['old_name'];
      $manufacturer = $_POST['manufacturer'];
      $name = $_POST['name'];
      $gpu= $_POST['gpu'];
      $cpu= $_POST['cpu'];
      $os= $_POST['os'];
      $storage= $_POST['storage'];
      $ram= $_POST['ram'];
      $price= $_POST['price'];

      $db->update_laptop($old_name, $name, $manufacturer, $gpu, $cpu, $os, $storage, $ram, $price, $pdo);
      
      $adm = 1;
    }
    
    //add/update peripherals
    if(isset($_POST['peripherals'])){
      $manufacturer = $_POST['manufacturer'];
      $name = $_POST['name'];
      $desc= $_POST['description'];
      $price= $_POST['price'];

      $db->peripherals($name, $manufacturer, $desc, $price, $pdo);
      
      $adm = 1;
    }

    if(isset($_POST['update_peripherals'])){
      $old_name = $_POST['old_name'];
      $manufacturer = $_POST['manufacturer'];
      $name = $_POST['name'];
      $desc= $_POST['description'];
      $price= $_POST['price'];

      $db->update_peripherals($old_name, $name, $manufacturer, $desc, $price, $pdo);
      
      $adm = 1;
    }
    
    //add/update tablet
    if(isset($_POST['tablet'])){
      $name = $_POST['name'];
      $manufacturer = $_POST['manufacturer'];
      $dim= $_POST['dimensions'];
      $d_type= $_POST['display_type'];
      $d_res= $_POST['display_res'];
      $os= $_POST['os'];
      $storage= $_POST['storage'];
      $ram= $_POST['ram'];
      $cam= $_POST['camera'];
      $price= $_POST['price'];

      $db->tablet($name, $manufacturer, $dim, $d_type, $d_res, $os, $storage, $ram, $cam, $price, $pdo);
      
      $adm = 1;
    }

    if(isset($_POST['update_tablet'])){
      $old_name = $_POST['old_name'];
      $manufacturer = $_POST['manufacturer'];
      $name = $_POST['name'];
      $dim= $_POST['dimensions'];
      $d_type= $_POST['display_type'];
      $d_res= $_POST['display_res'];
      $os= $_POST['os'];
      $storage= $_POST['storage'];
      $ram= $_POST['ram'];
      $cam= $_POST['camera'];
      $price= $_POST['price'];

      $db->update_tablet($old_name, $manufacturer, $name, $dim, $d_type, $d_res, $os, $storage, $ram, $cam, $price, $pdo);
      
      $adm = 1;
    }
    
    //add/update console
    if(isset($_POST['console'])){
      $name = $_POST['name'];
      $manufacturer = $_POST['manufacturer'];
      $cpu = $_POST['cpu'];
      $gpu = $_POST['gpu'];
      $storage = $_POST['storage'];
      $ram= $_POST['ram'];
      $price= $_POST['price'];

      $db->console($name, $manufacturer, $gpu, $cpu, $storage, $ram, $price, $pdo);
      
      $adm = 1;
    }

    if(isset($_POST['update_console'])){
      $old_name = $_POST['old_name'];
      $name = $_POST['name'];
      $manufacturer = $_POST['manufacturer'];
      $cpu = $_POST['cpu'];
      $gpu = $_POST['gpu'];
      $storage = $_POST['storage'];
      $ram= $_POST['ram'];
      $price= $_POST['price'];

      $db->update_console($old_name, $name, $manufacturer, $gpu, $cpu, $storage, $ram, $price, $pdo);
      
      $adm = 1;
    }
    
    //add/update software
    if(isset($_POST['software'])){
      $name = $_POST['name'];
      $manufacturer = $_POST['manufacturer'];
      $type = $_POST['type'];
      $duration = $_POST['duration'];
      $price= $_POST['price'];

      $db->software($name, $manufacturer, $type, $duration, $price, $pdo);
      
      $adm = 1;
    }

    if(isset($_POST['update_software'])){
      $old_name = $_POST['old_name'];
      $name = $_POST['name'];
      $manufacturer = $_POST['manufacturer'];
      $type = $_POST['type'];
      $duration = $_POST['duration'];
      $price= $_POST['price'];

      $db->update_software($old_name, $manufacturer, $name, $type, $duration, $price, $pdo);
      
      $adm = 1;
    }
    
    //delete product
    if(isset($_POST['delete'])){
      $id = $_POST['name'];
      $type = $_POST['type'];

      $query = $pdo->prepare("DELETE FROM " . $type . " WHERE ID = " . $id);

      $query->execute();
        
      $adm = 1;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/icons/right-arrow-hover.png"/>
        <title>shopIT</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="fonts/antonio-exotic/stylesheet.css" rel="stylesheet">
        <link rel="stylesheet" href="css/lightbox.min.css">
        <link href="css/responsive.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!--js-->
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/lightbox-plus-jquery.min.js" type="text/javascript"></script>
        <script src="js/custom.js" type="text/javascript"></script>

        <!--spapp-->
        <link href="css/spapp.css" rel="stylesheet" />
        <script src="js/jquery.spapp.min.js"></script>

    </head>
    <body>
        <div id="page">
            <!--header-->
            <header class="header-container">
                <div class="container">
                    <div class="top-row">
                        <div class="row">
                            <div class="col-md-2 col-sm-6 col-xs-6">
                                <div id="logo">
                                    <a href="#home"><img src="images/shopIT_logo.png" alt="logo" width="100pt"></a>
                                </div>
                            </div>
                            <div class="col-sm-6 visible-sm">
                              <div class="text-right">
                                <ul class="list-unstyled nav1 cl-effect-10">
                                  <li><a  data-hover="log in" href="#login"><span>Log In</span></a></li>
                                  <li><a  data-hover="sign up" href="#signup"><span>sign up</span></a></li>
                                </ul>
                              </div>
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12 remove-padd">
                                <nav class="navbar navbar-default">
                                    <div class="navbar-header page-scroll">
                                        <button data-target=".navbar-ex1-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>

                                    <div class="collapse navigation navbar-collapse navbar-ex1-collapse remove-space">
                                        <ul class="list-unstyled nav1 cl-effect-10">
                                            <li><a  data-hover="home" href="#home"><span>Home</span></a></li>
                                            <li><a data-hover="about"  href="#about"><span>About</span></a></li>
                                            <li><a data-hover="products"  href="#products"><span>Products</span></a></li>
                                            <li><a data-hover="contact us" href="#contact_us"><span>Contact Us</span></a></li>
                                            <?php if ($adm) { ?>
                                                <li><a data-hover="add product" href="#addition"><span>Add product</span></a></li>
                                                <li><a data-hover="delete product" data-toggle="modal" data-target="#delete"><span>Delete product</span></a></li>
                                                <li><a data-hover="change product" href="#update"><span>Change product</span></a></li>
                                            <?php }  ?>
                                        </ul>
                                    </div>
                                </nav>
                            </div>
                                
                            <div class="col-md-2  col-sm-4 col-xs-12 hidden-sm">
                                <div class="text-right">
                                  <ul class="list-unstyled nav1 cl-effect-10">
                                    <?php if (isset($_SESSION['email'])) { ?>
                                        <li><!--<a data-hover="log out" href="#logout"><span>Log Out</span></a>-->
                                        <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">Log Out</button>
                                            
                                        </li>
                                    <?php } else { ?>
                                        <li><a  data-hover="log in/sign up" href="#login"><span>Log In/Sign Up</span></a></li>
                                    <?php } ?>
                                    <!-- <li><a  data-hover="log in/sign up" href="#login"><span>Log In/Sign Up</span></a></li> -->
                                  </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            <div class="modal fade" id="myModal" role="dialog">
                 <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    <h1>Are you sure?</h1>
                    </div>
                    <div class="modal-footer">
                        <form id="login-form" method="post">
                            <input type="submit" value="yes" name="logout">
                        </form>
                    </div>
                </div>
                                                      
                </div>
            </div>
            
            <div class="modal fade" id="delete" role="dialog">
                 <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    <form method="post">
                    <input type="text" name="name">
                    <p><label>Product ID:</label></p>
                    <hr>
                    <!--<select name="type">
                        <option value="">Select type:</option>
                        <option value="phone">Phone</option>
                        <option value="camera">Camera</option>
                        <option value="desktop">Desktop</option>
                        <option value="laptop">Laptop</option>
                        <option value="peripheral">Peripherals</option>
                        <option value="console">Console</option>
                        <option value="tablet">Tablet</option>
                        <option value="software">Software</option>                                          
                    </select>-->
                    <input type="text" name="type">
                    <p><label>Type:</label></p>
                    <hr>
                    <input type="submit" value="delete" name="delete">
                    </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                                                      
                </div>
            </div>


            <!--end-->

            <!--spapp views-->
            <div class="content">
              <div class="container-fluid">
                <main id="spapp" role="main">
                  <section id="home" data-load="home.php"></section>
                  <section id="about" data-load="about.php"></section>
                  <section id="products" data-load="products.php"></section>
                  <section id="contact_us" data-load="contact_us.php"></section>
                  <section id="addition" data-load="addition.php"></section>
                  <section id="login" data-load="login.php"></section>
                  <section id="signup" data-load="signup.php"></section>
                  <section id="update" data-load="update.php"></section>
                  
                  <section id="phones" data-load="phones.php"></section>
                  <section id="photo" data-load="photo.php"></section>
                  <section id="desktop" data-load="desktop.php"></section>
                  <section id="laptop" data-load="laptop.php"></section>
                  <section id="peripherals" data-load="peripherals.php"></section>
                  <section id="tablets" data-load="tablets.php"></section>
                  <section id="consoles" data-load="consoles.php"></section>
                  <section id="software" data-load="software.php"></section>
                  
                  <section id="phones_list" data-load="phones_list.php"></section>
                  <section id="photos_list" data-load="photos_list.php"></section>
                  <section id="software_list" data-load="software_list.php"></section>
                  <section id="consoles_list" data-load="consoles_list.php"></section>
                  <section id="desktop_list" data-load="desktop_list.php"></section>
                  <section id="laptop_list" data-load="laptop_list.php"></section>
                  <section id="tablets_list" data-load="tablets_list.php"></section>
                  <section id="peripherals_list" data-load="peripherals_list.php"></section>
                  
                  <section id="update_phones" data-load="update_phones.php"></section>
                  <section id="update_photo" data-load="update_photo.php"></section>
                  <section id="update_desktop" data-load="update_desktop.php"></section>
                  <section id="update_laptop" data-load="update_laptop.php"></section>
                  <section id="update_peripherals" data-load="update_peripherals.php"></section>
                  <section id="update_tablets" data-load="update_tablets.php"></section>
                  <section id="update_consoles" data-load="update_consoles.php"></section>
                  <section id="update_software" data-load="update_software.php"></section>
                </main>
              </div>

            </div>

            <!---footer--->
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12 width-set-50">
                            <div class="footer-details">
                                <h4>Get in touch</h4>
                                <ul class="list-unstyled footer-contact-list">
                                    <li>
                                        <i class="fa fa-map-marker fa-lg"></i>
                                        <p>Zmaja od Revolucije bb</p>
                                    </li>
                                    <li>
                                        <i class="fa fa-phone fa-lg"></i>
                                        <p><a href="tel:+1-202-555-0100"> +387-063 456 789</a></p>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope-o fa-lg"></i>
                                        <p><a href="mailto:tarik.r65@gmail.com"> tarik.r65@gmail.com</a></p>
                                    </li>
                                </ul>
                                <div class="footer-social-icon">
                                    <a href="https://www.instagram.com/monty.wizard/" target="_blank"><i class="fa fa-instagram"></i></a>
                                </div>
                                <div class="input-group" id="subscribe">
                                    <input type="text" class="form-control subscribe-box" value="" name="subscribe" placeholder="EMAIL ID">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn subscribe-button"><i class="fa fa-paper-plane fa-lg"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="copyright">
                        &copy; 2017 All right reserved. Designed by <a href="http://www.themevault.net/" target="_blank">ThemeVault.</a>
                    </div>

                </div>
            </footer>

            <!--back to top--->
            <a style="display: none;" href="javascript:void(0);" class="scrollTop back-to-top" id="back-to-top">
                <span><i aria-hidden="true" class="fa fa-angle-up fa-lg"></i></span>
                <span>Top</span>
            </a>

        </div>
    </body>

    <script type="text/javascript">
      var app = $.spapp({
        defaultView  : "#home",
        templateDir  : "./pages1/",
        pageNotFound : "error_404"
      });

      $(['home', 'about', 'products', 'login', 'contact_us', 'addition', 'signup', 'log_out', 'phones', 'phones_list', 'photo', 'desktop', 'desktop_list', 'laptop', 'laptop_list', 'peripherals', 'peripherals_list', 'tablets', 'tablets_list', 'consoles', 'consoles_list', 'software', 'software_list']).each(function(index, name){
        app.route({
          view : name,
          load : name+".php",
          onReady: function() {}
        });
      });

      app.run();
    </script>

</html>
