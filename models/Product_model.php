<?php
class Product_model {
		public function __construct(){
		$this->load->database();
		}

		public function get_productss($slug = FALSE) {

			if ($slug === FALSE) {
				$query = $this -> db -> get('products');
				return $query -> result_array();
			}

			$query = $this -> db -> get_where('products', array('slug' => $slug));
			return $query -> row_array();
		}

		public function create_product() {
			$slug = url_title($this->input->post('title'));

			$data = array('title' => $this->input->post('title'), 'slug' => $slug, 'body' => $this->input->post('body'), 'type' => $this->input->post('type'), 'address' => $this->input->post('address'), 'phone' => $this->input->post('phone'), 'webpage' => $this->input->post('webpage'));
			return $this->db->insert('products', $data);
		}

		public function delete_product($id) {
			$this->db->where('id', $id);
			$this->db->delete('products');
			return true;
		}

		public function update_product() {
			$slug = url_title($this->input->post('title'));

			$data = array('title' => $this->input->post('title'), 'slug' => $slug, 'body' => $this->input->post('body'), 'type' => $this->input->post('type'), 'address' => $this->input->post('address'), 'phone' => $this->input->post('phone'), 'webpage' => $this->input->post('webpage'));

			$this->db->where('id', $this->input->post['id']);
			return $this->db->update('products', $data);
		}
	}
 ?>
