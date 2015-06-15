<?php if(! defined('BASEPATH')) exit('No direct access script allowed');
    /**
     * @author Afes Oktavianus
     * @abstract For Model warna
     * @Date 141217  
     */
     
     class M_pxwarna extends CI_Model {
            
           public function __construct()
           {
              parent::__construct();
           }
           
           // Query Kota
           public function getAllwarna($offset, $limit) {
            $query = $this->db->query("
                SELECT a.warnaID, a.description
                     FROM pxwarna as a order by a.warnaID asc Limit $limit OFFSET $offset "
            );
            return $query;            
           }   
           
           // Query Count Kota
           public function getAllwarnaCount() {
            $query = $this->db->query("
                 SELECT * FROM pxwarna
            ");
            return $query->num_rows();
           }
           
           // Query Nama Kota
           public function getwarna($id, $offset, $limit) {                                                           
			$query = $this->db->query("select a.warnaid, a.description from pxwarna as a where a.warnaid like '$id' or a.description LIKE '$id' Limit $limit OFFSET $offset ");
            return $query;
           }
           
           // Query Search Count Kota
           public function getCountwarna($id = '') {
            $query = $this->db->query("
                 SELECT * FROM pxwarna where warnaid like '$id' or description LIKE '$id' 
            ");
            return $query->num_rows();
           }
           
           // Query Insert Divisi - masih salah
           public function insert($module, $id, $ins) {
                if ($module == "pxwarna") {
                    $query = $this->db->query("insert into pxwarna values('$id','$ins')");                                                     
                }
           }
           
           // Query GetEditKota
           public function getEditwarna($id){
        		$query = $this->db->query("SELECT * FROM pxwarna where warnaID='$id' ORDER BY description ASC");
        		return $query;
           }
           
           // Query Update Data 
           public function update($module, $up, $id) {
                if ($module == "pxwarna") {
                    $query = $this->db->query("update pxwarna set description='$up' where warnaid ='$id'");                                                     
                }                
           }
           
           // Query Hapus Data
           public function hapus($module, $id) {
                if ($module == "pxwarna") {
                    $query = $this->db->query("Delete From pxwarna where warnaid ='$id'");                                                     
                }                
           }           
     }
     