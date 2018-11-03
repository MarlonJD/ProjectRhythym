<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User class.
 * 
 * @extends CI_Controller
 */
class User extends CI_Controller {

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->helper(array('url'));
		$this->load->model('user_model');
		
	}
	
	
	public function index() {
		

		
	}
	
	/**
	 * register function.
	 * 
	 * @access public
	 * @return void
	 */
	public function register() {
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			if ($_SESSION['is_admin']  === true) 
			{
				// create the data object
				$data = new stdClass();
				
				// load form helper and validation library
				$this->load->helper('form');
				$this->load->library('form_validation');
				
				// set validation rules
				$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[4]|is_unique[users.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
				$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]');
				
				if ($this->form_validation->run() === false) {
					
					// validation not ok, send validation errors to the view
					$this->load->view('Theme/main/headerMain', ['title'=>'Zeroday Music']);
					$deyta['links']=$this->user_model->getAllLinks();
					$this->load->view('Theme/admin/sideBar', $deyta);
					$this->load->view('user/register/register', $data);
					$this->load->view('Theme/main/footerMain');
					
				} else {
					
					// set variables from the form
					$username = $this->input->post('username');
					$email    = $this->input->post('email');
					$password = $this->input->post('password');

					if ($this->user_model->create_user($username, $email, $password)) {
						// user creation ok
						$this->load->view('Theme/main/headerMain', ['title'=>'Zeroday Music']);
						$deyta['links']=$this->user_model->getAllLinks();
						$this->load->view('Theme/admin/sideBar', $deyta);
						$this->load->view('user/register/register_success', $data);
						$this->load->view('Theme/main/footerMain');
						
					} else {
						
						// user creation failed, this should never happen
						$data->error = 'There was a problem creating your new account. Please try again.';
						
						// send error to the view
						$this->load->view('Theme/main/headerMain', ['title'=>'Zeroday Music']);
						$deyta['links']=$this->user_model->getAllLinks();
						$this->load->view('Theme/admin/sideBar', $deyta);
						$this->load->view('user/register/register', $data);
						$this->load->view('Theme/main/footerMain');
					}
					
				}
			}
			else
			{
				redirect('/user/login');
			}
		} else {
			redirect('/user/login');
        }		
	}
		
	/**
	 * login function.
	 * 
	 * @access public
	 * @return void
	 */
	public function login() {

		$this->load->library('session');
		// create the data object
		$data = new stdClass();
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');

		$deyta['flash_message'] = $this->session->flashdata('flash_message');
		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		
		if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('Theme/user/header', array('title'=>'Zeroday Music'));
			$this->load->view('user/login/login', $deyta);
			$this->load->view('Theme/user/footer');
			
		} else {
			
			// set variables from the form
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			if ($this->user_model->resolve_user_login($username, $password)) {
				
				$user_id = $this->user_model->get_user_id_from_username($username);
				$user    = $this->user_model->get_user($user_id);
				
				// set session user datas
				$_SESSION['user_id']      = (int)$user->id;
				$_SESSION['username']     = (string)$user->username;
				$_SESSION['logged_in']    = (bool)true;
				$_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
				$_SESSION['is_admin']     = (bool)$user->is_admin;
				
				// user login ok
		
				redirect('/Main');
				
			} else {
				
				// login failed
				$data->error = 'Wrong username or password.';
				
				// send error to the view
				$this->load->view('Theme/user/header', array('title'=>'Zeroday Music'));
				$this->load->view('user/login/login', $data);
				$this->load->view('Theme/user/footer');
				
			}
			
		}
		
	}
	
	/**
	 * logout function.
	 * 
	 * @access public
	 * @return void
	 */
	public function logout() {
		
		// create the data object
		$data = new stdClass();
		
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			
			// user logout ok
			$this->load->view('Theme/user/header', array('title'=>'Zeroday Music'));
			$this->load->view('user/logout/logout_success', $data);
			$this->load->view('Theme/user/footer');
			redirect('/Main');
			
		} else {
			
			// there user was not logged in, we cannot logged him out,
			// redirect him to site root
			redirect('/');
			
		}
		
	}

	public function forgot()
    {
		$this->load->library('email');
		$this->load->helper('form');
		$this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
	
        if($this->form_validation->run() == FALSE) {
            $this->load->view('Theme/user/header', array('title'=>'Zeroday Music'));
			$this->load->view('user/forgot');
			$this->load->view('Theme/user/footer');

        } else {
            $email = $this->input->post('email');  
            $clean = $this->security->xss_clean($email);
            $userInfo = $this->user_model->getUserInfoByEmail($clean);
                
            if(!$userInfo){
                $this->session->set_flashdata('flash_message', 'We cant find your email address');
                redirect(site_url().'user/login');
            }   
                   
            //build token 
				
            $token = $this->user_model->insertToken($userInfo->id);                        
            $qstring = $this->base64url_encode($token);                  
            $url = site_url() . 'user/reset_password/token/' . $qstring;
            $link = '<a href="' . $url . '">' . $url . '</a>'; 
                
            $message = '';                     
            $message .= '<strong>A password reset has been requested for this email account</strong><br>';
			$message .= '<strong>Please click:</strong> ' . $link;  
			$this->email->from('noreply@zerodaymusicgroup.com', 'Zero Day Music Group');
			$this->email->to($clean);
			$this->email->subject('Password Reset Request');
			$this->email->message($message);
			//Send mail
			if($this->email->send())
			{          
				$this->session->set_flashdata('flash_message', 'Email Sent');
				redirect(site_url().'user/login');
			}  
            exit;
                
            }
            
	}

	public function reset_password()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$token = $this->base64url_decode($this->uri->segment(4));                  
		$cleanToken = $this->security->xss_clean($token);
		
		$user_info = $this->user_model->isTokenValid($cleanToken); //either false or array();               
		
		if(!$user_info){
			$this->session->set_flashdata('flash_message', 'Token is invalid or expired');
			redirect(site_url().'/');
		}            

		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
		
		if ($this->form_validation->run() == FALSE) {   
			$this->load->view('Theme/user/header', array('title'=>'Zeroday Music'));
			$this->load->view('user/resetPass');
			$this->load->view('Theme/user/footer');

		} else {
							           
			$post = $this->input->post(NULL, TRUE);                
			$cleanPost = $this->security->xss_clean($post);             
			$hashed = $cleanPost['password'];                
			$cleanPost['password'] = $hashed;
			$cleanPost['user_id'] = $user_info->id;
			unset($cleanPost['passconf']);                
			if(!$this->user_model->updatePassword($cleanPost)){
				$this->session->set_flashdata('flash_message', 'There was a problem updating your password');
			}else{
				$this->session->set_flashdata('flash_message', 'Your password has been updated. You may now login');
			}
			redirect(site_url().'/user/login');                
		}
	}

	public function base64url_encode($data) { 
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
	} 
	public function base64url_decode($data) { 
		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
	}
	
}
