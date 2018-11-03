<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index() // Read
	{
		$this->load->model('MainModel');
		$this->load->helper('form');
		$this->load->helper('main');
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			if ($_SESSION['is_admin']  === true) {
				redirect('/admin');
			}
			else
			{
				$data['title'] = "Dashboard";
				$this->load->view('Theme/main/headerMain', $data);
				$data['links']=$this->MainModel->getAllLinks();
				$this->load->view('Theme/main/sideBar', $data);
				$data['dists'] = $this->MainModel->getDistbyUserID($_SESSION['user_id']);
				$this->load->view('Main/mainHome', $data);
				$this->load->view('Theme/main/footerMain');
			}
		} else {
			redirect('/user/login');
        }

	}

	public function Distribution() // Read
	{
		
		$this->load->helper('url'); 
		$this->load->model('MainModel');
		$this->load->library('form_validation');
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			if ($_SESSION['is_admin']  === true) {
				redirect('/admin');
			}
			else
			{
				if($this->input->post('buttonSendDist'))
				{  
					
					$this->form_validation->set_rules('upMedia', 'upMedia', 'required');
					if ($this->form_validation->run() === false)
					{
						$data['sent'] = 'mediaempty';
					}
					else
					{
						$this->MainModel->sendDistFunction();
						if ($this->db->affected_rows() > 0)
						{
							$data['sent'] = 'success';
						}
						else
						{
							$data['sent'] = 'something';
						}
					}

				}
				$data['genres']=$this->MainModel->getGenres();
				$data['title'] = "Distribution";
				$this->load->view('Theme/main/headerMain', $data);
				$data['links']=$this->MainModel->getAllLinks();
				$this->load->view('Theme/main/sideBar', $data);
				$this->load->view('Main/mainDist', $data);
				$this->load->view('Theme/main/footerMain');
			}
		} else {
			redirect('/user/login');
        }
		
	}

	function ContentID()
	{
		
		$this->load->helper('url'); 
		$this->load->helper('main'); 
		$this->load->model('MainModel');
		$this->load->library('user_agent');
		$data['flash_message'] = $this->session->flashdata('flash_message');
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			if ($_SESSION['is_admin']  === true) {
				redirect('/admin');
			}
			else
			{
				$data['title'] = "Content ID";
				$this->load->view('Theme/main/headerMain', $data);
				$data['links']=$this->MainModel->getAllLinks();
				$this->load->view('Theme/main/sideBar', $data);
				$data['cids']=$this->MainModel->getUserCID($_SESSION['user_id']);
				$this->load->view('Main/mainCID', $data);
				$this->load->view('Theme/main/footerMain');
			}
		} else {
			redirect('/user/login');
        }
		
	}

	function ConfirmCID($id)
    {
		$this->load->helper('url'); 
		$this->load->model('MainModel');
		$this->load->helper('main'); 
		$this->load->library('user_agent');
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			if ($_SESSION['is_admin']  === true) {
				redirect('/admin');
			}
			else
			{
				$this->MainModel->confirmCIDFunction($id);
				if ($this->db->affected_rows() > 0)
				{
					$this->session->set_flashdata('flash_message',"Successfully sent request.");
				}
				redirect($this->agent->referrer());
			}
		} else {
			redirect('/user/login');
        }
	}



	function Earning()
    {
		$this->load->helper('url'); 
		$this->load->model('MainModel');
		$this->load->helper('main'); 
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			if ($_SESSION['is_admin']  === true) {
				redirect('/admin');
			}
			else
			{
				if($this->input->post('buttonSendDist'))
				{  
					$this->MainModel->sendDistFunction();
					if ($this->db->affected_rows() > 0)
					{
						$data['sent'] = true;
					}
					
				}
				elseif ($this->session->flashdata('confirmed'))
				{
					$data['confirmed'] = TRUE;
				}
				$data['stats']=$this->MainModel->getEarningsbyUserID($_SESSION['user_id']);
				$data['states']=$this->MainModel->getStatsbyUserID($_SESSION['user_id']);
				$data['title'] = "Earning";
				$this->load->view('Theme/main/headerMain', $data);
				$data['links']=$this->MainModel->getAllLinks();
				$this->load->view('Theme/main/sideBar', $data);
				$this->load->view('Main/mainEarning', $data);
				$this->load->view('Theme/main/footerMain');
			}
		} else {
			redirect('/user/login');
        }
	}



	function ChangeSStatus($id)
    {
		$this->load->helper('url'); 
		$this->load->model('MainModel');
		$this->load->helper('main'); 
		$this->load->library('user_agent');
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			if ($_SESSION['is_admin']  === true) {
				redirect('/admin');
			}
			else
			{
				$data['title'] = "Earning";
				$this->load->view('Theme/main/headerMain', $data);
				$data['links']=$this->MainModel->getAllLinks();
				$this->load->view('Theme/main/sideBar', $data);
				$this->load->view('Main/mainConfirm', $data);
				$this->load->view('Theme/main/footerMain');

				if($this->input->post('buttonConfirm'))
				{
					$this->MainModel->sendPayment();
					if ($this->db->affected_rows() > 0)
					{
						$this->MainModel->changePID($id, $_SESSION['user_id'], $this->db->insert_id());
						$this->MainModel->changeState($id, $_SESSION['user_id']);
						if ($this->db->affected_rows() > 0)
						{
							$this->session->set_flashdata('confirmed',TRUE);
						}
						redirect('main/Earning');
					}
					
				}
			}
		} else {
			redirect('/user/login');
        }
	}
	
	function GetSubGenres()
    {
		$this->load->model('MainModel');
        $this->load->helper('form');
		$destination  = $this->MainModel->getSubGenresF($this->input->post('genreid'));
		echo json_encode($destination);
	}
	
	function Privacy() // Read
	{
		$this->load->model('MainModel');
		$this->load->helper('form');
		$this->load->helper('main');
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			if ($_SESSION['is_admin']  === true) {
				redirect('/admin');
			}
			else
			{
				$data['title'] = "Privicy";
				$this->load->view('Theme/main/headerMain', $data);
				$data['links']=$this->MainModel->getAllLinks();
				$this->load->view('Theme/main/sideBar', $data);
				$this->load->view('Main/mainPrivacy');
				$this->load->view('Theme/main/footerMain');
			}
		} else {
			redirect('/user/login');
        }

	}

	function Agreement() // Read
	{
		$this->load->model('MainModel');
		$this->load->helper('form');
		$this->load->helper('main');
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			if ($_SESSION['is_admin']  === true) {
				redirect('/admin');
			}
			else
			{
				$data['title'] = "Agreement";
				$this->load->view('Theme/main/headerMain', $data);
				$data['links']=$this->MainModel->getAllLinks();
				$this->load->view('Theme/main/sideBar', $data);
				$this->load->view('Main/mainAgreement');
				$this->load->view('Theme/main/footerMain');
			}
		} else {
			redirect('/user/login');
        }

	}



}