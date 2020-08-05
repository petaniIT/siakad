<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Protection;

class Nilai_pengetahuan extends CI_Controller {
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Nilai_pengetahuan_model');
        $this->load->model('Kelas_model');
        // $this->load->model('Kelas_model');
        // cek user login
        check_login();
    }
    
    public function index()
    {
        $data['mapel'] = $this->Nilai_pengetahuan_model->get_mapel();
        // print_r($data['mapel']);
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilai_pengetahuan/index', $data);
        $this->load->view('template/footer');
    }

    public function do_nilai()
    {
        // pecah dulu uri -nya untuk memperodel id mapel dan id kelas
        $uri = $this->uri->segment(3);
        $params = explode('-', $uri);
        $id_mapel = $params[0];
        $id_kelas = $params[1];

        $get_kelas = $this->Kelas_model->get_kelas($id_kelas);
        // dapatkan semua kd pada mapel dan kelas ini
        $data['kd'] = $this->Nilai_pengetahuan_model->get_kd($id_mapel, $get_kelas['tingkat']);
        // print_r($data['kd']);

        // $data['siswa'] = $this->Nilai_pengetahuan_model->get_siswa($id_mapel, $id_kelas);
        // $data['jumlah'] = count($data['siswa']);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('nilai_pengetahuan/do_nilai', $data);
        $this->load->view('template/footer');
    }

    public function nilai_kd()
    {

    }
}