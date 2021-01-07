<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class data_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    // get data with limit and search
    public function get_limit_data($limit, $start = 0, $q = null)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_kolam', $q);
        $this->db->or_like('tanggal', $q);
        $this->db->or_like('kode_kolam', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    function tampil_data()
    {
        $this->db->select('*');
        $this->db->from('data_parsial');
        $this->db->order_by("kode_kolam", "desc");
        $query = $this->db->get()->result();
        return $query;
    }
    public function getGrafik()
    {
        $sql = "SELECT size, kode_kolam from data_sampling ORDER BY kode_kolam ASC";
        return $this->db->query($sql)->result();
    }
}
