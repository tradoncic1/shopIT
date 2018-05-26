<?php

class Ajax {

    public function email_taken() {
      $this->load->model('MEmail','',TRUE)
      $email = trim($_POST['email']);

      if ($this->MEmail->email_exists($email)) {
        //error msg
      }
    }
}
?>
