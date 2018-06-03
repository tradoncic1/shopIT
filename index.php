<?php
    include './php/dbconfig.php';

    //login
    if(isset($_POST['login'])){
      $email = $_POST['email'];
      $pass = $_POST['password'];

      $query = $pdo->prepare("SELECT COUNT('user_ID') FROM user WHERE email = '$email' AND password = '$pass'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count == 1){
        session_start();
        
        $query = $pdo->prepare("SELECT is_admin FROM user WHERE email = '$email' AND password = '$pass'");
        
        $query->execute();
        
        $adm = $query->fetchColumn();

        $_SESSION['email'] = $email;
        $_SESSION['password'] = $pass;
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        /*$message = $email . '   ' . $pass . '   ' . $adm;
        echo "<script type='text/javascript'>alert('$message');</script>";
        
        header('location: #home');*/
        
        
      }
      else{
        $message = "Wrong details! Try again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
        //header('location: #login');
      }
    }
    
    //register
    if(isset($_POST['signup'])){
      $email = $_POST['email'];
      $pass = $_POST['password'];
      $fname = $_POST['firstname'];
      $lname = $_POST['lastname'];

      $query = $pdo->prepare("SELECT COUNT('user_ID') FROM user WHERE email = '$email'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count == 1){
        session_start();
        
        $message = "Account already exists!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
        
      }
      else{
        $query = $pdo->prepare("INSERT INTO user(email, firstname, lastname, password) VALUES(:mail, :fname, :lname, :pass)");

        $query->execute(array('mail' => $email, 'fname' => $fname, 'lname' => $lname, 'pass' => $pass));
        
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $pass;
        session_start();
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
      }
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
    
    //add product
    if(isset($_POST['addProduct'])){
      $pname = $_POST['product_name'];
      $price = $_POST['price'];
      $type = $_POST['type'];
      $desc = $_POST['description'];
      //$pic = $_POST['image'];
      $adm = 1;
      
      $query = $pdo->prepare("SELECT COUNT('product_ID') FROM product WHERE product_name = '$pname'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count != 0){        
        $message = "Product already exists!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
        
      }
      else{
        $query = $pdo->prepare("INSERT INTO product(product_name, price, type, description) VALUES(:product_name, :price, :type, :description)");

        $query->execute(array('product_name' => $pname, 'price' => $price, 'type' => $type, 'description' => $desc));
        
        $message = "Product added succesfully!";
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
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
        <script src="js/instafeed.min.js" type="text/javascript"></script>
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
                                            <?php }  ?>
                                            <!--<li><a data-hover="add product" href="#addition"><span>Add product</span></a></li>-->
                                        </ul>
                                    </div>
                                </nav>
                            </div>

                            <div class="col-md-2  col-sm-4 col-xs-12 hidden-sm">
                                <div class="text-right">
                                  <ul class="list-unstyled nav1 cl-effect-10">
                                    <?php if (isset($_SESSION['email'])) { ?>
                                        <li><a data-hover="log out" href="#logout"><span>Log Out</span></a></li>
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
                  <section id="logout" data-load="log_out.php"></section>
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

      $(['home', 'about', 'products', 'login', 'contact_us', 'addition', 'signup', 'log_out']).each(function(index, name){
        app.route({
          view : name,
          load : name+".php",
          onReady: function() {}
        });
      });

      app.run();
    </script>

</html>
