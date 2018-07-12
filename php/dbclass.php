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
        
        $subject = "shopIT registration";
        $message = "ShopIT" . "<br>" . "Dear " . $fname . "<br>" . "Thank you for registering!" . "<br><br>" . "Your email is <b>" . $email . "</b> and the password is <b>" . $pass . "</b><br><br>" . " For any questions feel free to contact us at tarik.r65@gmail.com!<br><br>";
        $header = "From: tarik.r65@gmail.com" . "\r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html; charset=iso-8859-1\r\n";
        
        mail($email ,'Thank you for registering!',$message, $header);
        
        session_start();
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
      }
    }
    
    //add/update phone
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
    
    public function update_phone($old_name, $manufacturer, $name, $dimensions, $d_type, $d_res, $os, $storage, $ram, $cam, $price, $pdo){
      $query = $pdo->prepare("SELECT COUNT('ID') FROM phone WHERE name = '$old_name'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count != 1){
        session_start();
        
        $message = "Product doesn't exist!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
      }
      else{
        /*$query = $pdo->prepare("INSERT INTO phone(manufacturer, name, dimensions, display_type, display_res, os, storage, ram, camera, price) VALUES(:manufacturer, :name, :dimensions, :display_type, :display_res, :os, :storage, :ram, :camera, :price)");*/
        $query = $pdo->prepare("UPDATE phone SET manufacturer = :manufacturer, name = :name, dimensions = :dimensions, display_type = :display_type, display_res = :display_res, os = :os, storage = :storage, ram = :ram, camera = :camera, price = :price WHERE name = :old_name");

        $query->execute(array('manufacturer' => $manufacturer, 'name' => $name, 'dimensions' => $dimensions, 'display_type' => $d_type, 'display_res' => $d_res, 'os' => $os, 'storage' => $storage, 'ram' => $ram, 'camera' => $cam, 'price' => $price, 'old_name' => $old_name));
        
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        $adm = 1;
      }
    }
    
    //add/update camera
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
    
    public function update_photo($old_name, $name, $sensor, $ratio, $manufacturer, $price, $pdo){
      $query = $pdo->prepare("SELECT COUNT('ID') FROM camera WHERE model_name = '$old_name'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count != 1){
        session_start();
        
        $message = "Product doesn't exist!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
      }
      else{
        $query = $pdo->prepare("UPDATE camera SET manufacturer = :manufacturer, model_name = :name, price = :price, sensor_format = :format, ratio = :ratio WHERE model_name = :old_name");

        $query->execute(array('manufacturer' => $manufacturer, 'name' => $name, 'price' => $price, 'old_name' => $old_name, 'format' => $sensor, 'ratio' => $ratio, 'old_name' => $old_name));
        
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        $adm = 1;
      }
    }
    
    //add/update desktop
    public function desktop($name, $manufacturer, $gpu, $cpu, $os, $storage, $ram, $price, $pdo){
      $query = $pdo->prepare("SELECT COUNT('ID') FROM desktop WHERE desktop_name = '$name'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count == 1){
        session_start();
        
        $message = "Product already exists!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
      }
      else{
        $query = $pdo->prepare("INSERT INTO desktop(desktop_name, manufacturer, gpu, cpu, os, storage, ram, price) VALUES(:name, :manufacturer, :gpu, :cpu, :os, :storage, :ram, :price)");

        $query->execute(array('name' => $name, 'manufacturer' => $manufacturer, 'gpu' => $gpu, 'cpu' => $cpu, 'os' => $os, 'storage' => $storage, 'ram' => $ram, 'price' => $price));
        
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        $adm = 1;
      }
    }
    
    public function update_desktop($old_name, $name, $manufacturer, $gpu, $cpu, $os, $storage, $ram, $price, $pdo){
      $query = $pdo->prepare("SELECT COUNT('ID') FROM desktop WHERE desktop_name = '$old_name'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count != 1){
        session_start();
        
        $message = "Product doesn't exist!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
      }
      else{
        $query = $pdo->prepare("UPDATE desktop SET desktop_name = :name, manufacturer = :manufacturer, gpu = :gpu, cpu = :cpu, os = :os, storage = :storage, ram = :ram, price = :price WHERE desktop_name = :old_name");

        $query->execute(array('name' => $name, 'manufacturer' => $manufacturer, 'gpu' => $gpu, 'cpu' => $cpu, 'os' => $os, 'storage' => $storage, 'ram' => $ram, 'price' => $price, 'old_name' => $old_name));
        
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        $adm = 1;
      }
    }
    
    //add/update laptop
    public function laptop($name, $manufacturer, $gpu, $cpu, $os, $storage, $ram, $price, $pdo){
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
    
    public function update_laptop($old_name, $name, $manufacturer, $gpu, $cpu, $os, $storage, $ram, $price, $pdo){
      $query = $pdo->prepare("SELECT COUNT('ID') FROM laptop WHERE laptop_name = '$old_name'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count != 1){
        session_start();
        
        $message = "Product doesn't exist!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
      }
      else{
        $query = $pdo->prepare("UPDATE laptop SET laptop_name = :name, manufacturer = :manufacturer, gpu = :gpu, cpu = :cpu, os = :os, storage = :storage, ram = :ram, price = :price WHERE laptop_name = :old_name");

        $query->execute(array('name' => $name, 'manufacturer' => $manufacturer, 'gpu' => $gpu, 'cpu' => $cpu, 'os' => $os, 'storage' => $storage, 'ram' => $ram, 'price' => $price, 'old_name' => $old_name));
        
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        $adm = 1;
      }
    }
    
    //add/update peripherals
    public function peripherals($name, $manufacturer, $desc, $price, $pdo){
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
    
    public function update_peripherals($old_name, $name, $manufacturer, $desc, $price, $pdo){
      $query = $pdo->prepare("SELECT COUNT('ID') FROM peripheral WHERE name = '$old_name'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count != 1){
        session_start();
        
        $message = "Product doesn't exist!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
      }
      else{
        $query = $pdo->prepare("UPDATE peripheral SET name = :name, manufacturer = :manufacturer, description = :description, price = :price WHERE name = :old_name");

        $query->execute(array('name' => $name, 'manufacturer' => $manufacturer, 'description' => $desc, 'price' => $price, 'old_name' => $old_name));
        
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        $adm = 1;
      }
    }
    
    //add/update tablet
    public function tablet($name, $manufacturer, $dimensions, $d_type, $d_res, $os, $storage, $ram, $cam, $price, $pdo){
      $query = $pdo->prepare("SELECT COUNT('ID') FROM tablet WHERE tablet_name = '$name'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count == 1){
        session_start();
        
        $message = "Product already exists!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
      }
      else{
        $query = $pdo->prepare("INSERT INTO tablet(tablet_name, dimensions, display_type, display_res, os, storage, ram, camera, price, manufacturer) VALUES(:name, :dimensions, :display_type, :display_res, :os, :storage, :ram, :camera, :price, :manufacturer)");

        $query->execute(array('name' => $name, 'dimensions' => $dimensions, 'display_type' => $d_type, 'display_res' => $d_res, 'os' => $os, 'storage' => $storage, 'ram' => $ram, 'camera' => $cam, 'price' => $price, 'manufacturer' => $manufacturer));
        
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        $adm = 1;
      }
    }
    
    public function update_tablet($old_name, $manufacturer, $name, $dimensions, $d_type, $d_res, $os, $storage, $ram, $cam, $price, $pdo){
      $query = $pdo->prepare("SELECT COUNT('ID') FROM tablet WHERE tablet_name = '$old_name'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count != 1){
        session_start();
        
        $message = "Product doesn't exist!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
      }
      else{
        /*$query = $pdo->prepare("INSERT INTO phone(manufacturer, name, dimensions, display_type, display_res, os, storage, ram, camera, price) VALUES(:manufacturer, :name, :dimensions, :display_type, :display_res, :os, :storage, :ram, :camera, :price)");*/
        $query = $pdo->prepare("UPDATE tablet SET manufacturer = :manufacturer, tablet_name = :name, dimensions = :dimensions, display_type = :display_type, display_res = :display_res, os = :os, storage = :storage, ram = :ram, camera = :camera, price = :price WHERE tablet_name = :old_name");

        $query->execute(array('manufacturer' => $manufacturer, 'name' => $name, 'dimensions' => $dimensions, 'display_type' => $d_type, 'display_res' => $d_res, 'os' => $os, 'storage' => $storage, 'ram' => $ram, 'camera' => $cam, 'price' => $price, 'old_name' => $old_name));
        
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        $adm = 1;
      }
    }
    
    //add/update console
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
    
    public function update_console($old_name, $name, $manufacturer, $gpu, $cpu, $storage, $ram, $price, $pdo){
      $query = $pdo->prepare("SELECT COUNT('ID') FROM console WHERE console_name = '$old_name'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count != 1){
        session_start();
        
        $message = "Product doesn't exist!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
      }
      else{
        $query = $pdo->prepare("UPDATE console SET console_name = :name, manufacturer = :manufacturer, gpu = :gpu, cpu = :cpu, storage = :storage, ram = :ram, price = :price WHERE console_name = :old_name");

        $query->execute(array('name' => $name, 'manufacturer' => $manufacturer, 'gpu' => $gpu, 'cpu' => $cpu, 'storage' => $storage, 'ram' => $ram, 'price' => $price, 'old_name' => $old_name));
        
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        $adm = 1;
      }
    }
    
    //add/update software
    public function software($name, $manufacturer, $type, $duration, $price, $pdo){
      $query = $pdo->prepare("SELECT COUNT('ID') FROM software WHERE software_name = '$name'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count == 1){
        session_start();
        
        $message = "Product already exists!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
      }
      else{
        $query = $pdo->prepare("INSERT INTO software(software_name, manufacturer, software_type, licence_duration, price) VALUES(:name, :manufacturer, :type, :duration, :price)");

        $query->execute(array('name' => $name, 'manufacturer' => $manufacturer, 'type' => $type, 'duration' => $duration, 'price' => $price));
        
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        $adm = 1;
      }
    }
    
    public function update_software($old_name, $manufacturer, $name, $type, $duration, $price, $pdo){
      $query = $pdo->prepare("SELECT COUNT('ID') FROM software WHERE software_name = '$old_name'");

      $query->execute();

      $count = $query->fetchColumn();

      if($count != 1){
        session_start();
        
        $message = "Product doesn't exist!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        
      }
      else{
        $query = $pdo->prepare("UPDATE software SET software_name = :name, manufacturer = :manufacturer, software_type = :type, licence_duration = :duration, price = :price WHERE software_name = :old_name");

        $query->execute(array('name' => $name, 'manufacturer' => $manufacturer, 'type' => $type, 'duration' => $duration, 'price' => $price, 'old_name' => $old_name));
        
        ?>
        <script type="text/javascript">
        window.location.href = '#home';
        </script>
        <?php
        $adm = 1;
      }
    }
    
}
  