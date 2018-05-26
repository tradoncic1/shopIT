<?php
class USER
{
  public $user_class;

  public function __construct(){
    $host = 'localhost';
    $user = 'root';
    $password = 'radnikdoo23';
    $dbname = 'shopit';

    #set dsn
    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
    #create instance
    $pdo = new PDO($dsn, $user, $password);
    #setting defaults
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  #LOGIN
  public function checkLogin($email, $pass)
  {
    $query = $pdo->prepare("SELECT COUNT('user_ID') FROM user WHERE email = '$email' AND password = '$pass'");

    $query->execute();

    $count = $query->fetchColumn();

    if($count == 1){

      $_SESSION['email'] = $email;

      header('location: #home');
    }
    else{
      header('location: #about');
    }
  }

    #LOGGED IN
    public function is_loggedin()
     {
        if(isset($_SESSION['email']))
        {
           return true;
         }
   }

   #REDIRECT
   /*public function redirect($url)
   {
       header("Location: $url");
   }*/

   #LOG OUT
   /*public function logout()
   {
        session_destroy();
        unset($_SESSION['email']);
        return true;
   }*/
}

?>
