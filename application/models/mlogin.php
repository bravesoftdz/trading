<?php if(! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	  * Created by Afes Oktavianus
	  * Created Date 06-12-2014
	  * function model is Login model 	
	  */
	class MLogin extends CI_Model {

		function __construct() {
			parent::__construct();
			$this->load->database();	
		}

		function login($username, $password) {
			// Create Query to connect user login database
			$this->db->select('userid, username, password');
			$this->db->from('pxuser');
			$this->db->where('username', $username);
			$this->db->where('password', MD5($password));
			$this->db->limit(1);

			// get Query and processing
			$query = $this->db->get();
			if ($query->num_rows()  == 1) {
				return $query->result(); // if data is true;
			} else {
				return false; // if data is wrong
			}
		}
	}

	/* End of file mlogin.php */
    /* Location: ./application/models/mlogin.php */