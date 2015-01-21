<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Users
 *
 * This model is for all admin related db 

 */
 
class Admins extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	
	function add_category($data){
		$this->db->insert('categories', $data); 
	}
	
	function add_product($data){
		$this->db->insert('categories', $data); 
	}	

	function update_user($userID, $data){
		$this->db->where('userID', $userID);
		$this->db->update('users', $data); 			
	}
		
		
	
	
	
}