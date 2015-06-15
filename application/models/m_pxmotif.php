<?php if(! defined('BASEPATH')) exit('No direct access script allowed');
    /**
     * @author Afes Oktavianus
     * @abstract For Model motif
     * @Date 141217  
     */
     
     class M_pxmotif extends CI_Model {
            
           public function __construct()
           {
              parent::__construct();
           }
           
           // Query Kota
           public function getAllmotif($offset, $limit) {
            $query = $this->db->query("
                SELECT a.motifID, a.description
                     FROM pxmotif as a order by a.motifID asc Limit $limit OFFSET $offset "
            );
            return $query;            
           }   
           
           // Query Count Kota
           public function getAllmotifCount() {
            $query = $this->db->query("
                 SELECT * FROM pxmotif
            ");
            return $query->num_rows();
           }
           
           // Query Nama Kota
           public function getmotif($id, $offset, $limit) {                                                           
			$query = $this->db->query("select a.motifid, a.description from pxmotif as a where a.motifid like '$id' or a.description LIKE '$id' Limit $limit OFFSET $offset ");
            return $query;
           }
           
           // Query Search Count Kota
           public function getCountmotif($id = '') {
            $query = $this->db->query("
                 SELECT * FROM pxmotif where motifid like '$id' or description LIKE '$id' 
            ");
            return $query->num_rows();
           }
           
           // Query Insert Divisi - masih salah
           public function insert($module, $id, $ins) {
                if ($module == "pxmotif") {
                    $query = $this->db->query("insert into pxmotif values('$id','$ins')");                                                     
                }
           }
           
           // Query GetEditKota
           public function getEditmotif($id){
        		$query = $this->db->query("SELECT * FROM pxmotif where motifID='$id' ORDER BY description ASC");
        		return $query;
           }
           
           // Query Update Data 
           public function update($module, $up, $id) {
                if ($module == "pxmotif") {
                    $query = $this->db->query("update pxmotif set description='$up' where motifid ='$id'");                                                     
                }                
           }
           
           // Query Hapus Data
           public function hapus($module, $id) {
                if ($module == "pxmotif") {
                    $query = $this->db->query("Delete From pxmotif where motifid ='$id'");                                                     
                }                
           }           
     }
     