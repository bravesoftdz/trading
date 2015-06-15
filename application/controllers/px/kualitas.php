<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class kualitas untuk controller table PXkualitas
 * @author Afes Oktavianus
 * @since 02-02-2015 
 */
 
 class Kualitas extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->library('tree');
        $this->load->model('p_c_model');
        $this->load->model('m_pxkualitas');
    }
    
    function index(){
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login');
        } else {
            redirect('px/kualitas/list_');   
        }
    }
    
    function list_() {
        if($this->uri->segment(4) == "") {
            $offset = 0;
        } else {
            $offset = $this->uri->segment(4);
            //echo $offset;
            //break;
        }
        
        $limit = 5;
        $data['kualitas']    = $this->m_pxkualitas->getAllkualitas($offset, $limit);
        $data['count']   = $this->m_pxkualitas->getAllkualitasCount();
       
        $config          = array();
        $config['base_url']     = base_url(). 'px/kualitas/list_/';
        $config['per_page']     = $limit;
        $config['uri_segment']  = 4;
        $config['num_links']    = 5;
        
        $config['first_tag_open'] = '<li>';
        $config['first_link']     = 'First';
        $config['first_tag_close']= '</li>';
        $config['prev_link']      = 'Prev';
        $config['prev_tag_open']  = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open']   = '<li class="active"><a href>';
        $config['cur_tag_close']  = '</a></li>';
        $config['next_link']      = 'Next'; 
        $config['next_tag_open']  = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open']   = '<li>';
        $config['num_tag_close']  = '</li>';
        $config['last_tag_open']  = '<li>';
        $config['last_link']      = 'Last';            
        $config['last_tag_close'] = '</li>';
        $config['total_rows']     = $data['count'];
        $this->pagination->initialize($config);
        $this->session->set_userdata('row', $this->uri->segment(4));
        
        $data['judul']            = "List Daftar Kualitas | Administrator";
        $data['menu']       = $this->p_c_model->tampil_menu();            
        $this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
        //$this->load->view('template/admin/home', $data);| jika digunakan maka akan double menunya
        //$this->load->view('template/admin/sidebar', $data); 
        $this->load->view('admin/kualitas/list', $data);                		
		$this->load->view('template/admin/footer');
    }
  
    function filter() {
       if($this->uri->segment(4) == "") {
            $offset = 0;
        } else {
            $offset = $this->uri->segment(4);
            //echo $offset;
            //break;
        }
        // Ambil dari variable Cari untuk keyword Search
        $keyword = $this->input->post('cari');                       
        //
        $limit = 5;           
        if (!$keyword == "") {
            $data['kualitas']    = $this->m_pxkualitas->getkualitas($keyword, $offset, $limit);
            $data['count']   = $this->m_pxkualitas->getCountkualitas($keyword);
        } else {
            redirect('px/kualitas/list_');
        }                            
       
        $config          = array();
        $config['base_url']     = base_url(). 'px/kualitas/filter/';
        $config['per_page']     = $limit;
        $config['uri_segment']  = 4;
        $config['num_links']    = 5;
        
        $config['first_tag_open'] = '<li>';
        $config['first_link']     = 'First';
        $config['first_tag_close']= '</li>';
        $config['prev_link']      = 'Prev';
        $config['prev_tag_open']  = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open']   = '<li class="active"><a href>';
        $config['cur_tag_close']  = '</a></li>';
        $config['next_link']      = 'Next'; 
        $config['next_tag_open']  = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open']   = '<li>';
        $config['num_tag_close']  = '</li>';
        $config['last_tag_open']  = '<li>';
        $config['last_link']      = 'Last';            
        $config['last_tag_close'] = '</li>';
        $config['total_rows']     = $data['count'];
        $this->pagination->initialize($config);
        $this->session->set_userdata('row', $this->uri->segment(4));
        
        $data['judul']            = "List Daftar Kualitas | Administrator";
        $data['menu']       = $this->p_c_model->tampil_menu();            
        $this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
        //$this->load->view('template/admin/home', $data);| jika digunakan maka akan double menunya
        //$this->load->view('template/admin/sidebar', $data); 
        $this->load->view('admin/kualitas/filter', $data);                		
		$this->load->view('template/admin/footer');           
       
    }  
    
    function New_()
    {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {            
            $data['menu']       = $this->p_c_model->tampil_menu();            
            $this->load->view('template/admin/header', $data);
		    $this->load->view('template/admin/nav');
            $this->load->view('template/admin/sidebar', $data);
            //-------------------------------------------------------//
    		$this->load->model("m_pxkualitas");     		 
    		$data['judul']='Tambah Kualitas';
            $data['kualitasid']="";
    		$data['description'] = "";
		    $data['stts'] = "tambah";	
    		// $data['view']='admin/setting/umum/bg_input_kualitas';
    		$this->load->view('admin/kualitas/new',$data);
            $this->load->view('template/admin/footer');
        }  
    }
    
    function simpan()
    {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $st = $this->input->post('stts');
			if($st=="edit")
			{   
			    $this->form_validation->set_rules('kualitasid', 'kualitas ID', 'required|xss_clean|max_length[5]|trim|strip_tags'); 
				$this->form_validation->set_rules('description', 'Desription', 'required|xss_clean|max_length[50]|trim|strip_tags');
        		if($this->form_validation->run() == TRUE){            		   
				   $this->m_pxkualitas->update("pxkualitas",$this->input->post('description'),$this->input->post('kualitasid'));
        		   $this->session->set_flashdata('info', "List Kualitas berhasil dirubah.");
        		   redirect('px/kualitas/');
        		}  
                redirect('px/kualitas/');		 
			} else if($st=="tambah")
	        {
	            $this->form_validation->set_rules('kualitasid', 'kualitas ID', 'required|xss_clean|max_length[5]|trim|strip_tags');   
				$this->form_validation->set_rules('description', 'Description', 'required|xss_clean|max_length[50]|trim|strip_tags');
        		if($this->form_validation->run() == TRUE){
        		   $this->m_pxkualitas->insert("pxkualitas",$this->input->post('kualitasid'),$this->input->post('description'));
        		   $this->session->set_flashdata('info', "List Kualitas berhasil ditambahkan.");
        		   redirect('px/kualitas/');
        		}  
                redirect('px/kualitas/');  		 
            }    			
        }    
    }
    
    function change($id){
		$data['change_kualitas'] = $this->m_pxkualitas->getEditkualitas($id)->row();
		$data['judul'] = "Edit Daftar Kualitas | Administrator";
        $data['menu']       = $this->p_c_model->tampil_menu();
        $data['stts'] = "edit";
		$this->load->view('template/admin/header', $data);
	    $this->load->view('template/admin/nav');
        $this->load->view('template/admin/sidebar', $data);
        //-------------------------------------------------------//
		$this->load->view('admin/kualitas/change', $data);
		$this->load->view('template/admin/footer');
    }
    
    function delete($id){
		$hapus = $this->m_pxkualitas->hapus("pxkualitas",$id);    		    		
		$this->session->set_flashdata('info', "Nama Kualitas berhasil dihapus.");
		redirect('px/kualitas/');
		
	}
 }