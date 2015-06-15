<?php if(! defined('BASEPATH')) exit('No direct access script allowed');
    /**
     * @author Afes Oktavianus
     * @abstract For Model Jenis
     * @Date 141217  
     */
     
     class M_PXJenis extends CI_Model {
            
           public function __construct()
           {
              parent::__construct();
           }
           
           // Query Kota
           public function getAllJenis($offset, $limit) {
            $query = $this->db->query("
                SELECT a.JenisID, a.Description
                     FROM PXJenis as a order by a.JenisID asc Limit $limit OFFSET $offset "
            );
            return $query;            
           }   
           
           // Query Count Kota
           public function getAllJenisCount() {
            $query = $this->db->query("
                 SELECT * FROM PXJenis
            ");
            return $query->num_rows();
           }
           
           // Query Nama Kota
           public function getJenis($id, $offset, $limit) {                                                           
			$query = $this->db->query("select a.jenisid, a.description from pxjenis as a where a.jenisid like '$id' or a.description LIKE '$id' Limit $limit OFFSET $offset ");
            return $query;
           }
           
           // Query Search Count Kota
           public function getCountJenis($id = '') {
            $query = $this->db->query("
                 SELECT * FROM pxjenis where jenisid like '$id' or description LIKE '$id' 
            ");
            return $query->num_rows();
           }
           
           // Query Insert Divisi - masih salah
           public function insert($module, $id, $ins) {
                if ($module == "pxjenis") {
                    $query = $this->db->query("insert into pxjenis values('$id','$ins')");                                                     
                }
           }
           
           // Query GetEditKota
           public function getEditJenis($id){
        		$query = $this->db->query("SELECT * FROM PXJenis where JenisID='$id' ORDER BY Description ASC");
        		return $query;
           }
           
           // Query Update Data 
           public function update($module, $up, $id) {
                if ($module == "pxjenis") {
                    $query = $this->db->query("update pxjenis set description='$up' where jenisid ='$id'");                                                     
                }                
           }
           
           // Query Hapus Data
           public function hapus($module, $id) {
                if ($module == "pxjenis") {
                    $query = $this->db->query("Delete From pxjenis where jenisid ='$id'");                                                     
                }                
           }           
     }
     