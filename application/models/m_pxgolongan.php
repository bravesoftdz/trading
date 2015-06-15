<?php if(! defined('BASEPATH')) exit('No direct access script allowed');
    /**
     * @author Afes Oktavianus
     * @abstract For Model golongan
     * @Date 141217  
     */
     
     class M_pxgolongan extends CI_Model {
            
           public function __construct()
           {
              parent::__construct();
           }
           
           // Query Kota
           public function getAllgolongan($offset, $limit) {
            $query = $this->db->query("
                SELECT a.golonganID, a.description
                     FROM pxgolongan as a order by a.golonganID asc Limit $limit OFFSET $offset "
            );
            return $query;            
           }   
           
           // Query Count Kota
           public function getAllgolonganCount() {
            $query = $this->db->query("
                 SELECT * FROM pxgolongan
            ");
            return $query->num_rows();
           }
           
           // Query Nama Kota
           public function getgolongan($id, $offset, $limit) {                                                           
			$query = $this->db->query("select a.golonganid, a.description from pxgolongan as a where a.golonganid like '$id' or a.description LIKE '$id' Limit $limit OFFSET $offset ");
            return $query;
           }
           
           // Query Search Count Kota
           public function getCountgolongan($id = '') {
            $query = $this->db->query("
                 SELECT * FROM pxgolongan where golonganid like '$id' or description LIKE '$id' 
            ");
            return $query->num_rows();
           }
           
           // Query Insert Divisi - masih salah
           public function insert($module, $id, $ins) {
                if ($module == "pxgolongan") {
                    $query = $this->db->query("insert into pxgolongan values('$id','$ins')");                                                     
                }
           }
           
           // Query GetEditKota
           public function getEditgolongan($id){
        		$query = $this->db->query("SELECT * FROM pxgolongan where golonganID='$id' ORDER BY description ASC");
        		return $query;
           }
           
           // Query Update Data 
           public function update($module, $up, $id) {
                if ($module == "pxgolongan") {
                    $query = $this->db->query("update pxgolongan set description='$up' where golonganid ='$id'");                                                     
                }                
           }
           
           // Query Hapus Data
           public function hapus($module, $id) {
                if ($module == "pxgolongan") {
                    $query = $this->db->query("Delete From pxgolongan where golonganid ='$id'");                                                     
                }                
           }           
     }
     