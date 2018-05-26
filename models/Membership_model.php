<?php

class Membership_model {

	public function validate() {
		$query = $this->db->where('email', $this->input->post('email'), 'password', md5($this->input->post('password')));

		if($query->num_rows() == 1) {
			return true;
		}
	}

	public function create_member() {
		$username = $this->input->post('username');

		$new_member = array('firstname' => $this->input->post('firstname'),
							'lastname' => $this->input->post('lastname'),
							'password' => md5($this->input->post('password')),
							'email' => $this->input->post('email'));
		$insert = $this->db->insert('accounts', $new_member);
		return $insert;
	}

	public function check_if_email_exists($email) {
		$this->db->where('email', $email);
		$result = $this->db->get('accounts');

		if ($result->num_rows() > 0) {
			return false;
		} else {
			return true;
		}

	}
}
 ?>
