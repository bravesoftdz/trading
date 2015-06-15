<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Golongan untuk controller table PXGolongan
 * @author Afes Oktavianus
 * @since 02-02-2015 
 */
 
 class Golongan extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->library('tree');
        $this->load->model('p_c_model');
        $this->load->model('m_pxgolongan');
    }
    
    function index(){
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login');
        } else {
            redirect('px/golongan/list_');   
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
        $data['golongan']    = $this->m_pxgolongan->getAllgolongan($offset, $limit);
        $data['count']   = $this->m_pxgolongan->getAllgolonganCount();
       
        $config          = array();
        $config['base_url']     = base_url(). 'px/golongan/list_/';
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
        
        $data['judul']            = "List Daftar Golongan | Administrator";
        $data['menu']       = $this->p_c_model->tampil_menu();            
        $this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
        //$this->load->view('template/admin/home', $data);| jika digunakan maka akan double menunya
        //$this->load->view('template/admin/sidebar', $data); 
        $this->load->view('admin/golongan/list', $data);                		
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
            $data['golongan']    = $this->m_pxgolongan->getgolongan($keyword, $offset, $limit);
            $data['count']   = $this->m_pxgolongan->getCountgolongan($keyword);
        } else {
            redirect('px/golongan/list_');
        }                            
       
        $config          = array();
        $config['base_url']     = base_url(). 'px/golongan/filter/';
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
        
        $data['judul']            = "List Daftar Golongan | Administrator";
        $data['menu']       = $this->p_c_model->tampil_menu();            
        $this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
        //$this->load->view('template/admin/home', $data);| jika digunakan maka akan double menunya
        //$this->load->view('template/admin/sidebar', $data); 
        $this->load->view('admin/golongan/filter', $data);                		
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
    		$this->load->model("m_pxgolongan");     		 
    		$data['judul']='Tambah Golongan';
            $data['golonganid']="";
    		$data['description'] = "";
		    $data['stts'] = "tambah";	
    		// $data['view']='admin/setting/umum/bg_input_golongan';
    		$this->load->view('admin/golongan/new',$data);
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
			    $this->form_validation->set_rules('golonganid', 'golongan ID', 'required|xss_clean|max_length[5]|trim|strip_tags'); 
				$this->form_validation->set_rules('description', 'Desription', 'required|xss_clean|max_length[50]|trim|strip_tags');
        		if($this->form_validation->run() == TRUE){            		   
				   $this->m_pxgolongan->update("pxgolongan",$this->input->post('description'),$this->input->post('golonganid'));
        		   $this->session->set_flashdata('info', "List golongan berhasil dirubah.");
        		   redirect('px/golongan/');
        		}  
                redirect('px/golongan/');		 
			} else if($st=="tambah")
	        {
	            $this->form_validation->set_rules('golonganid', 'golongan ID', 'required|xss_clean|max_length[5]|trim|strip_tags');   
				$this->form_validation->set_rules('description', 'Description', 'required|xss_clean|max_length[50]|trim|strip_tags');
        		if($this->form_validation->run() == TRUE){
        		   $this->m_pxgolongan->insert("pxgolongan",$this->input->post('golonganid'),$this->input->post('description'));
        		   $this->session->set_flashdata('info', "List golongan berhasil ditambahkan.");
        		   redirect('px/golongan/');
        		}  
                redirect('px/golongan/');  		 
            }    			
        }    
    }
    
    function change($id){
		$data['change_golongan'] = $this->m_pxgolongan->getEditgolongan($id)->row();
		$data['judul'] = "Edit Daftar Golongan | Administrator";
        $data['menu']       = $this->p_c_model->tampil_menu();
        $data['stts'] = "edit";
		$this->load->view('template/admin/header', $data);
	    $this->load->view('template/admin/nav');
        $this->load->view('template/admin/sidebar', $data);
        //-------------------------------------------------------//
		$this->load->view('admin/golongan/change', $data);
		$this->load->view('template/admin/footer');
    }
    
    function delete($id){
		$hapus = $this->m_pxgolongan->hapus("pxgolongan",$id);    		    		
		$this->session->set_flashdata('info', "Nama Golongan berhasil dihapus.");
		redirect('px/golongan/');
		
	}
 }