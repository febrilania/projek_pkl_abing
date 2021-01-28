<?php

class Laporan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('M_laporan');
    }

    public function lap_sm(){
        $data['tahun'] = $this->M_laporan->get_tahun();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('v_lap_sm', $data, False);
        $this->load->view('templates/footer');
    }
}