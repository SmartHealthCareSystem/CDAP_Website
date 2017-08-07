<?php


/**
* 
*/
class login_model extends CI_Model
{
//	public function __construct()
//    {
//        parent::__construct();
//       // $this->load->database();
//        $this->db = $this->load->database('pdodb', true);
//    }
//	
	
	public function login_user($username,$password)
	{
		$this->db->where('Email',$username);
		$this->db->where('Password',$password);


		$results=$this->db->get('employee');


		if($results->num_rows()==1){

			return $results->row(0)->Email;

		}else{

			return FALSE;

		}

	}
}




?>