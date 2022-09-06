<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galery extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('galery_model','galery');

        $this->load->helper(array('form', 'url','Cookie', 'String'));
        $this->load->library('form_validation');
        
        if ($this->session->userdata('id_user') == FALSE) {
            redirect(base_url("auth/login"));
        }
    }

    public function profil_kelurahan()
    {
        $data['profil'] = $this->galery->profil();
        $judul = [
            'title' => 'Galery',
            'sub_title' => 'Profil Kelurahan'
        ];

        // $data['sm'] = $this->db->get('surat_masuk')->row_array();
        // var_dump($data['profil'][0]['profile']);
        // die;
        $this->load->view('templates/header', $judul);
        $this->load->view('galery/profil_kelurahan',$data);
        $this->load->view('templates/footer');
    }

    public function edit_profil()
    {
        $this->form_validation->set_rules('profil', 'Profil', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['profil'] = $this->galery->profil();
            $judul = [
                'title' => 'Galery',
                'sub_title' => 'Profil Kelurahan'
            ];

            $this->load->view('templates/header', $judul);
            $this->load->view('galery/edit_profil',$data);
            $this->load->view('templates/footer');
        }else{
            $id = $this->uri->segment(3);
            $this->galery->UpdateProfil($id);
            $this->session->set_flashdata('success', 'Berhasil Di Update!');
            redirect('galery/profil_kelurahan');
        }
    }

    public function s_kelurahan()
    {
        $data['profil'] = $this->galery->profil();
        $judul = [
            'title' => 'Galery',
            'sub_title' => 'Struktur Kelurahan'
        ];

        // $data['sm'] = $this->db->get('surat_masuk')->row_array();
        // var_dump($data);
        $this->load->view('templates/header', $judul);
        $this->load->view('galery/s_kelurahan',$data);
        $this->load->view('templates/footer');
    }

    public function edit_s_kelurahan()
    {
        $this->form_validation->set_rules('s_kelurahan', 'Struktur Kelurahan', 'trim');

        if ($this->form_validation->run() == false) {
            $data['profil'] = $this->galery->profil();
            $judul = [
                'title' => 'Galery',
                'sub_title' => 'Struktur Kelurahan'
            ];

            // $data['sm'] = $this->db->get('surat_masuk')->row_array();
            // var_dump($data);
            $this->load->view('templates/header', $judul);
            $this->load->view('galery/edit_s_kelurahan',$data);
            $this->load->view('templates/footer');
        }else{
            $id = $this->uri->segment(3);
            $upload_sk = $_FILES['s_kelurahan']['name'];
            
            $data['galery'] = $this->db->get_where('gallery', ['id' => $id])->row_array();

            if ($upload_sk) {
                $config['upload_path']          = './assets/galery/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048; // 1MB
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
    
                $this->load->library('upload');
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('s_kelurahan')) {
                    $old_sk = $data['galery']['s_kelurahan'];
                    unlink(FCPATH . 'assets/galery/' . $old_sk);

                    $s_kelurahan = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }else {
                $s_kelurahan = $this->input->post('s_kelurahan_old');
            }
            // var_dump($s_kelurahan);
            // die;
            
            $this->galery->UpdateSKelurahan($s_kelurahan,$id);
            $this->session->set_flashdata('success', 'Berhasil Di Update!');
            redirect('galery/s_kelurahan');
        }
        
    }

    public function s_lpm()
    {
        $data['profil'] = $this->galery->profil();
        $judul = [
            'title' => 'Galery',
            'sub_title' => 'Struktur LPM'
        ];

        // $data['sm'] = $this->db->get('surat_masuk')->row_array();
        // var_dump($data);
        $this->load->view('templates/header', $judul);
        $this->load->view('galery/s_lpm',$data);
        $this->load->view('templates/footer');
    }

    public function edit_s_lpm()
    {
        $this->form_validation->set_rules('s_lpm', 'Struktur LPM', 'trim');

        if ($this->form_validation->run() == false) {
            $data['profil'] = $this->galery->profil();
            $judul = [
                'title' => 'Galery',
                'sub_title' => 'Struktur LPM'
            ];

            // $data['sm'] = $this->db->get('surat_masuk')->row_array();
            // var_dump($data);
            $this->load->view('templates/header', $judul);
            $this->load->view('galery/edit_s_lpm',$data);
            $this->load->view('templates/footer');
        }else{
            $id = $this->uri->segment(3);
            $upload_lpm = $_FILES['s_lpm']['name'];
            
            $data['galery'] = $this->db->get_where('gallery', ['id' => $id])->row_array();

            if ($upload_lpm) {
                $config['upload_path']          = './assets/galery/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048; // 1MB
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
    
                $this->load->library('upload');
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('s_lpm')) {
                    $old_lpm = $data['galery']['s_lpm'];
                    unlink(FCPATH . 'assets/galery/' . $old_lpm);

                    $s_lpm = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }else {
                $s_lpm = $this->input->post('s_lpm_old');
            }
            // var_dump($s_lpm);
            // die;
            
            $this->galery->UpdateSLpm($s_lpm,$id);
            $this->session->set_flashdata('success', 'Berhasil Di Update!');
            redirect('galery/s_lpm');
        }
        
    }

    public function s_linmas()
    {
        $data['profil'] = $this->galery->profil();
        $judul = [
            'title' => 'Galery',
            'sub_title' => 'Struktur Linmas'
        ];

        // $data['sm'] = $this->db->get('surat_masuk')->row_array();
        // var_dump($data);
        $this->load->view('templates/header', $judul);
        $this->load->view('galery/s_linmas',$data);
        $this->load->view('templates/footer');
    }

    public function edit_s_linmas()
    {
        $this->form_validation->set_rules('s_linmas', 'Struktur LINMAS', 'trim');

        if ($this->form_validation->run() == false) {
            $data['profil'] = $this->galery->profil();
            $judul = [
                'title' => 'Galery',
                'sub_title' => 'Struktur Linmas'
            ];

            // $data['sm'] = $this->db->get('surat_masuk')->row_array();
            // var_dump($data);
            $this->load->view('templates/header', $judul);
            $this->load->view('galery/edit_s_linmas',$data);
            $this->load->view('templates/footer');
        }else{
            $id = $this->uri->segment(3);
            $upload_linmas = $_FILES['s_linmas']['name'];
            
            $data['galery'] = $this->db->get_where('gallery', ['id' => $id])->row_array();

            if ($upload_linmas) {
                $config['upload_path']          = './assets/galery/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048; // 1MB
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
    
                $this->load->library('upload');
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('s_linmas')) {
                    $old_linmas = $data['galery']['s_linmas'];
                    unlink(FCPATH . 'assets/galery/' . $old_linmas);

                    $s_linmas = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }else {
                $s_linmas = $this->input->post('s_linmas_old');
            }
            // var_dump($s_linmas);
            // die;
            
            $this->galery->UpdateSlinmas($s_linmas,$id);
            $this->session->set_flashdata('success', 'Berhasil Di Update!');
            redirect('galery/s_linmas');
        }
        
    }

    public function s_pemuda()
    {
        $data['profil'] = $this->galery->profil();
        $judul = [
            'title' => 'Galery',
            'sub_title' => 'Struktur Pemuda Kelurahan'
        ];

        // $data['sm'] = $this->db->get('surat_masuk')->row_array();
        // var_dump($data);
        $this->load->view('templates/header', $judul);
        $this->load->view('galery/s_pemuda',$data);
        $this->load->view('templates/footer');
    }

    public function edit_s_pemuda()
    {
        $this->form_validation->set_rules('s_pemuda', 'Struktur Pemuda Kelurahan', 'trim');

        if ($this->form_validation->run() == false) {
            $data['profil'] = $this->galery->profil();
            $judul = [
                'title' => 'Galery',
                'sub_title' => 'Struktur Pemuda Kelurahan'
            ];

            // $data['sm'] = $this->db->get('surat_masuk')->row_array();
            // var_dump($data);
            $this->load->view('templates/header', $judul);
            $this->load->view('galery/edit_s_pemuda',$data);
            $this->load->view('templates/footer');
        }else{
            $id = $this->uri->segment(3);
            $upload_pemuda = $_FILES['s_pemuda']['name'];
            
            $data['galery'] = $this->db->get_where('gallery', ['id' => $id])->row_array();

            if ($upload_pemuda) {
                $config['upload_path']          = './assets/galery/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048; // 1MB
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
    
                $this->load->library('upload');
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('s_pemuda')) {
                    $old_pemuda = $data['galery']['s_pemuda'];
                    unlink(FCPATH . 'assets/galery/' . $old_pemuda);

                    $s_pemuda = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }else {
                $s_pemuda = $this->input->post('s_pemuda_old');
            }
            // var_dump($s_pemuda);
            // die;
            
            $this->galery->UpdateSPemuda($s_pemuda,$id);
            $this->session->set_flashdata('success', 'Berhasil Di Update!');
            redirect('galery/s_pemuda');
        }
        
    }

    public function rt_rw()
    {
        $data['profil'] = $this->galery->profil();
        $judul = [
            'title' => 'Galery',
            'sub_title' => 'Ketua RT & RW'
        ];

        // $data['sm'] = $this->db->get('surat_masuk')->row_array();
        // var_dump($data);
        $this->load->view('templates/header', $judul);
        $this->load->view('galery/rt_rw',$data);
        $this->load->view('templates/footer');
    }
    public function edit_k_rtrw()
    {
        $this->form_validation->set_rules('k_rtrw', 'Ketua RT & RW', 'trim');

        if ($this->form_validation->run() == false) {
            $data['profil'] = $this->galery->profil();
            $judul = [
                'title' => 'Galery',
                'sub_title' => 'Ketua RT & RW'
            ];

            // $data['sm'] = $this->db->get('surat_masuk')->row_array();
            // var_dump($data);
            $this->load->view('templates/header', $judul);
            $this->load->view('galery/edit_k_rtrw',$data);
            $this->load->view('templates/footer');
        }else{
            $id = $this->uri->segment(3);
            $upload_rtrw = $_FILES['k_rtrw']['name'];
            
            $data['galery'] = $this->db->get_where('gallery', ['id' => $id])->row_array();

            if ($upload_rtrw) {
                $config['upload_path']          = './assets/galery/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048; // 1MB
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;
    
                $this->load->library('upload');
                $this->upload->initialize($config);
    
                if ($this->upload->do_upload('k_rtrw')) {
                    $old_rtrw = $data['galery']['k_rtrw'];
                    unlink(FCPATH . 'assets/galery/' . $old_rtrw);

                    $k_rtrw = $this->upload->data('file_name');
                } else {
                    echo $this->upload->display_errors();
                }
            }else {
                $k_rtrw = $this->input->post('k_rtrw_old');
            }
            // var_dump($k_rtrw);
            // die;
            
            $this->galery->UpdateSrtrw($k_rtrw,$id);
            $this->session->set_flashdata('success', 'Berhasil Di Update!');
            redirect('galery/rt_rw');
        }
        
    }

}
