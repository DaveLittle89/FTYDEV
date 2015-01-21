<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Users
 *
 * This model represents general site functions such as encryption, registrations

 */
class General extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	
	function passEnc($password){
		$password = hash('sha256',$password.'BookSki');
		return $password;
	}
	

	function get_categories(){
		$this->db->from('categories');
		$this->db->where(array('remove' => 0));
		$query = $this->db->get();
		return $query->result_array();
		
	}
	
	function get_category($categoryID){
		$this->db->from('categories');
		$this->db->where(array('categoryID' => $categoryID,
						 'remove' => 0)
					);
		$query = $this->db->get(); 
		return $query->row_array();		
	}

	
}