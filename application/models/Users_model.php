<?php
class Users_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();

    }

    public function get_users()
	{

                $query = $this->db->get('users');
                return $query->result_array();

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
		$this->load->helper('url');

		$data['email'] = $this->input->post('email');
		$data['password'] = md5($this->input->post('password'));

		$query = $this->db->get_where('users', $data);

		return $query->row_array();

	}

	public function is_logged_in()
	{
		if(isset($_SESSION['name'])) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	public function get_user_status()
	{
		if($this->isloggedin()) {

			$data['name'] = $_SESSION['name'];
			$data['email'] = $_SESSION['email'];
			$query = $_SESSION['userstatus'];
			
			
			if($query==='1') {
				return 1;
			}
			else {
				return 0;
			}

	}
	else {
		return 0;
	}
	}

	public function get_emails()
	{
		
		$sql = "SELECT group_concat(email separator ',') as email FROM `users`";
		$query = $this->db->query($sql);
		$array1 = $query->row_array();
		$arr = explode(',',$array1['email']);
		$arr2 = implode('","', $arr);

		return $arr2;
	}

	public function check_email_exists($email)
	{
		$this->db->select('*');
		$this->db->where('email',$email);
		$query	=	$this->db->get('users');
		$return	=	true;
		if($query->num_rows() > 0){
			$return = false;
		}
		return $return;
	}

}