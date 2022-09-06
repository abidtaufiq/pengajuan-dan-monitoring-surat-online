<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->load->model('M_Penduduk');
    }

    public function index()
    {

        $judul = [
            'title' => 'Penduduk',
            'sub_title' => ''
        ];

        $data['data'] = $this->db->get('penduduk')->result_array();
        $this->load->view('templates/header', $judul);
        $this->load->view('penduduk/index', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {

        $data = $this->db->get_where('penduduk', ['nik' => $id])->row_array();

        $this->db->where(['nik' => $id]);
        $this->db->delete('penduduk');
        $this->session->set_flashdata('success', 'Berhasil Dihapus!');
        redirect(base_url('penduduk'));
    }

    public function tambah()
    {

        $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim');
        $this->form_validation->set_rules('tmpt_lhr', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lhr', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('rt', 'RT', 'required|trim');
        $this->form_validation->set_rules('rw', 'RW', 'required|trim');


        if ($this->form_validation->run() == FALSE) {
            $judul = [
                'title' => 'Penduduk',
                'sub_title' => 'Tambah Penduduk '
            ];
            $this->load->view('templates/header', $judul);
            $this->load->view('penduduk/tambah');
            $this->load->view('templates/footer');
        } else {
            $nik =  $this->input->post("nik", TRUE);
            $nama =  $this->input->post("nama", TRUE);
            $tmpt_lhr =  $this->input->post("tmpt_lhr", TRUE);
            $tgl_lhr =  $this->input->post("tgl_lhr", TRUE);
            $alamat =  $this->input->post("alamat", TRUE);
            $no_hp =  $this->input->post("no_hp", TRUE);
            $pekerjaan =  $this->input->post("pekerjaan", TRUE);
            $rw =  $this->input->post("rw", TRUE);
            $rt =  $this->input->post("rt", TRUE);

            $save = [
                'nik' => $nik,
                'nama' => $nama,
                'tmpt_lhr' => $tmpt_lhr,
                'tgl_lhr' => date('Y-m-d', strtotime($tgl_lhr)),
                'alamat' => $alamat,
                'no_hp' => $no_hp,
                'pekerjaan' => $pekerjaan,
                'rw' => $rw,
                'rt' => $rt

            ];

            $this->db->insert('penduduk', $save);
            $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
            redirect(base_url("penduduk"));
            
        }
    }

    public function edit($id)
    {
        
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim');
        $this->form_validation->set_rules('tmpt_lhr', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lhr', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('rt', 'RT', 'required|trim');
        $this->form_validation->set_rules('rw', 'RW', 'required|trim');


        if ($this->form_validation->run() == FALSE) {
            $judul = [
                'title' => 'Penduduk',
                'sub_title' => 'Edit Penduduk'
            ];

            $data['penduduk'] = $this->db->get_where('penduduk', ['nik' => $id])->row_array();
            $this->load->view('templates/header', $judul);
            $this->load->view('penduduk/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $nik =  $this->input->post("nik", TRUE);
            $nama =  $this->input->post("nama", TRUE);
            $tmpt_lhr =  $this->input->post("tmpt_lhr", TRUE);
            $tgl_lhr =  $this->input->post("tgl_lhr", TRUE);
            $alamat =  $this->input->post("alamat", TRUE);
            $no_hp =  $this->input->post("no_hp", TRUE);
            $pekerjaan =  $this->input->post("pekerjaan", TRUE);
            $rw =  $this->input->post("rw", TRUE);
            $rt =  $this->input->post("rt", TRUE);

            $update = [
                'nik' => $nik,
                'nama' => $nama,
                'tmpt_lhr' => $tmpt_lhr,
                'tgl_lhr' => date('Y-m-d', strtotime($tgl_lhr)),
                'alamat' => $alamat,
                'no_hp' => $no_hp,
                'pekerjaan' => $pekerjaan,
                'rw' => $rw,
                'rt' => $rt
            ];

            $this->db->where('nik', $id);
            $this->db->update('penduduk', $update);

            $this->session->set_flashdata('success', 'Berhasil Diupdate!');
            redirect(base_url("penduduk"));
        }
    }

    function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->M_Penduduk->search_nik($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'  => $row->nik,
                        'nama' => $row->nama,
                        'no_hp' => $row->no_hp,
                 );
                    echo json_encode($arr_result);
            }
        }
    }

}
