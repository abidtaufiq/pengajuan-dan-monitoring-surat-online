<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->load->model('dashboard_model', 'dashboard');
    // }

    public function index()
    {

        $judul = [
            'title' => 'Management User',
            'sub_title' => ''
        ];

        $data['data'] = $this->db->get('user')->result_array();
        $this->load->view('templates/header', $judul);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $this->db->where(['id_user' => $id]);
        $this->db->delete('user');
        $this->session->set_flashdata('success', 'Berhasil Dihapus!');
        redirect(base_url('user'));
    }

    public function tambah()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[8]|trim|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|min_length[8]|matches[password]');
        $this->form_validation->set_rules('level', 'Hak Akses', 'required');
        // $this->form_validation->set_rules('file_surat', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $judul = [
                'title' => 'Management User',
                'sub_title' => 'Surat Masuk'
            ];
            $this->load->view('templates/header', $judul);
            $this->load->view('user/tambah');
            $this->load->view('templates/footer');
        } else {
            $username =  $this->input->post("username", TRUE);
            $password =  $this->input->post("password", TRUE);
            $level =  $this->input->post("level", TRUE);

            $save = [
                'username' => $username,
                'password' => $password,
                'level' => $level,

            ];

            $this->db->insert('user', $save);

            $this->session->set_flashdata('success', 'User Berhasil Ditambah!');
            redirect(base_url('user'));
        }
    }

    public function edit($id)
    {

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[8]|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|min_length[8]|matches[password]');
        $this->form_validation->set_rules('level', 'Hak Akses', 'required');
        // $this->form_validation->set_rules('file_surat', 'Keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $judul = [
                'title' => 'Management User',
                'sub_title' => 'Surat Masuk'
            ];
            $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();


            $this->load->view('templates/header', $judul);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $username =  $this->input->post("username", TRUE);
            $password =  $this->input->post("password", TRUE);
            $level =  $this->input->post("level", TRUE);

            $update = [
                'username' => $username,
                'password' => $password,
                'level' => $level,

            ];


            $this->db->where('id_user', $id);
            $this->db->update('user', $update);

            $this->session->set_flashdata('success', 'User Berhasil Update!');
            redirect(base_url('user'));
        }
    }
}
