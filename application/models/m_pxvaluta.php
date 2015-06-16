<?php if(! defined('BASEPATH')) exit('No direct access script allowed');
    /**
     * @author Afes Oktavianus
     * @abstract For Model valuta
     * @Date 141217  
     */
     
     // Jika status = ap, maka proses table pxapval
     // dan jika status = ar, maka proses table pxarval
     class M_PXValuta extends CI_Model {
            
           public function __construct()
           {
              parent::__construct();
           }
           
           // Query Kota
           public function getAllvaluta($offset, $limit, $stat) {
              if ($stat == 'ap') { 
                $query = $this->db->query("
                    SELECT a.valid, a.description, a.tukar
                         FROM pxapval as a order by a.valid asc Limit $limit OFFSET $offset "
                );
                return $query;
              } else {
                $query = $this->db->query("
                    SELECT a.valid, a.description, a.tukar
                         FROM pxarval as a order by a.valid asc Limit $limit OFFSET $offset ");
                return $query;
              }                        
           }   
           
           // Query Count Kota
           public function getAllvalutaCount($stat) {
            if ($stat == 'ap') {
              $query = $this->db->query("
                   SELECT * FROM pxapval
              ");
            } else {
              $query = $this->db->query("
                 SELECT * FROM pxarval
              ");
            }
            return $query->num_rows();
           }
           
           // Query Nama Kota
           public function getvaluta($id, $offset, $limit, $stat) {
              if ($stat == 'ap') {
      			      $query = $this->db->query("select a.valid, a.description, a.tukar from pxapval as a where a.valid like '$id' or a.description LIKE '$id' Limit $limit OFFSET $offset ");
                  return $query;
              } else {
                  $query = $this->db->query("select a.valid, a.description, a.tukar from pxarval as a where a.valid like '$id' or a.description LIKE '$id' Limit $limit OFFSET $offset ");
                  return $query;
              }
           }
           
           // Query Search Count Kota
           public function getCountvaluta($id = '', $stat) {
              if ($stat == 'ap') {
                  $query = $this->db->query("
                      SELECT * FROM pxapval where valid like '$id' or description LIKE '$id' 
                  ");
                  return $query->num_rows();
              } else {
                  $query = $this->db->query("
                      SELECT * FROM pxarval where valid like '$id' or description LIKE '$id' 
                  ");
                  return $query->num_rows();
              }   
           }
           
           // Query Insert Divisi - masih salah
           public function insert($module, $id, $ins, $tkr, $stat) {
              if ($stat == 'ap') {
                if ($module == "pxapval") {
                    $query = $this->db->query("insert into pxapval(valid,description,tukar) values('$id','$ins','$tkr')");                                                     
                }
              } else {
                if ($module == "pxarval") {
                    $query = $this->db->query("insert into pxarval(valid,description,tukar) values('$id','$ins','$tkr')");                                                     
                }
              }
           }
           
           // Query GetEditKota
           public function getEditvaluta($id, $stat){
              if ($stat == 'ap') {
              		$query = $this->db->query("SELECT * FROM pxapval where valid='$id' ORDER BY description ASC");
              		return $query;
              } else {
                  $query = $this->db->query("SELECT * FROM pxarval where valid='$id' ORDER BY description ASC");
                  return $query; 
              }    
           }
           
           // Query Update Data 
           public function update($module, $up, $id, $tukar, $stat) {
              if ($stat == 'ap') {
                if ($module == "pxapval") {
                    $query = $this->db->query("update pxapval set description='$up', tukar='$tukar' where valid ='$id'");                                                     
                }                
              } else {
                if ($module == "pxarval") {
                    $query = $this->db->query("update pxarval set description='$up', tukar='$tukar' where valid ='$id'");                                                     
                }
              } 
           }
           
           // Query Hapus Data
           public function hapus($module, $id, $stat) {
              if ($stat == 'ap') {
                if ($module == "pxapval") {
                    $query = $this->db->query("Delete From pxapval where valid ='$id'");                                                     
                }                
              } else {
                if ($module == "pxarval") {
                    $query = $this->db->query("Delete From pxarval where valid ='$id'");                                                     
                }
              }  
           }           
     }
     