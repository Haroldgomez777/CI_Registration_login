<?php
class Users_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();

    }



	public function set_users()
	{
	    $this->load->helper('url');

	    $data = array(
	        'firstname' => $this->input->post('firstname'),
	        'lastname' => $this->input->post('lastname'),
	        'email' => $this->input->post('email'),
	        'password' => md5($this->input->post('password')),
	    );

	    return $this->db->insert('users', $data);
	}

	public function login_user()
	{

		$data['email'] = $this->input->post('email');
		$data['password'] = md5($this->input->post('password'));

		$query = $this->db->get_where('users', $data);

		return $query->row_array();

	}

	public function isloggedin()
	{
		if(isset($_SESSION['email'])) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

}