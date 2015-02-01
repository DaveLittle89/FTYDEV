<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		// Load Admin Function Model
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));
		
		$this->load->model('admins');
		$this->lang->load('auth');
		$this->data = array();
	}
	

	
	public function index()
	{
		$this->_render_page('admin/dashboard', $this->data);
	}



	public function manage_users()
	{
		// Get Data
		$this->data = array('admins' => $this->admins->get_users_by_group(1),
					'managers' => $this->admins->get_users_by_group(2),
					'agents' => $this->admins->get_users_by_group(3)
					);
		// Render Page
		$this->_render_page('admin/manage_users', $this->data);
	}
	
	public function add_user()
	{

		$tables = $this->config->item('tables','ion_auth');

		//validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'required');
		$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique['.$tables['users'].'.email]');
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'required');
		$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'required');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		if ($this->form_validation->run() == true)
		{
			$username = strtolower($this->input->post('first_name')) . ' ' . strtolower($this->input->post('last_name'));
			$email    = strtolower($this->input->post('email'));
			$password = $this->input->post('password');

			$additional_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'company'    => $this->input->post('company'),
				'phone'      => $this->input->post('phone'),
			);
		}
		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data, array($this->input->post('group'))))
		{
			//check to see if we are creating the user
			//redirect them back to the admin page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('admin/manage_users');
		}
		else
		{
			//display the create user form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['group_options'] = array(
                  '1'  => 'Admin',
                  '2'    => 'Manager',
                );

			$this->data['group'] = ($this->input->post('group'))? $this->input->post('group') : 2;

			$this->data['first_name'] = array(
				'name'  => 'first_name',
				'id'    => 'first_name',
				'type'  => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array(
				'name'  => 'last_name',
				'id'    => 'last_name',
				'type'  => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('last_name'),
			);
			$this->data['email'] = array(
				'name'  => 'email',
				'id'    => 'email',
				'type'  => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['company'] = array(
				'name'  => 'company',
				'id'    => 'company',
				'type'  => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('company'),
			);
			$this->data['phone'] = array(
				'name'  => 'phone',
				'id'    => 'phone',
				'type'  => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('phone'),
			);
			$this->data['password'] = array(
				'name'  => 'password',
				'id'    => 'password',
				'type'  => 'password',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array(
				'name'  => 'password_confirm',
				'id'    => 'password_confirm',
				'type'  => 'password',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('password_confirm'),
			);

			$this->_render_page('admin/add_user', $this->data);
		}
	}


	public function edit_user($userID)
	{
		$user = $this->ion_auth->user($userID)->row();
		
				
		if($user)
		{			
			$this->form_validation->set_rules('identity', 'Email', 'required');
			$this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required');
			
			if ($this->form_validation->run() === TRUE)
			{
	
				$data = array(
					'email' => $this->input->post('identity'),
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'company'    => $this->input->post('company'),
					'phone'      => $this->input->post('phone'),
				);
				
				$this->ion_auth->update($userID, $data);
				$this->session->set_flashdata('message', 'Account Saved');
				redirect('admin/edit_user/'.$user->id, 'refresh');


			}else{

				$this->data['user'] = $user;

				$this->data['identity'] = array('name' => 'identity',
					'id' => 'identity',
					'type' => 'text',
					'value' => $user->email,
					'class' => 'form-control',
				);

		
				$this->data['first_name'] = array(
					'name'  => 'first_name',
					'id'    => 'first_name',
					'type'  => 'text',
					'value' => $this->form_validation->set_value('first_name', $user->first_name),
					'class' => 'form-control',
				);
				$this->data['last_name'] = array(
					'name'  => 'last_name',
					'id'    => 'last_name',
					'type'  => 'text',
					'value' => $this->form_validation->set_value('last_name', $user->last_name),
					'class' => 'form-control',
				);
				$this->data['company'] = array(
					'name'  => 'company',
					'id'    => 'company',
					'type'  => 'text',
					'value' => $this->form_validation->set_value('company', $user->company),
					'class' => 'form-control',
				);
				$this->data['phone'] = array(
					'name'  => 'phone',
					'id'    => 'phone',
					'type'  => 'text',
					'value' => $this->form_validation->set_value('phone', $user->phone),
					'class' => 'form-control',
				);
				
				$this->_render_page('admin/edit_user', $this->data);


			}
		}else{
			// No user Redirect back to manage users
			redirect('admin/manage_users');
		}

	}
	
	public function edit_agent($agentID)
	{
		$user = $this->ion_auth->user($userID)->row();
		
				
		if($user)
		{			
			$this->form_validation->set_rules('identity', 'Email', 'required');
			$this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required');
			
			if ($this->form_validation->run() === TRUE)
			{
	
				$data = array(
					'email' => $this->input->post('identity'),
					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'company'    => $this->input->post('company'),
					'phone'      => $this->input->post('phone'),
				);
				
				$this->ion_auth->update($userID, $data);
				$this->session->set_flashdata('message', 'Account Saved');
				redirect('admin/edit_user/'.$user->id, 'refresh');


			}else{

				$this->data['user'] = $user;

				$this->data['identity'] = array('name' => 'identity',
					'id' => 'identity',
					'type' => 'text',
					'value' => $user->email,
					'class' => 'form-control',
				);

		
				$this->data['first_name'] = array(
					'name'  => 'first_name',
					'id'    => 'first_name',
					'type'  => 'text',
					'value' => $this->form_validation->set_value('first_name', $user->first_name),
					'class' => 'form-control',
				);
				$this->data['last_name'] = array(
					'name'  => 'last_name',
					'id'    => 'last_name',
					'type'  => 'text',
					'value' => $this->form_validation->set_value('last_name', $user->last_name),
					'class' => 'form-control',
				);
				$this->data['company'] = array(
					'name'  => 'company',
					'id'    => 'company',
					'type'  => 'text',
					'value' => $this->form_validation->set_value('company', $user->company),
					'class' => 'form-control',
				);
				$this->data['phone'] = array(
					'name'  => 'phone',
					'id'    => 'phone',
					'type'  => 'text',
					'value' => $this->form_validation->set_value('phone', $user->phone),
					'class' => 'form-control',
				);
				
				$this->_render_page('admin/edit_agent', $this->data);


			}
		}else{
			// No user Redirect back to manage users
			redirect('admin/manage_users');
		}
	}
	
	
	public function remove_user()
	{
		
	}
	
	
	
	//change password
	function change_password()
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() == false)
		{
			//display the form
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = array(
				'name' => 'old',
				'id'   => 'old',
				'type' => 'password',
				'class' => 'form-control',
				'placeholder' => 'Old Password'
			);
			$this->data['new_password'] = array(
				'name' => 'new',
				'id'   => 'new',
				'type' => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				'class' => 'form-control',
				'placeholder' => 'New Password'
			);
			$this->data['new_password_confirm'] = array(
				'name' => 'new_confirm',
				'id'   => 'new_confirm',
				'type' => 'password',
				'pattern' => '^.{'.$this->data['min_password_length'].'}.*$',
				'class' => 'form-control',
				'placeholder' => 'Confirm Password'
			);


			//render
			$this->_render_page('admin/change_password', $this->data);
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('admin/change_password', 'refresh');
			}
		}
	}


	function _render_page($view, $data=null, $render=false)
	{

		$this->viewdata = (empty($data)) ? $this->data: $data;
		

		$view_html = $this->load->view('admin_header', $this->viewdata, $render);
		$view_html .= $this->load->view($view, $this->viewdata, $render);
		$view_html .= $this->load->view('admin_footer', $this->viewdata, $render);

		if (!$render) return $view_html;
	}
}

?>