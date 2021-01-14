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

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/form_air', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_air()
    {


        $kd =  $this->input->post('kode_kolam');
        $tg = $this->input->post('tanggal');
        // $ai = $this->db->query("SELECT * from data_kolam d join data_air p on p.id_kolam = d.id_kolam ")->num_rows(); 
        // $data = $ai['id_kolam'];

        $data['tanggal'] = $this->input->post('tanggal');
        $data['kode_kolam'] = $this->input->post('kode_kolam');
        $data['salinitas'] = $this->input->post('salinitas');
        $data['ph_pagi'] = $this->input->post('ph_pagi');
        $data['ph_sore'] = $this->input->post('ph_sore');
        $data['kecerahan'] = $this->input->post('kecerahan');
        $data['cuaca'] = $this->input->post('cuaca');
        $data['suhu'] = $this->input->post('suhu');
        $data['tg_air'] = $this->input->post('tg_air');



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
    public function m_kolam()
    {
        $data['title'] = 'Kelola Kolam';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['kolamtu'] = $this->db->get_where('kolam')->result();

        $this->form_validation->set_rules('kode_kolam', 'Kode Kolam', 'required|trim');
        $this->form_validation->set_rules('luas_kolam', 'Luas Kolam', 'required|trim');
        $this->form_validation->set_rules('tipe_p', 'Tipe Pelastik', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/kolam/m_kolam');
            $this->load->view('templates/footer', $data);
        } else {
            $kode_kolam =  $this->input->post('kode_kolam');
            $data = [
                'kode_kolam' => $this->input->post('kode_kolam', true),
                'luas_kolam' => $this->input->post('luas_kolam', true),
                'tipe_p' => $this->input->post('tipe_p', true),
                'status_kolam' => 'tidak dipakai'

            ];
            $query1 =   $this->db->query("SELECT * from kolam where kode_kolam = '$kode_kolam'")->num_rows();
            if ($query1 > 0) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Data kolam sudah ada! </div>');
                redirect('data/kolam/m_kolam', $data);
            } else {
                $this->db->insert('kolam',  $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          Data berhasil di tambahkan! </div>');
                redirect('data/kolam/m_kolam', $data);
            }
        }
    }
    public function kolam()
    {
        $data['title'] = 'Kelola Data Kolam';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['kolamnya'] = $this->db->get_where('data_kolam')->result();
        $data['kolam'] = $this->db->get_where('kolam')->result();

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
            $k = $this->input->post('kode_kolam');

            $data =
                [
                    'kode_kolam' => $this->input->post('kode_kolam'),
                    'luas_kolam' => $this->input->post('luas_kolam'),
                    'tanggal' => $this->input->post('tanggal'),
                    'asal_b' => $this->input->post('asal_b'),
                    'jumlah_tebar' => $this->input->post('jumlah_tebar'),
                    'tipe_p' => $this->input->post('tipe_p')
                ];

                $query1 =  $this->db->insert('data_kolam',  $data);
            if ($query1) {
                $query2 = $this->db->query("UPDATE kolam set status_kolam = 'dipakai' where id_master_kolam = $k");
                if($query2){
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data berhasil di tambahkan! </div>');
                redirect('data/kolam/kolam', $data);
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                 Data kolam sudah ada! </div>');
                redirect('data/kolam/m_kolam', $data);
            }
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

        $data['kolam'] = $this->db->get_where('kolam')->result_array();
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


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/parsial/t_parsial', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_parsial()
    {

        $id_kolam = $this->input->post('kode_kolam');
        $query1 = $this->db->query("SELECT id_siklus from data_parsial where id_master_kolam = $id_kolam order by id_siklus desc limit 1");
        $query7 =  $this->db->query("SELECT id_siklus from data_parsial where id_master_kolam = $id_kolam order by id_siklus desc limit 1")->row_array();
        if ($query1->num_rows() == 1) {

            $urut = $query7['id_siklus'];
        } else {

            $urut = 1;
        }
        $query2 = $this->db->query("SELECT * FROM data_parsial d join parsial p on p.id_parsial = d.id_parsial join kolam k on k.id_master_kolam = d.id_master_kolam where d.id_master_kolam = $id_kolam and d.id_siklus = $urut")->num_rows();

        if ($query2 <= 5) {
             $query2 = $this->db->query("UPDATE kolam set status_kolam = 'tidak dipakai' where id_master_kolam = $id_kolam");
            $id_siklus = $urut;
        }
         else {
            $id_siklus = $urut + 1;
        }

        $data['id_master_kolam'] = $this->input->post('kode_kolam');
        $data['id_siklus'] = $id_siklus;
        $data['id_parsial'] = $this->input->post('no_parsial');
        $data['tanggal'] = $this->input->post('tanggal');
        $data['hari'] = $this->input->post('hari');
        $data['mbw'] = $this->input->post('mbw');
        $data['size'] = $this->input->post('size');
        $data['biomasa'] = $this->input->post('biomasa');
        $data['populasi'] = $this->input->post('populasi');
        $data['parsial'] = $this->input->post('parsial');
        $data['pemasukan'] = $this->input->post('pemasukan');

        $query4 = $this->db->insert('data_parsial', $data);
        if ($query4) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data berhasil di tambahkan! </div>');
            redirect('data/parsial');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-error" role="alert">
        Data gagal ditambahkan! </div>');
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

    //parsial
    public function getParsial()
    {
        $id_kolam = $this->input->post('kode_kolam');

        $query1 = $this->db->query("SELECT * FROM data_parsial d join kolam k on d.id_master_kolam = k.id_master_kolam where d.id_master_kolam = $id_kolam order by d.id_parsial desc limit 1")->row_array();

        if ($query1) {
            $id_parsial = $query1['id_parsial'];

            if ($id_parsial > 5) {
                $parsial_selanjutnya = 1;
            } else {
                $parsial_selanjutnya = $id_parsial + 1;
            }
        } else {
            $parsial_selanjutnya = 1;
        }
        echo $this->data_model->get_parsial($parsial_selanjutnya);
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


    // public function kolam_aja()
    // {
    //     $kode_kolam = $this->input->post('kode_kolam');

    //     $day = date('d');
    //     $month = date('m');
    //     $year = date('Y');

    //     $tanggal = "$year-$month-$day";
    //     $tgl = "$day/$month/$year";


    //     //pr
    //     $query = $this->db->query("SELECT * from data_air where kode_kolam = '$kode_kolam' AND tanggal = '$tanggal'")->row_array();
    //     $output = "";
    //     if ($query) {

    //         $suhu = $query['suhu'];
    //         $salinitas = $query['salinitas'];
    //         $ph_pagi = $query['ph_pagi'];
    //         $ph_sore = $query['ph_sore'];

    //         $suhu1 = $query['suhu'];

    //         if ($salinitas >= 15 && $salinitas <= 25) {

    //             $bade = 'text-success';
    //             $fa = 'fa fw fa-caret-up';
    //         } else if ($salinitas > 25) {
    //             $bade = 'text-warning';
    //             $fa = 'fa fw fa-caret-left';
    //         } else {
    //             $bade = 'text-danger';
    //             $fa = 'fa fw fa-caret-down';
    //         }

    //         if ($ph_pagi >= 7.5 && $ph_pagi <= 8) {

    //             $bade1 = 'text-success';
    //             $fa1 = 'fa fw fa-caret-up';
    //         } else if ($ph_pagi > 8) {
    //             $bade1 = 'text-warning';
    //             $fa1 = 'fa fw fa-caret-left';
    //         } else {
    //             $bade1 = 'text-danger';
    //             $fa1 = 'fa fw fa-caret-down';
    //         }

    //         if ($ph_sore >= 8 && $ph_pagi <= 8.4) {

    //             $bade2 = 'text-success';
    //             $fa2 = 'fa fw fa-caret-up';
    //         } else if ($ph_sore > 8.4) {
    //             $bade2 = 'text-warning';
    //             $fa2 = 'fa fw fa-caret-left';
    //         } else {
    //             $bade2 = 'text-danger';
    //             $fa2 = 'fa fw fa-caret-down';
    //         }

    //         $output .= '
    //       <div class="col-md-6 mb-4">
    //                                 <image src="' . base_url() . 'assets/img/1.png">Suhu <i class="fa fw fa-caret-up text-success"></i></image>
    //                                  <p>' . $suhu . '</p>
    //                             </div>
    //                             <div class="col-md-6">
    //                                 <image src="' . base_url() . 'assets/img/2.png">Salinitas  <i class="fa fw ' . $fa . ' ' . $bade . '"></i></image>
    //                                 <p>' . $salinitas . '</p>
    //                             </div>
    //                             <div class="col-md-6">
    //                                 <image src="' . base_url() . 'assets/img/3.png">Ph Pagi  <i class="fa fw ' . $fa1 . ' ' . $bade1 . '"></i></image>
    //                                  <p>' . $ph_pagi . '</p>
    //                             </div>
    //                             <div class="col-md-6">
    //                                 <image src="' . base_url() . 'assets/img/4.png">Ph Sore  <i class="fa fw ' . $fa2 . ' ' . $bade2 . '"></i></image>
    //                                  <p>' . $ph_sore . '</p>
    //                             </div>';
    //     } else {

    //         $output .= '<p>Data Kolam ' . $kode_kolam . ' pada ' . $tgl . ' belum diinputkan</p>';
    //     }

    //     echo $output;
    // }
}
