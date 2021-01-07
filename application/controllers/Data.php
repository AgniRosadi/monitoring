<?php
defined('BASEPATH') or exit('No direct script access allowed');

class data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('data_model');
    }
    public function index()
    {

        $data['title'] = 'Kelola Data Air';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['airnya'] = $this->db->get_where('data_air')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function form_air()
    {
        $data['title'] = 'Form Data Air';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['airnya'] = $this->db->get_where('data_air')->result_array();
        $data['kolam'] = $this->db->get_where('data_kolam')->result_array();

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('kode_kolam', 'Kode Kolam', 'required|trim');
        $this->form_validation->set_rules('salinitas', 'Salinitas', 'required|trim');

        $this->form_validation->set_rules('ph_pagi', 'Ph Pagi', 'required|trim');
        $this->form_validation->set_rules('ph_sore', 'Ph Sore', 'required|trim');
        $this->form_validation->set_rules('kecerahan', 'Kecerahan', 'required|trim');
        $this->form_validation->set_rules('cuaca', 'Cuaca', 'required|trim');
        $this->form_validation->set_rules('suhu', 'Suhu', 'required|trim');
        $this->form_validation->set_rules('tg_air', 'Tinggi Air', 'required|trim');



        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/form_air', $data);
            $this->load->view('templates/footer');
        } else {

            $kd =  $this->input->post('kode_kolam');
            $tg = $this->input->post('tanggal');

            $data = [
                'tanggal' => $this->input->post('tanggal', true),
                'kode_kolam' => $this->input->post('kode_kolam', true),
                'salinitas' => $this->input->post('salinitas', true),
                'ph_pagi' => $this->input->post('ph_pagi', true),
                'ph_sore' => $this->input->post('ph_sore', true),
                'kecerahan' => $this->input->post('kecerahan', true),
                'cuaca' => $this->input->post('cuaca', true),
                'suhu' => $this->input->post('suhu', true),
                'tg_air' => $this->input->post('tg_air', true),
            ];

            $query1 = $this->db->query("SELECT * FROM data_air where tanggal = '$tg' and kode_kolam ='$kd' ")->num_rows();

            if ($query1 >= 1) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Data sudah ada! </div>');
                redirect('data/form_air');
            } else {
                $this->db->insert('data_air', $data);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data berhasil di tambahkan! </div>');
                redirect('data/index');
            }
        }
    }

    public function form_editA($air_id)
    {
        $data['title'] = 'Form Data Air';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['airnya'] = $this->db->get_where('data_air', ['id_air' => $air_id])->row_array();
        $data['kolam'] = $this->db->get_where('data_kolam')->result_array();

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        $this->form_validation->set_rules('kode_kolam', 'Kode Kolam', 'required|trim');
        $this->form_validation->set_rules('salinitas', 'Salinitas', 'required|trim');

        $this->form_validation->set_rules('ph_pagi', 'Ph Pagi', 'required|trim');
        $this->form_validation->set_rules('ph_sore', 'Ph Sore', 'required|trim');
        $this->form_validation->set_rules('kecerahan', 'Kecerahan', 'required|trim');
        $this->form_validation->set_rules('cuaca', 'Cuaca', 'required|trim');
        $this->form_validation->set_rules('suhu', 'Suhu', 'required|trim');
        $this->form_validation->set_rules('tg_air', 'Tinggi Air', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/form_edit', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'tanggal' => $this->input->post('tanggal', true),
                'kode_kolam' => $this->input->post('kode_kolam', true),
                'salinitas' => $this->input->post('salinitas', true),
                'ph_pagi' => $this->input->post('ph_pagi', true),
                'ph_sore' => $this->input->post('ph_sore', true),
                'kecerahan' => $this->input->post('kecerahan', true),
                'cuaca' => $this->input->post('cuaca', true),
                'suhu' => $this->input->post('suhu', true),
                'tg_air' => $this->input->post('tg_air', true),
            ];
            $this->db->where('id_air', $air_id);
            $this->db->update('data_air', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil di tambahkan! </div>');
            redirect('data/index');
        }
    }
    public function form_del($id)
    {
        $this->db->delete('data_air', ['id_air' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data berhasil di tambahkan! </div>');
        redirect('data/index');
    }

    //Data Kolam
    public function kolam()
    {
        $data['title'] = 'Kelola Data Kolam';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kolamnya'] = $this->db->get_where('data_kolam')->result_array();

        $this->form_validation->set_rules('siklus', 'Siklus', 'required|trim');
        $this->form_validation->set_rules('kode_kolam', 'Kode Kolam', 'required|trim');
        $this->form_validation->set_rules('luas_kolam', 'Luas Kolam', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal Tebar', 'required|trim');
        $this->form_validation->set_rules('asal_b', 'Asal Benur', 'required|trim');
        $this->form_validation->set_rules('jumlah_tebar', 'Jumlah Tebar', 'required|trim');
        $this->form_validation->set_rules('tipe_p', 'Tipe Pelastik', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/kolam/kolam', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'siklus' => $this->input->post('siklus', true),
                'kode_kolam' => $this->input->post('kode_kolam', true),
                'luas_kolam' => $this->input->post('luas_kolam', true),
                'tanggal' => $this->input->post('tanggal', true),
                'asal_b' => $this->input->post('asal_b', true),
                'jumlah_tebar' => $this->input->post('jumlah_tebar', true),
                'tipe_p' => $this->input->post('tipe_p', true)
            ];
            $this->db->insert('data_kolam', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data berhasil di tambahkan! </div>');
            redirect('data/kolam/kolam', $data);
        }
    }

    public function edit_kolam($kolam_id)
    {
        $data['title'] = 'Form Data Kolam';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kolamnya'] = $this->db->get_where('data_kolam', ['id_kolam' => $kolam_id])->row_array();
        $this->form_validation->set_rules('siklus', 'Siklus', 'required|trim');
        $this->form_validation->set_rules('kode_kolam', 'Kode Kolam', 'required|trim');
        $this->form_validation->set_rules('luas_kolam', 'Luas Kolam', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal Tebar', 'required|trim');
        $this->form_validation->set_rules('asal_b', 'Asal Benur', 'required|trim');
        $this->form_validation->set_rules('jumlah_tebar', 'Jumlah Tebar', 'required|trim');
        $this->form_validation->set_rules('tipe_p', 'Tipe Pelastik', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/kolam/update', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'siklus' => $this->input->post('siklus', true),
                'kode_kolam' => $this->input->post('kode_kolam', true),
                'luas_kolam' => $this->input->post('luas_kolam', true),
                'tanggal' => $this->input->post('tanggal', true),
                'asal_b' => $this->input->post('asal_b', true),
                'jumlah_tebar' => $this->input->post('jumlah_tebar', true),
                'tipe_p' => $this->input->post('tipe_p', true),
            ];
            $this->db->where('id_kolam', $kolam_id);
            $this->db->update('data_kolam', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data berhasil di Edit! </div>');
            redirect('data/kolam/kolam');
        }
    }

    public function delete($id)
    {
        $this->db->delete('data_kolam', ['id_kolam' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Data berhasil di hapus! </div>');
        redirect('data/kolam/kolam');
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


    public function parsial()
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

    //pakan
    public function pakan()
    {

        $data['title'] = 'Kelola Data Pakan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['pakan'] = $this->db->get_where('data_pakan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/pakan/pakan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function t_pakan()
    {
        $data['title'] = 'Kelola Data Pakan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['pakannya'] = $this->db->get_where('data_pakan')->result_array();

        $this->form_validation->set_rules('umur', 'Umur', 'required|trim');
        $this->form_validation->set_rules('pakan_p', 'Pakan Pagi', 'required|trim');
        $this->form_validation->set_rules('pakan_s', 'Pakan Siang', 'required|trim');
        $this->form_validation->set_rules('pakan_sr', 'Pakan Sore', 'required|trim');
        $this->form_validation->set_rules('pakan_m', 'Pakan Malam', 'required|trim');
        $this->form_validation->set_rules('total_pkn', 'Total Pakan', 'required|trim');
        $this->form_validation->set_rules('ket', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/pakan/t_pakan', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'umur' => $this->input->post('umur', true),
                'pakan_p' => $this->input->post('pakan_p', true),
                'pakan_s' => $this->input->post('pakan_s', true),
                'pakan_sr' => $this->input->post('pakan_sr', true),
                'pakan_m' => $this->input->post('pakan_m', true),
                'total_pkn' => $this->input->post('total_pkn', true),
                'ket' => $this->input->post('ket', true),
            ];
            $this->db->insert('data_pakan', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data berhasil di tambahkan! </div>');
            redirect('data/pakan');
        }
    }

    //profile
    public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            //cek jika ada gambar yang akan di upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">Your profile been updated!</div>'
            );
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">Wrong current password!</div>'
                );
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>'
                    );
                    redirect('user/changepassword');
                } else {
                    //password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
    public function excel()
    {
        // $data['parsial'] = $this->data_model->tampil_data('data_parsial')->result();
        // require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel.php');
        // require(APPPATH . 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();

        // Settingan awal fil excel
        $excel->getProperties()->setCreator('My Notes Code')
            ->setLastModifiedBy('My Notes Code')
            ->setTitle("Data Parsial")
            ->setSubject("Parsial")
            ->setDescription("Laporan Semua Data Parsial")
            ->setKeywords("Data Parsial");

        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN DATA PARSIAL"); // Set kolom A1 dengan tulisan "DATA PEMUDIK"
        $excel->getActiveSheet()->mergeCells('A1:n1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "TANGGAL"); // Set kolom B3 dengan tulisan "NIS"
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "KODE KOLAM"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "NO PASRIAL"); // Set kolom C3 dengan tulisan "NAMA"
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "HARI"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "MBW (GRAM)"); // Set kolom E3 dengan tulisan "ALAMAT"
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "SIZE (EK/GRAM)");
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "BIOMASA (KG)");
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "POPULASI");
        $excel->setActiveSheetIndex(0)->setCellValue('J3', "PARSIAL (%)");
        $excel->setActiveSheetIndex(0)->setCellValue('K3', "SISA POPULASI");
        $excel->setActiveSheetIndex(0)->setCellValue('L3', "PEMASUKAN");
        $excel->setActiveSheetIndex(0)->setCellValue('M3', "TOTAL");
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);

        // Panggil function view yang ada di PEMUDIKModel untuk menampilkan semua data siswanya
        $parsial = $this->data_model->tampil_data();

        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($parsial as $data) { // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->tanggal);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->kode_kolam);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->no_parsial);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->hari);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->mbw);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->size);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->biomasa);
            $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->populasi);
            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->parsial);
            $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->sisa_p);
            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data->pemasukan);
            $excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $data->total);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('L' . $numrow)->applyFromArray($style_row);
            $excel->getActiveSheet()->getStyle('M' . $numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }

        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(30); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(30); // Set width kolom E
        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Laporan Data Parsial");
        $excel->setActiveSheetIndex(0);

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data Parsial.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }
}
