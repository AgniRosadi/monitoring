<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['parsialnya'] = $this->db->get_where('data_parsial')->row_array();
        $data['sampling'] = $this->db->get_where('data_sampling')->row_array();
        $data['kolamnya'] = $this->db->get_where('data_kolam')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);   
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    public function getData()
    {
        $this->load->model('admin_model');
        $data = $this->admin_model->getAdmin();
        echo json_encode($data);
    }
    // public function role()
    // {
    //     $data['title'] = 'Role';
    //     $data['user'] = $this->db->get_where('user', ['email' =>
    //     $this->session->userdata('email')])->row_array();

    //     $data['role'] = $this->db->get_where('user_role')->result_array();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('admin/role', $data);
    //     $this->load->view('templates/footer');
    // }

    // public function roleAccess($role_id)
    // {
    //     $data['title'] = 'Role Access';
    //     $data['user'] = $this->db->get_where('user', ['email' =>
    //     $this->session->userdata('email')])->row_array();

    //     $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])
    //         ->row_array();

    //     $this->db->where('id !=', 1);

    //     $data['menu'] = $this->db->get('user_menu')->result_array();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('admin/role-access', $data);
    //     $this->load->view('templates/footer');
    // }

    // public function changeaccess()
    // {
    //     $menu_id = $this->input->post('menuId');
    //     $role_id = $this->input->post('roleId');


    //     $data = [
    //         'role_id' => $role_id,
    //         'menu_id' => $menu_id
    //     ];

    //     $result = $this->db->get_where('user_access_menu', $data);

    //     if ($result->num_rows() < 1) {
    //         $this->db->insert('user_access_menu', $data);
    //     } else {
    //         $this->db->delete('user_access_menu', $data);
    //     }

    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //     Access Changed! </div>');
    // }

    public function M_user()
    {
        $data['title'] = 'Manajement User';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();


        $data['m_user'] = $this->db->get_where('user')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/m_user', $data);
        $this->load->view('templates/footer');
    }

    // public function load_dataKolam()
    // {
    //     $data['dataAir'] = $this->db->query("SELECT suhu, salinitas, ph_pagi, ph_sore FROM data_air")->result_array();
    //     return ($data);
    // }

    public function kolam_aja()
    {
        $kode_kolam = $this->input->post('kode_kolam');

        $day = date('d');
        $month = date('m');
        $year = date('Y');

        $tanggal = "$year-$month-$day";
        $tgl = "$day/$month/$year";


        //pr
        $query = $this->db->query("SELECT * from data_air where kode_kolam = '$kode_kolam' AND tanggal = '$tanggal'")->row_array();
        $output = "";
        if ($query) {

            $suhu = $query['suhu'];
            $salinitas = $query['salinitas'];
            $ph_pagi = $query['ph_pagi'];
            $ph_sore = $query['ph_sore'];

            $suhu1 = $query['suhu'];

            if ($salinitas >= 15 && $salinitas <= 25) {

                $bade = 'text-success';
                $fa = 'fa fw fa-caret-up';
            } else if ($salinitas > 25) {
                $bade = 'text-warning';
                $fa = 'fa fw fa-caret-left';
            } else {
                $bade = 'text-danger';
                $fa = 'fa fw fa-caret-down';
            }

            if ($ph_pagi >= 7.5 && $ph_pagi <= 8) {

                $bade1 = 'text-success';
                $fa1 = 'fa fw fa-caret-up';
            } else if ($ph_pagi > 8) {
                $bade1 = 'text-warning';
                $fa1 = 'fa fw fa-caret-left';
            } else {
                $bade1 = 'text-danger';
                $fa1 = 'fa fw fa-caret-down';
            }

            if ($ph_sore >= 8 && $ph_pagi <= 8.4) {

                $bade2 = 'text-success';
                $fa2 = 'fa fw fa-caret-up';
            } else if ($ph_sore > 8.4) {
                $bade2 = 'text-warning';
                $fa2 = 'fa fw fa-caret-left';
            } else {
                $bade2 = 'text-danger';
                $fa2 = 'fa fw fa-caret-down';
            }

            $output .= '
          <div class="col-md-6 mb-4">
                                    <image src="' . base_url() . 'assets/img/1.png">Suhu <i class="fa fw fa-caret-up text-success"></i></image>
                                     <p>' . $suhu . '</p>
                                </div>
                                <div class="col-md-6">
                                    <image src="' . base_url() . 'assets/img/2.png">Salinitas  <i class="fa fw ' . $fa . ' ' . $bade . '"></i></image>
                                    <p>' . $salinitas . '</p>
                                </div>
                                <div class="col-md-6">
                                    <image src="' . base_url() . 'assets/img/3.png">Ph Pagi  <i class="fa fw ' . $fa1 . ' ' . $bade1 . '"></i></image>
                                     <p>' . $ph_pagi . '</p>
                                </div>
                                <div class="col-md-6">
                                    <image src="' . base_url() . 'assets/img/4.png">Ph Sore  <i class="fa fw ' . $fa2 . ' ' . $bade2 . '"></i></image>
                                     <p>' . $ph_sore . '</p>
                                </div>';
        } else {

            $output .= '<p>Data Kolam ' . $kode_kolam . ' pada ' . $tgl . ' belum diinputkan</p>';
        }

        echo $output;
    }

    public function registration()
    {



        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'WPU User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('admin/m_user');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat! akun anda telah aktif. Silahkan tunggu aktivasi dari Owner </div>');
            redirect('admin/m_user');
        }
    }
}
