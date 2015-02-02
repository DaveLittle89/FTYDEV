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
	
	function get_agent_data($userID)
	{
		$this->db->from('agents');
		$this->db->where(array('userID' => $userID));
		$query = $this->db->get(); 
		return ($this->db->count_all_results() == 0)? false:  $query->row();		
	}
	
	function get_categories()
	{
		$this->db->from('categories');
		$this->db->where('active', '1');
		$this->db->order_by('listOrder', 'DESC');
		$this->db->order_by('categoryName', 'ASC');
		$query = $this->db->get(); 
		return $query->result_array();		
	}
	
	function get_category($id)
	{
		$this->db->from('categories');
		$this->db->where('id', $id);
		$this->db->where('active', '1');
		$query = $this->db->get(); 
		return $query->row();		
	}
	
	function add_category($data){
		$this->db->insert('categories', $data); 
	}
	
	function update_category($id, $data){
		$this->db->where('id', $id);
		$this->db->update('categories', $data); 
	}
	
	function remove_category($id){
		$this->db->where('id', $id);
		$this->db->update('categories', array('active' => '0')); 
	}
	
	
	function add_product($data){
		$this->db->insert('categories', $data); 
	}	

	function update_user($userID, $userTabledata, $userDataData=false){
		$this->db->where('id', $userID);
		$this->db->update('users', $userTabledata); 
	
		if($userDataData){
			$this->db->where('userID', $userID);
			$this->db->update('user_data', $userDataData); 
		}
					
	}
	
	function add_agent($data){
		$this->db->insert('agents', $data); 
	}	
	
	function update_agent_data($userID, $data){
		$this->db->where('userID', $userID);
		$this->db->update('agents', $data); 		
	}	
		
	function get_tax_codes(){
		$this->db->from('tax_codes');
		$this->db->where('active', '1');
		$this->db->order_by('name', 'ASC');
		$query = $this->db->get(); 
		return $query->result_array();
	}
	
	function get_tax_code($id){
		$this->db->from('tax_codes');
		$this->db->where('id', $id);
		$this->db->where('active', '1');
		$query = $this->db->get(); 
		return $query->row();
	}
	
	function add_tax_code($data){
		$this->db->insert('tax_codes', $data); 
	}		
	
	function update_tax_code($id, $data){
		$this->db->where('id', $id);
		$this->db->update('tax_codes', $data); 
	}
	
	function remove_tax_code($id){
		$this->db->where('id', $id);
		$this->db->update('tax_codes', array('active' => '0')); 
	}
	
	
}