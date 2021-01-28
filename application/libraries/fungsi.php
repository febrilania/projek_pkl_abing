<?php


 class Fungsi {
     protected $ci;
     function __construct(){
         $this->ci =& get_instance();
     }
     public function count_sm(){
         $this->ci->load->model('M_surat');
         return $this->ci->M_surat->get()->num_rows;
     }
     public function count_sk(){
        $this->ci->load->model('M_surat');
        return $this->ci->M_surat->get()->num_rows;
    }
 }