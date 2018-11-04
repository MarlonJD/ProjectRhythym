<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->model('AdminModel');
		$this->load->helper('form');
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			if ($_SESSION['is_admin']  === true) 
			{
				$data['allGenres']=$this->AdminModel->getAllGenres();
				$data['title'] = "Admin Dashboard";
				$this->load->view('Theme/main/headerMain', $data);
				$data['links']=$this->AdminModel->getAllLinks();
				$this->load->view('Theme/admin/sideBar', $data);
				$this->load->view('admin/adminHome', $data);
				$this->load->view('Theme/main/footerMain');
			}
			else
			{
				redirect('/user/login');
			}
		} else {
			redirect('/user/login');
        }
	}

	function Distribution($key)
	{
		$this->load->model('AdminModel');
		$this->load->helper('form');
		$this->load->helper('main');
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			if ($_SESSION['is_admin']  === true) 
			{
				$data['allGenres']=$this->AdminModel->getAllGenres();
				$data['title'] = "Admin Distribution";
				$this->load->view('Theme/main/headerMain', $data);
				$data['links']=$this->AdminModel->getAllLinks();
				$this->load->view('Theme/admin/sideBar', $data);
				$data['dists'] = $this->AdminModel->getDists($key);
				if ($this->session->flashdata('confirmed'))
				{
					$data['confirmed'] = TRUE;
				}
				elseif ($this->session->flashdata('deleted'))
				{
					$data['deleted'] = TRUE;
				}
				elseif ($this->session->flashdata('pending'))
				{
					$data['pend'] = TRUE;
				}
				$this->load->view('admin/adminDist', $data);
				$this->load->view('Theme/main/footerMain');
				
			}
			else
			{
				redirect('/user/login');
			}
		} else {
			redirect('/user/login');
        }
	}

	function DistAdd()
	{
		$this->load->model('AdminModel');
		$this->load->helper('form');
		$this->load->helper('main');
		$this->load->library('form_validation');
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			if ($_SESSION['is_admin']  === true) 
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
						$this->AdminModel->sendDistAsUser();
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
				$data['genres']=$this->AdminModel->getGenres();
				$data['title'] = "Admin Users";
				$this->load->view('Theme/main/headerMain', $data);
				$data['links']=$this->AdminModel->getAllLinks();
				$this->load->view('Theme/admin/sideBar', $data);
				$data['users']=$this->AdminModel->getAllUsers();
				$this->load->view('admin/adminDistAdd', $data);
				$this->load->view('Theme/main/footerMain');	
			}
			else
			{
				redirect('/user/login');
			}
		} else {
			redirect('/user/login');
        }
	}

	function DistChange($key0 = NULL, $did = NULL)
	{
		$this->load->model('AdminModel');
		$this->load->helper('form');
		$this->load->helper('main');
		$this->load->library('user_agent');
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			if ($_SESSION['is_admin']  === true)
			{
				if ($key0 == "confirm")
				{
					$this->AdminModel->changeDist($did, 1);
					if ($this->db->affected_rows() > 0)
					{
						$this->session->set_flashdata('confirmed',TRUE);
					}
					redirect($this->agent->referrer());
					
				}
				elseif ($key0 == "delete")
				{
					$this->AdminModel->changeDist($did, 2);
					if ($this->db->affected_rows() > 0)
					{
						$this->session->set_flashdata('deleted',TRUE);
					}
					redirect($this->agent->referrer());
				}
				elseif ($key0 == "pend")
				{
					$this->AdminModel->changeDist($did, 0);
					if ($this->db->affected_rows() > 0)
					{
						$this->session->set_flashdata('pending',TRUE);
					}
					redirect($this->agent->referrer());
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
	

	function Users($key)
	{
		$this->load->model('AdminModel');
		$this->load->helper('form');
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			if ($_SESSION['is_admin']  === true) 
			{
				if ($key == "register")
				{
					redirect('/user/register');
				}
				if ($key == "all")
				{
					$data['title'] = "Admin Users";
					$this->load->view('Theme/main/headerMain', $data);
					$data['links']=$this->AdminModel->getAllLinks();
					$this->load->view('Theme/admin/sideBar', $data);
					$data['users']=$this->AdminModel->getAllUsers();
					$this->load->view('admin/adminUsers', $data);
					$this->load->view('Theme/main/footerMain');
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

	function ContentID($key0) // Read
	{
		$this->load->model('AdminModel');
		$this->load->helper('form');
		$this->load->helper('main');
		$this->load->library('user_agent');
		$this->load->helper('url');
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			if ($_SESSION['is_admin']  === true) 
			{
				if ($key0 == "Add")
				{
					$data['links']=$this->AdminModel->getAllLinks();
					$data['flash_message'] = $this->session->flashdata('flash_message');
					if($this->input->post('buttonSendLinks'))
					{
						$this->AdminModel->sendCIDFunction();
						$this->session->set_flashdata('flash_message', "Added successfully");
						redirect($this->agent->referrer());
					}
					$data['title'] = "Admin Content ID";
					$this->load->view('Theme/main/headerMain', $data);
					$this->load->view('Theme/admin/sideBar', $data);
					$data['contents']=$this->AdminModel->getAllContents();
					$this->load->view('admin/adminCIdAdd', $data);
					$this->load->view('Theme/main/footerMain');
				}
				elseif ($key0 == "All")
				{
					$data['title'] = "Admin Content ID";
					$this->load->view('Theme/main/headerMain', $data);
					$data['links']=$this->AdminModel->getAllLinks();
					$this->load->view('Theme/admin/sideBar', $data);
					$data['allcids']=$this->AdminModel->getAllCID();
					$this->load->view('admin/adminCIdAll', $data);
					$this->load->view('Theme/main/footerMain');
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

	function RemoveCID($id)
	{
		$this->load->library('user_agent');
		$this->load->helper('url');
		$this->load->model('AdminModel');
		$this->AdminModel->RemoveCIDFunction($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('removed', 'Successfully removed.');
			redirect($this->agent->referrer());
		} else {
			$this->session->set_flashdata('removed', 'Error: It could not removed');
		}
	}

	function Earning($key)
	{
		$this->load->model('AdminModel');
		$this->load->helper('form');
		$this->load->helper('main');
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			if ($_SESSION['is_admin']  === true) 
			{
				if ($key == 'Stats')
				{
					$data['title'] = "Admin Earnings";
					$this->load->view('Theme/main/headerMain', $data);
					$data['links']=$this->AdminModel->getAllLinks();
					$this->load->view('Theme/admin/sideBar', $data);
					$data['stats']=$this->AdminModel->getAllStats();
					$this->load->view('admin/adminEStats', $data);
					$this->load->view('Theme/main/footerMain');
				}
				elseif ($key == 'addStat')
				{
					if($this->input->post('buttonSendStat'))
					{
						$this->AdminModel->SendStatsFunction();
						if ($this->db->affected_rows() > 0)
						{
							$data['sendStats'] = TRUE;
						}
					}
					$this->load->view('Theme/main/headerMain');
					$data['links']=$this->AdminModel->getAllLinks();
					$this->load->view('Theme/admin/sideBar', $data);
					$data['contents']=$this->AdminModel->getAllContents();
					$this->load->view('admin/adminEAddStat', $data);
					$this->load->view('Theme/main/footerMain');
				}
				elseif ($key == 'Statements')
				{
					$this->load->view('Theme/main/headerMain');
					$data['links']=$this->AdminModel->getAllLinks();
					$this->load->view('Theme/admin/sideBar', $data);
					$data['states']=$this->AdminModel->getAllStatements();
					$this->load->view('admin/adminEStatements', $data);
					$this->load->view('Theme/main/footerMain');
				}
				elseif ($key == 'addStatement')
				{
					if($this->input->post('buttonSendStatement'))
					{
						$this->AdminModel->SendStatementFunction();
						if ($this->db->affected_rows() > 0)
						{
							$data['SendStatement'] = TRUE;
						}
					}
					$this->load->view('Theme/main/headerMain');
					$data['links']=$this->AdminModel->getAllLinks();
					$this->load->view('Theme/admin/sideBar', $data);
					$data['users']=$this->AdminModel->getAllUsers();
					$this->load->view('admin/adminEAddStatement', $data);
					$this->load->view('Theme/main/footerMain');
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

	function getPD($key)
	{
		$this->load->model('AdminModel');
		$this->load->helper('form');
		$this->load->helper('main');
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			if ($_SESSION['is_admin']  === true) 
			{
				$data['title'] = "Admin Users";
				$this->load->view('Theme/main/headerMain', $data);
				$data['links']=$this->AdminModel->getAllLinks();
				$this->load->view('Theme/admin/sideBar', $data);
				$data['pds']=$this->AdminModel->getPDFunction($key);
				$this->load->view('admin/adminPayment', $data);
				$this->load->view('Theme/main/footerMain');
			}
			else
			{
				redirect('/user/login');
			}
		} else {
			redirect('/user/login');
        }
	}

	function ChangeP($key0, $id)
	{
		$this->load->model('AdminModel');
		$this->load->helper('form');
		$this->load->helper('main');
		$this->load->library('user_agent');
		$this->load->helper('url');
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			if ($_SESSION['is_admin']  === true)
			{
				if ($key0 == "confirm")
				{
					$this->AdminModel->changePF($id, 2);
					if ($this->db->affected_rows() > 0)
					{
						$this->session->set_flashdata('confirmed',TRUE);
					}
					redirect($this->agent->referrer());
					
				} elseif ($key0 == "pending")
					$this->AdminModel->changePF($id, 0);
					if ($this->db->affected_rows() > 0)
					{
						$this->session->set_flashdata('pending',TRUE);
					}
					redirect($this->agent->referrer());
			}
			else
			{
				redirect('/user/login');
			}
		} else {
			redirect('/user/login');
        }
	}

	function Other($key0) // Read
	{
		$this->load->model('AdminModel');
		$this->load->helper('form');
		$this->load->helper('main');
		$this->load->library('user_agent');
		$this->load->helper('url');
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			if ($_SESSION['is_admin']  === true) 
			{
				if ($key0 == "Links")
				{
					$data['allLinks']=$this->AdminModel->getAllLinks();
					$data['flash_message'] = $this->session->flashdata('flash_message');
					if($this->input->post('buttonSendLinks'))
					{
						$this->AdminModel->sendLinksFunction();
						redirect($this->agent->referrer());
					}
					$data['title'] = "Admin Others";
					$this->load->view('Theme/main/headerMain', $data);
					$data['links']=$this->AdminModel->getAllLinks();
					$this->load->view('Theme/admin/sideBar', $data);
					$this->load->view('admin/adminOtherLinks', $data);
					$this->load->view('Theme/main/footerMain');
				}
				elseif ($key0 == "Genres")
				{
					$data['genres']=$this->AdminModel->getGenres();
					$data['allGenres']=$this->AdminModel->getAllGenres();
					if($this->input->post('buttonSendGenres'))
					{
						$this->AdminModel-->sendGenresFunction();
						redirect($this->agent->referrer());
					}
					$data['title'] = "Admin Others";
					$this->load->view('Theme/main/headerMain', $data);
					$data['links']=$this->AdminModel->getAllLinks();
					$this->load->view('Theme/admin/sideBar', $data);
					$this->load->view('admin/adminOtherGenres', $data);
					$this->load->view('Theme/main/footerMain');
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

	function RemoveLink($id)
	{
		$this->load->library('user_agent');
		$this->load->helper('url');
		$this->load->model('AdminModel');
		$this->AdminModel->RemoveLinksFunction($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('removed', 'Successfully removed.');
			redirect($this->agent->referrer());
		} else {
			$this->session->set_flashdata('removed', 'Error: It could not removed');
		}
	}

}