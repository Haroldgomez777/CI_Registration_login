<?php
class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
		$this->load->helper('url_helper');
		$this->load->library('encryption');

	}

	public function view($page = 'home')
	{
	        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
	        {
	                // Whoops, we don't have a page for that!
	                show_404();
	        }

	        $data['title'] = ucfirst($page); // Capitalize the first letter

	        $this->load->view('templates/header', $data);
	        $this->load->view('pages/'.$page, $data);
	        $this->load->view('templates/footer', $data);
	}

	public function register_view() {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('firstname', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');

		if ($this->form_validation->run() === FALSE)
		{

		$this->load->view('templates/header');
		$this->load->view('pages/registration');
		$this->load->view('templates/footer');
		}
		else
		{
			
			$this->users_model->set_users();
			$this->load->view('templates/header');
			$this->load->view('users/registered.php');
			$this->load->view('templates/footer');

		}
	}


	public function User_create()
	{
		
	}
}