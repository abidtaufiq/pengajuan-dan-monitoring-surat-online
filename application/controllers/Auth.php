<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model', 'auth');
        if ($this->session->userdata('id_user') == TRUE) {
            redirect(base_url("dashboard"));
        }
    }

    public function login()
    {

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $user =  $this->input->post("username", TRUE);
            $pass =  $this->input->post("password", TRUE);

            $where = [
                'username' => $user,
                'password' => $pass
            ];

            $cek = $this->auth->cek_pengguna($where)->num_rows();

            if ($cek <= 0) {
                $this->session->set_flashdata('gagal', 'Username dan Password Anda Salah');
                redirect(base_url("auth/login"));
            } else {
                $cek_akun = $this->auth->cek_akun($where)->row_array();
                $id_user = $cek_akun["id_user"];
                $level = $cek_akun["level"];

                $data_session = array(
                    'id_user' => $id_user,
                    'level' => $level
                );

                $this->session->set_userdata($data_session);

                redirect(base_url("dashboard"));
            }
        }
    }

    // public function logout()
    // {
    //     $this->session->sess_destroy();
    //     redirect(base_url('auth/login'));
    // }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'upttikur@gmail.com',
            'smtp_pass' => 'upttikur2019',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"

        ];

        // $this->email->initialize($config);



        $this->load->library('email', $config);

        $this->email->from('upttikur@gmail.com', 'Unit Pelaksanaan Teknis Teknologi Informasi dan Komunikasi Universitas Riau');
        $this->email->to($this->input->post('email'));


        if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik link ini untuk reset password anda: <a href="' . base_url() . 'auth/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function forgotPassword()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("auth/forgotPassword");
        } else {
            $email = $this->input->post('email');
            $pengguna = $this->db->get_where('pengguna', ['email' => $email])->row_array();

            if ($pengguna) {
                $token = base64_encode(random_bytes(32));

                $pengguna_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('pengguna_token', $pengguna_token);

                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan cek email anda untuk reset password!</div>');

                redirect(base_url("auth/forgotPassword"));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar!</div>');
                redirect(base_url("auth/forgotPassword"));
            }
        }
    }


    public function resetPassword()
    {
        // $this->load->view("auth/changePassword");
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('pengguna', ['email' => $email])->row_array();


        if ($user) {

            $pengguna_token = $this->db->get_where('pengguna_token', ['token' => $token])->row_array();

            if ($pengguna_token) {

                $this->session->set_userdata('reset_email', $email);

                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal! Token Salah</div>');
                redirect(base_url("auth/forgotPassword"));
            }
        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset Password Gagal! Email Salah</div>');
            redirect(base_url("auth/forgotPassword"));
        }
    }


    public function changePassword()
    {

        if (!$this->session->userdata('reset_email')) {
            redirect(base_url('auth'));
        }

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]');

        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|min_length[5]|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("auth/changePassword");
        } else {

            $password = $this->input->post('password1');
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', md5($password));
            $this->db->where('email', $email);
            $this->db->update('pengguna');

            $this->db->where('email', $email);
            $this->db->delete('pengguna_token');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah! Silahkan login</div>');
            redirect(base_url("auth/login"));
        }
    }
}
