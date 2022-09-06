<?php

class Dashboard_model extends CI_Model
{
    public function user()
    {
        return $this->db->get("user")->result_array();
    }
}
