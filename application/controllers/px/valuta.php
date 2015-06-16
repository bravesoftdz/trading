<?php if(!defined('BASEPATH')) exit ('No direct script access allowed');

/**
 * class for valuta supplier and customer
 * status 1 = supplier
 * status 2 = customer
 * @author Afes
 * @date(21/02/2015)
 */
 
 class Valuta extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('tank_auth');
        $this->load->library('tree');
        $this->load->model('p_c_model');
        $this->load->model('m_pxvaluta');        
    }
    
    function index() {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login');
        } else {
            redirect('px/valuta/list_');   
        }
    }
    
    function ap() {
        
        if($this->uri->segment(4) == "") {
            $offset = 0;
        } else {
            $offset = $this->uri->segment(4);
            //echo $offset;
            //break;
        }
        
        $limit = 5;
        $data['valuta']    = $this->m_pxvaluta->getAllvaluta($offset, $limit, 'ap');
        $data['count']     = $this->m_pxvaluta->getAllvalutaCount('ap');
       
        $config            = array();
        $config['base_url']     = base_url(). 'px/valuta/ap';
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
        
        $data['judul']            = "List Daftar valuta | Administrator";
        $data['menu']       = $this->p_c_model->tampil_menu();            
        $this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
        //$this->load->view('template/admin/home', $data);| jika digunakan maka akan double menunya
        //$this->load->view('template/admin/sidebar', $data); 
        $this->load->view('admin/valuta/list', $data);                		
		$this->load->view('template/admin/footer');
    }
    
    function ar() {
        if($this->uri->segment(4) == "") {
            $offset = 0;
        } else {
            $offset = $this->uri->segment(4);
            //echo $offset;
            //break;
        }
        
        $limit = 5;
        $data['valuta']    = $this->m_pxvaluta->getAllvaluta($offset, $limit, 'ar');
        $data['count']   = $this->m_pxvaluta->getAllvalutaCount('ar');
       
        $config          = array();
        $config['base_url']     = base_url(). 'px/valuta/ar';
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
        
        $data['judul']            = "List Daftar valuta | Administrator";
        $data['menu']       = $this->p_c_model->tampil_menu();            
        $this->load->view('template/admin/header', $data);
        $this->load->view('template/admin/nav');
        //$this->load->view('template/admin/home', $data);| jika digunakan maka akan double menunya
        //$this->load->view('template/admin/sidebar', $data); 
        $this->load->view('admin/valuta/list', $data);                      
        $this->load->view('template/admin/footer');
    }

    function filter(){
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
            $data['valuta']    = $this->m_pxvaluta->getvaluta($keyword, $offset, $limit);
            $data['count']   = $this->m_pxvaluta->getCountvaluta($keyword);
        } else {
            redirect('px/valuta/list_');
        }                            
       
        $config          = array();
        $config['base_url']     = base_url(). 'px/valuta/filter/';
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
        
        $data['judul']            = "List Daftar valuta | Administrator";
        $data['menu']       = $this->p_c_model->tampil_menu();            
        $this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/nav');
        //$this->load->view('template/admin/home', $data);| jika digunakan maka akan double menunya
        //$this->load->view('template/admin/sidebar', $data); 
        $this->load->view('admin/valuta/filter', $data);                		
		$this->load->view('template/admin/footer');
    }
    
    function New_()
    {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {     
            $stat =  $this->uri->segment(4);
            if ($stat == 'ap')  {
              $data['status'] = "ap";              
            } else {
              $data['status'] = "ar";              
            }        
            $data['menu']       = $this->p_c_model->tampil_menu();            
            $this->load->view('template/admin/header', $data);
		    $this->load->view('template/admin/nav');
            $this->load->view('template/admin/sidebar', $data);
            //-------------------------------------------------------//
    		$this->load->model("m_pxvaluta");     		 
    		$data['judul']='Tambah valuta';
            $data['valid']="";
    		$data['description'] = "";
		    $data['stts'] = "tambah";	
    		// $data['view']='admin/setting/umum/bg_input_valuta';
    		$this->load->view('admin/valuta/new',$data);
            $this->load->view('template/admin/footer');
        }  
    }
  
    function simpan()
    {
        if (!$this->tank_auth->is_logged_in()) {
            redirect('/auth/login/');
        } else {
            $st = $this->input->post('stts');
            $status = $this->input->post('status');
            // jika status = ap maka transaksi akan disimpan ditable pxapval
            // dan jika status  = ar maka transaksi akan disimpan ditable pxarval
			if($st=="edit")
			{   
			    $this->form_validation->set_rules('valid', 'valuta ID', 'required|xss_clean|max_length[5]|trim|strip_tags'); 
				$this->form_validation->set_rules('description', 'Desription', 'required|xss_clean|max_length[50]|trim|strip_tags');
                $this->form_validation->set_rules('tukar', 'tukar', 'trim|required|numeric|strip_tags');
        		if($this->form_validation->run() == TRUE){ 
                   if ($status = 'ap') {          		   
    				   $this->m_pxvaluta->update("pxapval",$this->input->post('description'),$this->input->post('valid'), $this->input->post('tukar'));
            		   $this->session->set_flashdata('info', "List valuta berhasil dirubah.");
            		   redirect('px/valuta/ap');
                   } else {
                       $this->m_pxvaluta->update("pxarval",$this->input->post('description'),$this->input->post('valid'), $this->input->post('tukar'));
                       $this->session->set_flashdata('info', "List valuta berhasil dirubah.");
                       redirect('px/valuta/ar');
                   }
        		}  
                if ($status = 'ap') {
                   redirect('px/valuta/ap');		 
                } else {
                   redirect('px/valuta/ar');      
                }
			} else if($st=="tambah")
	        {
	            $this->form_validation->set_rules('valid', 'valuta ID', 'required|xss_clean|max_length[5]|trim|strip_tags');   
				$this->form_validation->set_rules('description', 'description', 'required|xss_clean|max_length[50]|trim|strip_tags');
                $this->form_validation->set_rules('tukar', 'tukar', 'trim|required|numeric|strip_tags');
        		if($this->form_validation->run() == TRUE){
                   if ($status =='ap') {
            		   $this->m_pxvaluta->insert("pxapval",$this->input->post('valid'),$this->input->post('description'), $this->input->post('tukar'));
            		   $this->session->set_flashdata('info', "List valuta berhasil ditambahkan.");
            		   redirect('px/valuta/ap');
                   } else {
                       $this->m_pxvaluta->insert("pxarval",$this->input->post('valid'),$this->input->post('description'), $this->input->post('tukar'));
                       $this->session->set_flashdata('info', "List valuta berhasil ditambahkan.");
                       redirect('px/valuta/ar');
                   }
        		}                  
                $this->session->set_flashdata('info', "nilai tukar for numeric values.");                                
                if ($status = 'ap') {
                   redirect('px/valuta/ap');         
                } else {
                   redirect('px/valuta/ar');      
                }
            }    			
        }    
    } 
    
    function change($id){
        $stat =  $this->uri->segment(4);
		$data['change_valuta'] = $this->m_pxvaluta->getEditvaluta($id,$stat)->row();
		$data['judul'] = "Edit Daftar valuta | Administrator";
        $data['menu']       = $this->p_c_model->tampil_menu();
        $data['stts'] = "edit";
        
        if ($stat == 'ap')  {
          $data['status'] = "ap";              
        } else {
          $data['status'] = "ar";              
        }  
		$this->load->view('template/admin/header', $data);
	    $this->load->view('template/admin/nav');
        $this->load->view('template/admin/sidebar', $data);
        //-------------------------------------------------------//
		$this->load->view('admin/valuta/change', $data);
		$this->load->view('template/admin/footer');
    }
    
    function delete($id){
        $stat =  $this->uri->segment(4);
        if ($stat == 'ap')  {
           $hapus = $this->m_pxvaluta->hapus("pxapval",$id);                       
        } else {
          $hapus = $this->m_pxvaluta->hapus("pxarval",$id);                     
        }  		
		$this->session->set_flashdata('info', "Nama valuta berhasil dihapus.");
		if ($status = 'ap') {
           redirect('px/valuta/ap');         
        } else {
           redirect('px/valuta/ar');      
        }
		
	} 
 }