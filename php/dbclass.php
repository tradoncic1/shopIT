<?php
  class DB{  
  //login function
    public function login ($email, $pass, $pdo){
      $query = $pdo->prepare("SELECT COUNT('user_ID') FROM user WHERE email = '$email' AND password = '$pass'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count == 1){
        session_start();
        
        $query = $pdo->prepare("SELECT is_admin FROM user WHERE email = '$email' AND password = '$pass'");
        
        $query->execute();
        
        $admin = $query->fetchColumn();

        $_SESSION['email'] = $email;
        $_SESSION['password'] = $pass;
        $_SESSION['is_admin'] = $adm;
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        /*$message = $email . '   ' . $pass . '   ' . $adm;
        echo "<script type='text/javascript'>alert('$message');</script>";
        
        header('location: #home');*/
        
        return $admin;
        
      }
      else{
        $message = "Wrong details! Try again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
        //header('location: #login');
      }
    }
    
    //register function
    public function register($email, $pass, $fname, $lname, $pdo){
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
        /*$message = '<html><body><h1>ShopIT</h1><br><p>Thank you for registering!</p><br><p>For any questions feel free to contact us!</p></body></html>';
        mail($email ,'Thank you for registering!',$message,$headers);*/
        session_start();
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
      }
    }
    
    //add phone
    public function phone($manufacturer, $name, $dimensions, $d_type, $d_res, $os, $storage, $ram, $cam, $price, $pdo){
      $query = $pdo->prepare("SELECT COUNT('ID') FROM phone WHERE name = '$name'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count == 1){
        session_start();
        
        $message = "Product already exists!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
      }
      else{
        $query = $pdo->prepare("INSERT INTO phone(manufacturer, name, dimensions, display_type, display_res, os, storage, ram, camera, price) VALUES(:manufacturer, :name, :dimensions, :display_type, :display_res, :os, :storage, :ram, :camera, :price)");

        $query->execute(array('manufacturer' => $manufacturer, 'name' => $name, 'dimensions' => $dimensions, 'display_type' => $d_type, 'display_res' => $d_res, 'os' => $os, 'storage' => $storage, 'ram' => $ram, 'camera' => $cam, 'price' => $price));
        
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        $adm = 1;
      }
    }
    
    //add camera
    public function photo($model, $sensor, $ratio, $manufacturer, $price, $pdo){
      $query = $pdo->prepare("SELECT COUNT('ID') FROM camera WHERE model_name = '$model'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count == 1){
        session_start();
        
        $message = "Product already exists!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
      }
      else{
        $query = $pdo->prepare("INSERT INTO camera(model_name, sensor_format, manufacturer, ratio, price) VALUES(:model, :sensor, :man, :ratio, :price)");

        $query->execute(array('model' => $model, 'sensor' => $sensor, 'man' => $manufacturer, 'ratio' => $ratio, 'price' => $price));
        
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        $adm = 1;
      }
    }
    
    //add desktop
    public function desktop($name, $gpu, $cpu, $os, $storage, $ram, $price, $pdo){
      $query = $pdo->prepare("SELECT COUNT('ID') FROM desktop WHERE desktop_name = '$name'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count == 1){
        session_start();
        
        $message = "Product already exists!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
      }
      else{
        $query = $pdo->prepare("INSERT INTO desktop(desktop_name, gpu, cpu, os, storage, ram, price) VALUES(:name, :gpu, :cpu, :os, :storage, :ram, :price)");

        $query->execute(array('name' => $name, 'gpu' => $gpu, 'cpu' => $cpu, 'os' => $os, 'storage' => $storage, 'ram' => $ram, 'price' => $price));
        
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        $adm = 1;
      }
    }
    
    //add laptop
    public function laptop($name, $gpu, $cpu, $os, $storage, $ram, $price, $pdo){
      $query = $pdo->prepare("SELECT COUNT('ID') FROM laptop WHERE laptop_name = '$name'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count == 1){
        session_start();
        
        $message = "Product already exists!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
      }
      else{
        $query = $pdo->prepare("INSERT INTO laptop(laptop_name, gpu, cpu, os, storage, ram, price) VALUES(:name, :gpu, :cpu, :os, :storage, :ram, :price)");

        $query->execute(array('name' => $name, 'gpu' => $gpu, 'cpu' => $cpu, 'os' => $os, 'storage' => $storage, 'ram' => $ram, 'price' => $price));
        
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        $adm = 1;
      }
    }
    
    //add peripherals
    public function peripherals($name, $desc, $price, $pdo){
      $query = $pdo->prepare("SELECT COUNT('ID') FROM peripheral WHERE name = '$name'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count == 1){
        session_start();
        
        $message = "Product already exists!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
      }
      else{
        $query = $pdo->prepare("INSERT INTO peripheral(name, description, price) VALUES(:name, :description, :price)");

        $query->execute(array('name' => $name, 'description' => $desc, 'price' => $price));
        
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        $adm = 1;
      }
    }
    
    //add tablet
    public function tablet($name, $dimensions, $d_type, $d_res, $os, $storage, $ram, $cam, $price, $pdo){
      $query = $pdo->prepare("SELECT COUNT('ID') FROM tablet WHERE tablet_name = '$name'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count == 1){
        session_start();
        
        $message = "Product already exists!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
      }
      else{
        $query = $pdo->prepare("INSERT INTO tablet(tablet_name, dimensions, display_type, display_res, os, storage, ram, camera, price) VALUES(:name, :dimensions, :display_type, :display_res, :os, :storage, :ram, :camera, :price)");

        $query->execute(array('name' => $name, 'dimensions' => $dimensions, 'display_type' => $d_type, 'display_res' => $d_res, 'os' => $os, 'storage' => $storage, 'ram' => $ram, 'camera' => $cam, 'price' => $price));
        
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        $adm = 1;
      }
      
      die();
    }
    
    //add console
    public function console($name, $gpu, $cpu, $storage, $ram, $price, $pdo){
      $query = $pdo->prepare("SELECT COUNT('ID') FROM console WHERE console_name = '$name'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count == 1){
        session_start();
        
        $message = "Product already exists!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
      }
      else{
        $query = $pdo->prepare("INSERT INTO console(console_name, gpu, cpu, storage, ram, price) VALUES(:name, :gpu, :cpu, :storage, :ram, :price)");

        $query->execute(array('name' => $name, 'gpu' => $gpu, 'cpu' => $cpu, 'storage' => $storage, 'ram' => $ram, 'price' => $price));
        
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        $adm = 1;
      }
    }
    
    //add software
    public function software($name, $type, $duration, $price, $pdo){
      $query = $pdo->prepare("SELECT COUNT('ID') FROM software WHERE software_name = '$name'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count == 1){
        session_start();
        
        $message = "Product already exists!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
      }
      else{
        $query = $pdo->prepare("INSERT INTO software(software_name, software_type, licence_duration, price) VALUES(:name, :type, :duration, :price)");

        $query->execute(array('name' => $name, 'type' => $type, 'duration' => $duration, 'price' => $price));
        
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        $adm = 1;
      }
    }
    
}
  