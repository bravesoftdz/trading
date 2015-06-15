<?php if(! defined('BASEPATH')) exit('No direct access script allowed');
    /**
     * @author Afes Oktavianus
     * @abstract For Model ukuran
     * @Date 141217  
     */
     
     class M_pxukuran extends CI_Model {
            
           public function __construct()
           {
              parent::__construct();
           }
           
           // Query Kota
           public function getAllukuran($offset, $limit) {
            $query = $this->db->query("
                SELECT a.ukuranID, a.description
                     FROM pxukuran as a order by a.ukuranID asc Limit $limit OFFSET $offset "
            );
            return $query;            
           }   
           
           // Query Count Kota
           public function getAllukuranCount() {
            $query = $this->db->query("
                 SELECT * FROM pxukuran
            ");
            return $query->num_rows();
           }
           
           // Query Nama Kota
           public function getukuran($id, $offset, $limit) {                                                           
			$query = $this->db->query("select a.ukuranid, a.description from pxukuran as a where a.ukuranid like '$id' or a.description LIKE '$id' Limit $limit OFFSET $offset ");
            return $query;
           }
           
           // Query Search Count Kota
           public function getCountukuran($id = '') {
            $query = $this->db->query("
                 SELECT * FROM pxukuran where ukuranid like '$id' or description LIKE '$id' 
            ");
            return $query->num_rows();
           }
           
           // Query Insert Divisi - masih salah
           public function insert($module, $id, $ins) {
                if ($module == "pxukuran") {
                    $query = $this->db->query("insert into pxukuran values('$id','$ins')");                                                     
                }
           }
           
           // Query GetEditKota
           public function getEditukuran($id){
        		$query = $this->db->query("SELECT * FROM pxukuran where ukuranID='$id' ORDER BY description ASC");
        		return $query;
           }
           
           // Query Update Data 
           public function update($module, $up, $id) {
                if ($module == "pxukuran") {
                    $query = $this->db->query("update pxukuran set description='$up' where ukuranid ='$id'");                                                     
                }                
           }
           
           // Query Hapus Data
           public function hapus($module, $id) {
                if ($module == "pxukuran") {
                    $query = $this->db->query("Delete From pxukuran where ukuranid ='$id'");                                                     
                }                
           }           
     }
     