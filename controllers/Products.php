<?php


class Products {

		public function index() {

			$data['title'] = '';
			$data['products'] = $this -> product_model -> get_products();

			$this->load->view('templates/header');
			$this->load->view('products/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL) {
			$data['product'] = $this -> product_model -> get_products($slug);

			if (empty($data['product'])) {
				show_404();
			}

			$data['title'] = $data['product']['title'];

			$this->load->view('templates/header');
			$this->load->view('product/view', $data);
			$this->load->view('templates/footer');

		}

		public function create() {
			$data['title'] = 'Create a product';


			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('type', 'Type', 'required');



			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('product/create', $data);
				$this->load->view('templates/footer');
			} else {
				$this->product_model->create_product();
				redirect('locations');
			}


		}

		public function delete($id) {
			$this->product_model->delete_product($id);
			redirect('products');

		}

		public function edit($slug) {
			$data['product'] = $this -> product_model -> get_products($slug);

			if (empty($data['product'])) {
				show_404();;
			}

			$data['title'] = 'Edit product';

			$this->load->view('templates/header');
			$this->load->view('products/edit', $data);
			$this->load->view('templates/footer');
		}

		public function update() {
			$this->product_model->update_product();

			redirect('products');
		}

	}
?>
