<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class p_c_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
    function tampil_menu()
	{
		// q = $this->db->query("SELECT id_menu, menu, IFNULL(id_parent, 100) AS parent FROM `tbl_menu` ORDER BY id_menu ASC");
		$q = $this->db->query("SELECT id_menu, menu, NULLIF(id_parent, '100') AS parent, NULLIF(action_menu,'') as menuaction FROM menu ORDER BY id_menu ASC");
		return $q;
	}

}