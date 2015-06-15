<?php if(! defined('BASEPATH')) exit('No direct access script allowed');
    /**
     * @author Afes Oktavianus
     * @abstract For Model merk
     * @Date 141217  
     */
     
     class M_pxmerk extends CI_Model {
            
           public function __construct()
           {
              parent::__construct();
           }
           
           // Query Kota
           public function getAllmerk($offset, $limit) {
            $query = $this->db->query("
                SELECT a.merkID, a.description
                     FROM pxmerk as a order by a.merkID asc Limit $limit OFFSET $offset "
            );
            return $query;            
           }   
           
           // Query Count Kota
           public function getAllmerkCount() {
            $query = $this->db->query("
                 SELECT * FROM pxmerk
            ");
            return $query->num_rows();
           }
           
           // Query Nama Kota
           public function getmerk($id, $offset, $limit) {                                                           
			$query = $this->db->query("select a.merkid, a.description from pxmerk as a where a.merkid like '$id' or a.description LIKE '$id' Limit $limit OFFSET $offset ");
            return $query;
           }
           
           // Query Search Count Kota
           public function getCountmerk($id = '') {
            $query = $this->db->query("
                 SELECT * FROM pxmerk where merkid like '$id' or description LIKE '$id' 
            ");
            return $query->num_rows();
           }
           
           // Query Insert Divisi - masih salah
           public function insert($module, $id, $ins) {
                if ($module == "pxmerk") {
                    $query = $this->db->query("insert into pxmerk values('$id','$ins')");                                                     
                }
           }
           
           // Query GetEditKota
           public function getEditmerk($id){
        		$query = $this->db->query("SELECT * FROM pxmerk where merkID='$id' ORDER BY description ASC");
        		return $query;
           }
           
           // Query Update Data 
           public function update($module, $up, $id) {
                if ($module == "pxmerk") {
                    $query = $this->db->query("update pxmerk set description='$up' where merkid ='$id'");                                                     
                }                
           }
           
           // Query Hapus Data
           public function hapus($module, $id) {
                if ($module == "pxmerk") {
                    $query = $this->db->query("Delete From pxmerk where merkid ='$id'");                                                     
                }                
           }           
     }
     