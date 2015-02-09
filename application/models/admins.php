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
	
	function get_policies(){
		$this->db->from('policies');
		$this->db->where('active', '1');
		$query = $this->db->get(); 
		return $query->result_array();			
	}

	function get_policy($id){
		$this->db->from('policies');
		$this->db->where('active', '1');
		$this->db->where('id', $id);
		$query = $this->db->get(); 
		return $query->row();			
	}

	function add_policy($data){
		$this->db->insert('policies', $data); 
		return $this->db->insert_id();
	}		

	function update_policy($id, $data){
		$this->db->where('id', $id);
		$this->db->update('policies', $data); 
	}
	
	function get_policy_addOns($id){
		$this->db->select("policy_addons.*, discount_type.type");
		$this->db->from('policy_addons');
		$this->db->where('policyID', $id);
		$this->db->where('active', 1);
		$this->db->join('discount_type', 'discount_type.id = policy_addons.discountID');
		$query = $this->db->get(); 
		return $query->result_array();			
	}
	
	function get_policy_addon($id){
		$this->db->from('policy_addons');
		$this->db->where('active', '1');
		$this->db->where('id', $id);
		$query = $this->db->get(); 
		return $query->row();			
	}
	
	
	function add_policy_addon($data){
		$this->db->insert('policy_addons', $data); 
	}
	
	function edit_policy_addon($id, $data){
		$this->db->where('id', $id);
		$this->db->update('policy_addons', $data); 		
	}
	
	function remove_policy_addOns($data){
		$this->db->where('id', $id);
		$this->db->update('policy_addons', array('active' => '0')); 		
	}
		
			
	
	function get_underwriters(){
		$this->db->from('underwriters');
		$this->db->where('active', '1');
		$query = $this->db->get(); 
		return $query->result_array();			
	}
	
	function get_underwriters_form(){
		$this->db->select('id, name');
		$this->db->from('underwriters');
		$this->db->where('active', '1');
		$query = $this->db->get(); 
        foreach($query->result_array() as $row){
            $data[$row['id']]=$row['name'];
        }
        return $data;			
	}
	
	function get_underwriter($id)
	{
		$this->db->from('underwriters');
		$this->db->where('id', $id);
		$this->db->where('active', '1');
		$query = $this->db->get(); 
		return $query->row();		
	}
	
	function add_underwriter($data){
		$this->db->insert('underwriters', $data); 
	}	
	
	function update_underwriter($id, $data){
		$this->db->where('id', $id);
		$this->db->update('underwriters', $data); 		
	}

	function remove_underwriter($id){
		$this->db->where('id', $id);
		$this->db->update('underwriters', array('active' => '0')); 
	}
	
	
	
	
	function get_travel_insurance_locations(){
		$this->db->from('travel_insurance_locations');
		$this->db->where('active', '1');
		$query = $this->db->get(); 
		return $query->result_array();			
	}

	function get_travel_insurance_location($id){
		$this->db->from('travel_insurance_locations');
		$this->db->where('id', $id);
		$this->db->where('active', '1');
		$query = $this->db->get(); 
		return $query->row();
	}
	
	
	function add_travel_insurance_location($data){
		$this->db->insert('travel_insurance_locations', $data); 
	}	
	
	function update_travel_insurance_location($id, $data){
		$this->db->where('id', $id);
		$this->db->update('travel_insurance_locations', $data); 		
	}

	function remove_travel_insurance_location($id){
		$this->db->where('id', $id);
		$this->db->update('travel_insurance_locations', array('active' => '0')); 
	}
	
	function add_product($data){
		$this->db->insert('items', $data); 
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
	
	function get_discount_types(){
		$this->db->from('discount_type');
		$query = $this->db->get(); 
		return $query->result_array();
	}
	
}