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
	        $isloggedin = $this->users_model->isloggedin();
			$data['loggedin'] = $isloggedin;
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

		$isloggedin = $this->users_model->isloggedin();
		$data['loggedin'] = $isloggedin;
		$this->load->view('templates/header',$data);
		$this->load->view('pages/registration');
		$this->load->view('templates/footer');
		}
		else
		{
			
			$isloggedin = $this->users_model->isloggedin();
			$data['loggedin'] = $isloggedin;
			$this->users_model->set_users();
			$this->load->view('templates/header',$data);
			$this->load->view('users/registered.php');
			$this->load->view('templates/footer');

		}
	}


	public function login_view()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data = array();
		$isloggedin = $this->users_model->isloggedin();
		$data['loggedin'] = $isloggedin;
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() === FALSE && !$isloggedin) 
		{
			$isloggedin = $this->users_model->isloggedin();
			$data['loggedin'] = $isloggedin;
			$this->load->view('templates/header', $data);
			$this->load->view('users/login');
			$this->load->view('templates/footer');

		}
		else if($this->form_validation->run() === TRUE && !$isloggedin)
		{
			$data_l = $this->users_model->login_user();


		if($data_l) 
		{
			$this->session->set_userdata($data_l);
			if($data_l['userstatus']==1) 
			{

	        		redirect('/admin');

			}

			
			else
			{
				$isloggedin = $this->users_model->isloggedin();
				$data['loggedin'] = $isloggedin;
				$this->load->view('templates/header', $data);
				$this->load->view('users/login_success', $data);
				$this->load->view('templates/footer');
			}
		}
		else 
		{

			$isloggedin = $this->users_model->isloggedin();
			$data['loggedin'] = $isloggedin;
			$this->load->view('templates/header', $data);
			$this->load->view('users/login_failed');
			$this->load->view('templates/footer');
		}
		}
		else 
		{

			$isloggedin = $this->users_model->isloggedin();
			$data['loggedin'] = $isloggedin;
			$this->load->view('templates/header', $data);
			$this->load->view('pages/home', $data);
			$this->load->view('templates/footer', $data);

		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$isloggedin = $this->users_model->isloggedin();
		$data['loggedin'] = $isloggedin;
		$data['title'] = "You are logged out";
		$this->load->view('templates/header', $data);
		$this->load->view('users/login_failed');
		$this->load->view('templates/footer');
	}


}