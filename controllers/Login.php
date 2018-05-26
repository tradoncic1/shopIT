<?php

  class Login {

      public function create_member() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|check_if_email_exists');
        $this->load->model('membership_model');

        $query = $this->membership_model->create_member();

        //load signin
      }

      public function check_if_email_exists($email) {
        $this->load->model('membership_model');
        $email_available = $this->membership_model->check_if_email_exists($email);

        if($email_available) {
          return true;
        } else {
          return false;
        }
      }

      public function validate() {
          $this->load->model('membership_model');
          $query = $this->membership_model->validate();

          if ($query) {
            $data = aray('email' => $this->input->post('username'), 'is_logged_in' => true);
            //load home
          } else {
            //load signin
          }
      }



  }
?>
