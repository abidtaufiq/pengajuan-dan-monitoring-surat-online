<?php

class Galery_model extends CI_Model
{
    public function profil()
    {
        return $this->db->get("gallery")->result_array();
    }

    public function UpdateProfil($id)
    {
        $profil = $this->input->post('profil');

        $this->db->set('profile',$profil);

        $this->db->where('id',$id);
        $this->db->update('gallery');
    }
    
    public function UpdateSKelurahan($s_kelurahan,$id)
    {
        $this->db->set('s_kelurahan',$s_kelurahan);

        $this->db->where('id',$id);
        $this->db->update('gallery');
    }
    
    public function UpdateSLpm($s_lpm,$id)
    {
        $this->db->set('s_lpm',$s_lpm);

        $this->db->where('id',$id);
        $this->db->update('gallery');
    }
    
    public function UpdateSLinmas($s_linmas,$id)
    {
        $this->db->set('s_linmas',$s_linmas);

        $this->db->where('id',$id);
        $this->db->update('gallery');
    }
    
    public function UpdateSPemuda($s_pemuda,$id)
    {
        $this->db->set('s_pemuda',$s_pemuda);

        $this->db->where('id',$id);
        $this->db->update('gallery');
    }

    public function UpdateSrtrw($k_rtrw,$id)
    {
        $this->db->set('k_rtrw',$k_rtrw);

        $this->db->where('id',$id);
        $this->db->update('gallery');
    }
}
