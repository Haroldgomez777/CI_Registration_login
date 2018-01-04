<?php
class Admin_model extends CI_Model {

    public function __construct()
    {
            $this->load->database();

    }
	/**
	*This function 'll return py listing count
	*
	* @access public
	* @params 
	* @return int
	*/	
    public function get_users()
	{
		$this->db->select('*');
		$this->db->from('users');
        $query =$this->db->get();
        return $query->result_array();

	}

//---------------------------------------------------------------------------------------------------
	/**
	*This function 'll return py listing count
	*
	* @access public
	* @params 
	* @return int
	*/	
	public function get_user_count()
	{
		$this->db->select('*');
		$this->db->from('users');
        $query = $this->db->get();
        return $query->num_rows();
	}

//---------------------------------------------------------------------------------------------------
	/**
	*This function 'll return py listing count
	*
	* @access public
	* @params 
	* @return int
	*/	
	public function get_user_by_id($id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
	}

//---------------------------------------------------------------------------------------------------
	/**
	*This function 'll return py listing count
	*
	* @access public
	* @params 
	* @return int
	*/	
	public function set_users()
	{
	    $this->load->helper('url');

	    $var = $_SESSION['email'];

	    $data = array(
	        'name' => $this->input->post('name'),
	        'email' => $this->input->post('email'),
	        'password' => md5($this->input->post('password')),
	        'userstatus' => 33,
	        'admin' => $var,
	    );

	    return $this->db->insert('users', $data);
	}

//---------------------------------------------------------------------------------------------------
	/**
	*This function 'll return py listing count
	*
	* @access public
	* @params 
	* @return int
	*/	

	public function edit_user_details($id)
	{
		$this->load->helper('url');

		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'address' => $this->input->post('address'),
			'phone' => $this->input->post('phone'),
			'mobile' => $this->input->post('mobile'),
			'education' => $this->input->post('education'),
			'gender' =>$this->input->post('gender')
		);

		$this->db->where('id',$id)->update('users', $data);

	}

//---------------------------------------------------------------------------------------------------

	/**
	*This function 'll return py listing count
	*
	* @access public
	* @params 
	* @return int
	*/	

	public function get_current_page_records($limit, $start)
	{

	$data = array();
	$this->db->select('*');
    $this->db->limit($limit, $start);
    $query = $this->db->get("users");
  
    if ($query->num_rows() > 0)
    {
        return $query->result_array();
    }
  
    return 0;
	}

//---------------------------------------------------------------------------------------------------


	/**
	*This function 'll return py listing count
	*
	* @access public
	* @params 
	* @return int
	*/	

	public function reset_user_password($id)
	{
		$this->load->helper('url');

		$data = array(
			// 'password' => $this->input->post('password'),
			'password' => md5($this->input->post('password')),
		);

		$this->db->where('id',$id)->update('users', $data);

	}

//---------------------------------------------------------------------------------------------------

	/**
	*This function 'll make a user admin
	*
	* @access public
	* @params $id
	* @return int
	*/

	public function make_user_admin($id)
	{	
		$this->db->select('*');
		$this->db->where('id',$id);
		$query = $this->db->get("users");
		$arr = $query->row();
		$at = $arr->email;
		$data = array(
			'userstatus' => '1',
			'admin' => $at
		);
		$this->db->where('id',$id)->update('users',$data);
	}

	public function get_emails()
	{
		// $query = $this->db->query('SELECT email FROM users');
		$sql = "SELECT group_concat(email separator ',') as email FROM `users`";
		$query = $this->db->query($sql);
		$array1 = $query->row_array();
		$arr = explode(',',$array1['email']);

		return $arr;
	}

}