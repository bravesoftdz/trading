<?php if(! defined('BASEPATH')) exit('No direct access script allowed');
    /**
     * @author Afes Oktavianus
     * @abstract For Model kualitas
     * @Date 141217  
     */
     
     class M_pxkualitas extends CI_Model {
            
           public function __construct()
           {
              parent::__construct();
           }
           
           // Query Kota
           public function getAllkualitas($offset, $limit) {
            $query = $this->db->query("
                SELECT a.kualitasID, a.description
                     FROM pxkualitas as a order by a.kualitasID asc Limit $limit OFFSET $offset "
            );
            return $query;            
           }   
           
           // Query Count Kota
           public function getAllkualitasCount() {
            $query = $this->db->query("
                 SELECT * FROM pxkualitas
            ");
            return $query->num_rows();
           }
           
           // Query Nama Kota
           public function getkualitas($id, $offset, $limit) {                                                           
			$query = $this->db->query("select a.kualitasid, a.description from pxkualitas as a where a.kualitasid like '$id' or a.description LIKE '$id' Limit $limit OFFSET $offset ");
            return $query;
           }
           
           // Query Search Count Kota
           public function getCountkualitas($id = '') {
            $query = $this->db->query("
                 SELECT * FROM pxkualitas where kualitasid like '$id' or description LIKE '$id' 
            ");
            return $query->num_rows();
           }
           
           // Query Insert Divisi - masih salah
           public function insert($module, $id, $ins) {
                if ($module == "pxkualitas") {
                    $query = $this->db->query("insert into pxkualitas values('$id','$ins')");                                                     
                }
           }
           
           // Query GetEditKota
           public function getEditkualitas($id){
        		$query = $this->db->query("SELECT * FROM pxkualitas where kualitasID='$id' ORDER BY description ASC");
        		return $query;
           }
           
           // Query Update Data 
           public function update($module, $up, $id) {
                if ($module == "pxkualitas") {
                    $query = $this->db->query("update pxkualitas set description='$up' where kualitasid ='$id'");                                                     
                }                
           }
           
           // Query Hapus Data
           public function hapus($module, $id) {
                if ($module == "pxkualitas") {
                    $query = $this->db->query("Delete From pxkualitas where kualitasid ='$id'");                                                     
                }                
           }           
     }
     