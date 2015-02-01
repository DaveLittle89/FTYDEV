<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		// Load Admin Function Model
		$this->load->model('Admins');
		
	}
	
	public function index()
	{
		
	}
	
	public function login(){

		
		if($this->input->post('email')){
			// Check Login

				$admin = $this->admins->get_admin($this->input->post('email'));
				
				if($user){
					if($admin['password'] == $this->general->passEnc($this->input->post('password'))){
						// Log User In
						$this->session->set_userdata('adminID', $admin['userID']);
						// Redurect To Partner Page
						if($this->session->userdata('package')){
							redirect('package/book');
						}else{
							redirect('package/index');
						}
					}else{
						$msg = "Incorrect Login";
					}
				}else{
					$msg = "Incorrect Login";
				}
			
			}
			

			$this->load->view('public_header');
			$this->load->view('login', array('msg' => $msg));
			$this->load->view('public_footer');			
		
	}


	public function dashboard()
	{
		
	}
	
	function _authenticate()
	{
		//Authenticate
		if (!$this->ion_auth->is_admin()){
			redirect('Package/login');
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