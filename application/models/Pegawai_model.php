<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function deletePegawai()
    {
        $query = "DELETE FROM pegawai WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id',$id);

        $this->db->execute();
        return $this->db->rowCount();
        
        return $this->db->query($query)->result_array();
    }
}
