<?php

class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('url_helper');
        $this->load->library('pagination');


                
    }


	public function index()
	{
		$stat = $this->users->get_user_status();

		if($stat==1) 
		{
			$data=array();
	        $params = array();
	        $limit_per_page = 5;
	        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $total_records = $this->admin_model->get_user_count();
			$isloggedin = $this->users->isloggedin();
			$data['loggedin'] = $isloggedin;
			$data['title']="admin view";
	        if ($total_records > 0) 
	        {
	            // get current page records
	            

	            $params["users"] = $this->admin_model->get_current_page_records($limit_per_page, $start_index);
	             
	            $config['base_url'] = 'http://localhost/CI_Registration_login/index.php/admin/view/';
	            $config['total_rows'] = $total_records;
	            $config['per_page'] = $limit_per_page;
	            $config["uri_segment"] = 3;
	             
	            $this->pagination->initialize($config);
	             
	            // build paging links
	            $params["links"] = $this->pagination->create_links();

	        	$this->load->view('templates/header', $data);
	        	$this->load->view('admin/adminview', $params);
	        	$this->load->view('templates/footer');
	        }
	        else {
	        	redirect('/home');
	        }

    	}
    	else {
    		redirect('/home');
    	}
		
	}

	public function create()
	{
		$stat = $this->users->get_user_status();
		if ($stat==1) {

			$this->load->helper('form');
			$this->load->library('form_validation');
			$data=array();
			$isloggedin = $this->users->isloggedin();
			$data['loggedin'] = $isloggedin;
			$data['title'] = 'Add User';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('admin/usersbyadmin');
				$this->load->view('templates/footer');

			}
			else
			{
				$data['title']="User added";
				$this->admin_model->set_users();
				redirect('/admin/view');

			}
		}
		else {
			redirect('/home');
		}
	}

	public function edit()
	{
		$stat =$this->users->get_user_status();

		if($stat==1) {
		$this->load->helper('form');
		$this->load->library('form_validation');
		$id = $this->uri->segment(3);
		$row = $this->admin_model->get_user_by_id($id);
		$data = array();
		$data['id']=$row->id;
		$data['name']=$row->name;
		$data['email']=$row->email;
		$data['password']=$row->password;
		$data['admin']=$row->admin;
		$data['address']=$row->address;
		$data['phone']=$row->phone;
		$data['mobile']=$row->mobile;
		$data['education']=$row->education;
		$data['gender']=$row->gender;
		$data['title']="admin view";

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'min_length[11]|max_length[11]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'min_length[10]|max_length[10]');
		// $this->form_validation->set_rules('password', 'Password','required|min_length[3]');

		$isloggedin = $this->users->isloggedin();
		$data['loggedin'] = $isloggedin;
		if ($this->form_validation->run() === FALSE) {
		$this->load->view('templates/header', $data);
		$this->load->view('admin/edituser.php',$data);
		$this->load->view('templates/footer');
		}
		else
		{
			$data['title']="User added";
			$this->admin_model->edit_user_details($id);
			redirect('/admin/view');

		}

		}
		else{
			rediect('/home');
		}
	}



	public function view()
	{
		$stat = $this->users->get_user_status();

		if($stat==1) 
		{
			$data=array();
	        $params = array();
	        $limit_per_page = 5;
	        $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	        $total_records = $this->admin_model->get_user_count();
			$isloggedin = $this->users->isloggedin();
			$data['loggedin'] = $isloggedin;
			$data['title']="admin view";
	        if ($total_records > 0) 
	        {
	            // get current page records
	            

	            $params["users"] = $this->admin_model->get_current_page_records($limit_per_page, $start_index);
	             
	            $config['base_url'] = 'http://localhost/CI_Registration_login/index.php/admin/view/';
	            $config['total_rows'] = $total_records;
	            $config['per_page'] = $limit_per_page;
	            $config["uri_segment"] = 3;
	             
	            $this->pagination->initialize($config);
	             
	            // build paging links
	            $params["links"] = $this->pagination->create_links();

	        	$this->load->view('templates/header', $data);
	        	$this->load->view('admin/adminview', $params);
	        	$this->load->view('templates/footer');
	        }
	        else {
	        	redirect('/home');
	        }

    	}
    	else {
    		redirect('/home');
    	}
		
	}



	public function make_admin()
	{

		$stat =$this->users->get_user_status();
		if($stat==1) {
			$id = $this->uri->segment(3);
			$this->admin_model->make_user_admin($id);
		}
		else {
			rediect('/home');
		}

	}




}