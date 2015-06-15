<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->library('tank_auth');
        $this->load->library('tree');
        $this->load->model('p_c_model');
	}

	function index()
	{
		if (!$this->tank_auth->is_logged_in()) {
			redirect('/auth/login/');
		} else {
			$data['user_id']	= $this->tank_auth->get_user_id();
			$data['username']	= $this->tank_auth->get_username();
            $data['menu']       = $this->p_c_model->tampil_menu();
			$this->load->view('template/admin/header', $data);				
			$this->load->view('welcome_message', $data);
            //$this->load->view('template/admin/home', $data);
			//$this->load->view('welcome', $data);
			$this->load->view('template/admin/footer', $data);
		}
	}
    
    // Modul Setting Umum
    function setting()
    {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {            
			redirect('/umum/setting/kota/');			            
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */