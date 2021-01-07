<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grafik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Grafik';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kolamnya'] = $this->db->get_where('data_kolam')->result_array();
        $data['sampling'] = $this->db->get_where('data_sampling')->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('grafik/udang', $data);
        $this->load->view('templates/f_grafik', $data);
    }
    public function getData()
    {
        $this->load->model('data_model');
        $data = $this->data_model->getGrafik();
        echo json_encode($data);
    }
}
