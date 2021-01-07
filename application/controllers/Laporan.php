<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('data_model');
    }
    public function index()
    {
        $data['title'] = 'Parsial';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['parsialnya'] = $this->db->get_where('data_parsial')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/parsial/parsial');
        $this->load->view('templates/footer');
    }


    public function t_parsial()
    {
        $data['title'] = 'Kelola Data Parsial';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kolam'] = $this->db->get_where('data_kolam')->result_array();
        $data['parsialnya'] = $this->db->get_where('data_parsial')->result_array();

        $this->form_validation->set_rules('no_parsial', 'Parsial', 'required|trim');
        $this->form_validation->set_rules('kode_kolam', 'Kode Kolam', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('hari', 'Hari', 'required|trim');
        $this->form_validation->set_rules('mbw', 'MBW', 'required|trim');
        $this->form_validation->set_rules('size', 'Size', 'required|trim');
        $this->form_validation->set_rules('biomasa', 'Biomasa', 'required|trim');
        $this->form_validation->set_rules('populasi', 'Populasi', 'required|trim');
        $this->form_validation->set_rules('parsial', 'Parsial', 'required|trim');
        $this->form_validation->set_rules('sisa_p', 'Sisa Populasi', 'required|trim');
        $this->form_validation->set_rules('pemasukan', 'Pemasukan', 'required|trim');
        $this->form_validation->set_rules('total', 'Total', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/parsial/t_parsial', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'no_parsial' => $this->input->post('no_parsial', true),
                'kode_kolam' => $this->input->post('kode_kolam', true),
                'tanggal' => $this->input->post('tanggal', true),
                'hari' => $this->input->post('hari', true),
                'mbw' => $this->input->post('mbw', true),
                'size' => $this->input->post('size', true),
                'biomasa' => $this->input->post('biomasa', true),
                'populasi' => $this->input->post('populasi', true),
                'parsial' => $this->input->post('parsial', true),
                'sisa_p' => $this->input->post('sisa_p', true),
                'pemasukan' => $this->input->post('pemasukan', true),
                'total' => $this->input->post('total', true)
            ];
            $this->db->insert('data_parsial', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data berhasil di tambahkan! </div>');
            redirect('data/parsial');
        }
    }
    public function u_parsial($parsial_id)
    {
        $data['title'] = 'Update Data Parsial';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['parsial'] = $this->db->get_where('data_parsial', ['id_parsial' => $parsial_id])->row_array();
        $data['kolam'] = $this->db->get_where('data_kolam')->result_array();

        $this->form_validation->set_rules('no_parsial', 'Parsial', 'required|trim');
        $this->form_validation->set_rules('kode_kolam', 'Kode Kolam', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('hari', 'Hari', 'required|trim');
        $this->form_validation->set_rules('mbw', 'MBW', 'required|trim');
        $this->form_validation->set_rules('size', 'Size', 'required|trim');
        $this->form_validation->set_rules('biomasa', 'Biomasa', 'required|trim');
        $this->form_validation->set_rules('populasi', 'Populasi', 'required|trim');
        $this->form_validation->set_rules('parsial', 'Parsial', 'required|trim');
        $this->form_validation->set_rules('sisa_p', 'Sisa Populasi', 'required|trim');
        $this->form_validation->set_rules('pemasukan', 'Pemasukan', 'required|trim');
        $this->form_validation->set_rules('total', 'Total', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/parsial/uParsial', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'no_parsial' => $this->input->post('no_parsial', true),
                'kode_kolam' => $this->input->post('kode_kolam', true),
                'tanggal' => $this->input->post('tanggal', true),
                'hari' => $this->input->post('hari', true),
                'mbw' => $this->input->post('mbw', true),
                'size' => $this->input->post('size', true),
                'biomasa' => $this->input->post('biomasa', true),
                'populasi' => $this->input->post('populasi', true),
                'parsial' => $this->input->post('parsial', true),
                'sisa_p' => $this->input->post('sisa_p', true),
                'pemasukan' => $this->input->post('pemasukan', true),
                'total' => $this->input->post('total', true),
            ];
            $this->db->where('id_parsial', $parsial_id);
            $this->db->update('data_parsial', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil di edit! </div>');
            redirect('data/parsial/parsial');
        }
    }
    public function d_parsial($parsial_id)
    {
        $this->db->delete('data_parsial', ['id_parsial' => $parsial_id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data berhasil di hapus </div>');
        redirect('data/parsial/parsial');
    }



    public function sampling()
    {

        $data['title'] = 'Data Sampling';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['sampling'] = $this->db->get_where('data_sampling')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/sampling/sampling', $data);
        $this->load->view('templates/footer', $data);
    }
    public function t_sampling()
    {
        $data['title'] = 'Kelola Data Sampling';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['sampling'] = $this->db->get_where('data_sampling')->result_array();
        $data['kolam'] = $this->db->get_where('data_kolam')->result_array();

        $this->form_validation->set_rules('tanggal_s', 'Tanggal Sampling', 'required|trim');
        $this->form_validation->set_rules('kode_kolam', 'Kode Kolam', 'required|trim');
        $this->form_validation->set_rules('umur_u', 'Umur Udang', 'required|trim');
        $this->form_validation->set_rules('mbw', 'MBW', 'required|trim');
        $this->form_validation->set_rules('size', 'Size', 'required|trim');
        $this->form_validation->set_rules('adg', 'ADG', 'required|trim');
        $this->form_validation->set_rules('pakan', 'Pakan', 'required|trim');
        $this->form_validation->set_rules('estimasi', 'Estimasi', 'required|trim');
        $this->form_validation->set_rules('ket', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/sampling/t_sampling', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'tanggal_s' => $this->input->post('tanggal_s', true),
                'kode_kolam' => $this->input->post('kode_kolam', true),
                'umur_u' => $this->input->post('umur_u', true),
                'mbw' => $this->input->post('mbw', true),
                'size' => $this->input->post('size', true),
                'adg' => $this->input->post('adg', true),
                'pakan' => $this->input->post('pakan', true),
                'estimasi' => $this->input->post('estimasi', true),
                'ket' => $this->input->post('ket', true),
            ];

            $this->db->insert('data_sampling', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data berhasil di tambahkan! </div>');
            redirect('data/sampling/sampling');
        }
    }
    public function u_sampling($sampling_id)
    {
        $data['title'] = 'Ubah Data Kolam';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kolam'] = $this->db->get_where('data_kolam')->result_array();
        $data['sampling'] = $this->db->get_where('data_sampling', ['id_sampling' => $sampling_id])->row_array();

        $this->form_validation->set_rules('umur_u', 'Umur Udang', 'required|trim');
        $this->form_validation->set_rules('kode_kolam', 'Kode Kolam', 'required|trim');
        $this->form_validation->set_rules('tanggal_s', 'Tanggal Sampling', 'required|trim');
        $this->form_validation->set_rules('mbw', 'MBW', 'required|trim');
        $this->form_validation->set_rules('size', 'Size', 'required|trim');
        $this->form_validation->set_rules('adg', 'ADG', 'required|trim');
        $this->form_validation->set_rules('pakan', 'Pakan', 'required|trim');
        $this->form_validation->set_rules('estimasi', 'Estimasi', 'required|trim');
        $this->form_validation->set_rules('ket', 'Keterangan', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/sampling/uSampling', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'umur_u' => $this->input->post('umur_u', true),
                'kode_kolam' => $this->input->post('kode_kolam', true),
                'tanggal_s' => $this->input->post('tanggal_s', true),
                'mbw' => $this->input->post('mbw', true),
                'size' => $this->input->post('size', true),
                'adg' => $this->input->post('adg', true),
                'pakan' => $this->input->post('pakan', true),
                'estimasi' => $this->input->post('estimasi', true),
                'ket' => $this->input->post('ket', true),
            ];
            $this->db->where('id_sampling', $sampling_id);
            $this->db->update('data_sampling', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil di Edit! </div>');
            redirect('data/sampling/sampling');
        }
    }
    public function d_sampling($id)
    {
        $this->db->delete('data_sampling', ['id_sampling' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Data berhasil di hapus! </div>');
        redirect('data/sampling/sampling');
    }
}
