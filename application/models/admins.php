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
	
	function get_admin($email){
		$this->db->from('admins');
		$this->db->where(array('email' => $email));
		$query = $this->db->get(); 
		return ($this->db->count_all_results() == 0)? false:  $query->row_array();
	}
	
	function get_users_by_group($groupID)
	{
		$this->db->select("users.id, users.first_name, users.last_name, users.email, users.created_on, users.last_login");
		$this->db->from('users_groups');
		$this->db->join('users', 'users_groups.user_id = users.id', 'inner');
		$this->db->where(array('users_groups.group_id' => $groupID, 'users.active' => 1));
		$this->db->order_by('users.last_name', 'ASC');
		$this->db->order_by('users.first_name', 'ASC');
		$query = $this->db->get(); 
		return $query->result_array();
	}	
	
	function get_agent_details($userID)
	{
		$this->db->from('agents');
		$this->db->where(array('userID' => $userID));
		$query = $this->db->get(); 
		return ($this->db->count_all_results() == 0)? false:  $query->row_array();		
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