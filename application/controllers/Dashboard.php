<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model', 'dashboard');
        if ($this->session->userdata('id_user') == FALSE) {
            redirect(base_url("auth/login"));
        }
    }

    public function index()
    {
        $judul = [
            'title' => 'Dashboard',
            'sub_title' => ''
        ];

        // $data['sm'] = $this->db->get('surat_masuk')->row_array();
        $januari = $this->db->query('SELECT * FROM surat_masuk WHERE month(tanggal_surat_masuk)="1"')->num_rows();
        $februari = $this->db->query('SELECT * FROM surat_masuk WHERE month(tanggal_surat_masuk)="2"')->num_rows();
        $maret = $this->db->query('SELECT * FROM surat_masuk WHERE month(tanggal_surat_masuk)="3"')->num_rows();
        $april = $this->db->query('SELECT * FROM surat_masuk WHERE month(tanggal_surat_masuk)="4"')->num_rows();
        $mei = $this->db->query('SELECT * FROM surat_masuk WHERE month(tanggal_surat_masuk)="5"')->num_rows();
        $juni = $this->db->query('SELECT * FROM surat_masuk WHERE month(tanggal_surat_masuk)="6"')->num_rows();
        $juli = $this->db->query('SELECT * FROM surat_masuk WHERE month(tanggal_surat_masuk)="7"')->num_rows();
        $agustus = $this->db->query('SELECT * FROM surat_masuk WHERE month(tanggal_surat_masuk)="8"')->num_rows();
        $september = $this->db->query('SELECT * FROM surat_masuk WHERE month(tanggal_surat_masuk)="9"')->num_rows();
        $oktober = $this->db->query('SELECT * FROM surat_masuk WHERE month(tanggal_surat_masuk)="10"')->num_rows();
        $november = $this->db->query('SELECT * FROM surat_masuk WHERE month(tanggal_surat_masuk)="11"')->num_rows();
        $desember = $this->db->query('SELECT * FROM surat_masuk WHERE month(tanggal_surat_masuk)="12"')->num_rows();


        $januari1 = $this->db->query('SELECT * FROM surat_keluar WHERE month(tanggal_surat_keluar)="1"')->num_rows();
        $februari1 = $this->db->query('SELECT * FROM surat_keluar WHERE month(tanggal_surat_keluar)="2"')->num_rows();
        $maret1 = $this->db->query('SELECT * FROM surat_keluar WHERE month(tanggal_surat_keluar)="3"')->num_rows();
        $april1 = $this->db->query('SELECT * FROM surat_keluar WHERE month(tanggal_surat_keluar)="4"')->num_rows();
        $mei1 = $this->db->query('SELECT * FROM surat_keluar WHERE month(tanggal_surat_keluar)="5"')->num_rows();
        $juni1 = $this->db->query('SELECT * FROM surat_keluar WHERE month(tanggal_surat_keluar)="6"')->num_rows();
        $juli1 = $this->db->query('SELECT * FROM surat_keluar WHERE month(tanggal_surat_keluar)="7"')->num_rows();
        $agustus1 = $this->db->query('SELECT * FROM surat_keluar WHERE month(tanggal_surat_keluar)="8"')->num_rows();
        $september1 = $this->db->query('SELECT * FROM surat_keluar WHERE month(tanggal_surat_keluar)="9"')->num_rows();
        $oktober1 = $this->db->query('SELECT * FROM surat_keluar WHERE month(tanggal_surat_keluar)="10"')->num_rows();
        $november1 = $this->db->query('SELECT * FROM surat_keluar WHERE month(tanggal_surat_keluar)="11"')->num_rows();
        $desember1 = $this->db->query('SELECT * FROM surat_keluar WHERE month(tanggal_surat_keluar)="12"')->num_rows();


        $januari2 = $this->db->query('SELECT * FROM surat_keterangan WHERE month(tanggal_surat_keterangan)="1"')->num_rows();
        $februari2 = $this->db->query('SELECT * FROM surat_keterangan WHERE month(tanggal_surat_keterangan)="2"')->num_rows();
        $maret2 = $this->db->query('SELECT * FROM surat_keterangan WHERE month(tanggal_surat_keterangan)="3"')->num_rows();
        $april2 = $this->db->query('SELECT * FROM surat_keterangan WHERE month(tanggal_surat_keterangan)="4"')->num_rows();
        $mei2 = $this->db->query('SELECT * FROM surat_keterangan WHERE month(tanggal_surat_keterangan)="5"')->num_rows();
        $juni2 = $this->db->query('SELECT * FROM surat_keterangan WHERE month(tanggal_surat_keterangan)="6"')->num_rows();
        $juli2 = $this->db->query('SELECT * FROM surat_keterangan WHERE month(tanggal_surat_keterangan)="7"')->num_rows();
        $agustus2 = $this->db->query('SELECT * FROM surat_keterangan WHERE month(tanggal_surat_keterangan)="8"')->num_rows();
        $september2 = $this->db->query('SELECT * FROM surat_keterangan WHERE month(tanggal_surat_keterangan)="9"')->num_rows();
        $oktober2 = $this->db->query('SELECT * FROM surat_keterangan WHERE month(tanggal_surat_keterangan)="10"')->num_rows();
        $november2 = $this->db->query('SELECT * FROM surat_keterangan WHERE month(tanggal_surat_keterangan)="2"')->num_rows();
        $desember2 = $this->db->query('SELECT * FROM surat_keterangan WHERE month(tanggal_surat_keterangan)="22"')->num_rows();

        $data['masuk'] = [$januari, $februari, $maret, $april, $mei, $juni, $juli, $agustus, $september, $oktober, $november, $desember];

        $data['keluar'] = [$januari1, $februari1, $maret1, $april1, $mei1, $juni1, $juli1, $agustus1, $september1, $oktober1, $november1, $desember1];

        $data['keterangan'] = [$januari2, $februari2, $maret2, $april2, $mei2, $juni2, $juli2, $agustus2, $september2, $oktober2, $november2, $desember2];


        // $data["smm"] = $this->db->get('surat_masuk');
        // $data["skk"] = $this->db->get('surat_keluar');

        // var_dump($data);


        $data2['sm'] = $this->db->query('SELECT tanggal_surat_masuk FROM surat_masuk ORDER BY tanggal_surat_masuk DESC LIMIT 1')->result_array();

        $data2['sk'] = $this->db->query('SELECT tanggal_surat_keluar FROM surat_keluar ORDER BY tanggal_surat_keluar DESC LIMIT 1')->result_array();

        $data2['sket'] = $this->db->query('SELECT tanggal_surat_keterangan FROM surat_keterangan ORDER BY tanggal_surat_keterangan DESC LIMIT 1')->result_array();

        if ($data2['sm'] == null) {
            $data2['sm'] = 0;
        }
        if($data2['sk'] == null){
            $data2['sk'] = 0;
        }
        if($data2['sket'] == null){
            $data2['sket'] = 0;
        }

        // var_dump($data2);
        // die;

        $this->load->view('templates/header', $judul);
        $this->load->view('dashboard/index', $data2);
        $this->load->view('templates/footer', $data);
    }
}
