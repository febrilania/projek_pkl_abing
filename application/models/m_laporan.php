<?php

class M_laporan extends CI_Model{

    public function get_tahun(){
        $query = $this->db->query("SELECT YEAR(tgl_surat) as  tahun FROM tb_surat_masuk GROUP BY YEAR(tgl_surat)ORDER BY YEAR(tgl_surat)ASC");
        
        return $query->result();
        
    }
    
    public function filterbytanggal($tanggalawal,$tanggalakhir){
        $query = $this->db->query("SELECT * FROM tb_surat_masuk WHERE tgl_surat BETWEEN '$tanggalawal' AND '$tanggalakhir' ORDER BY tgl_surat ASC");
        
        return $query->result();
    }
    
    public function filterbybulan($tahun1,$bulanawal,$bulanakhir){
        $query = $this->db->query("SELECT * FROM tb_surat_masuk WHERE YEAR(tgl_surat) = '$tahun1' and MONTH(tgl_surat) BETWEEN '$bulanawal' AND '$bulanakhir' ORDER BY tgl_surat ASC");
        return $query->result();
    }
    
    public function filterbytahun($tahun2){
        $query = $this->db->query("SELECT * FROM tb_surat_masuk WHERE YEAR(tgl_surat) = '$tahun2' ORDER BY tgl_surat ASC");
        return $query->result();
        
    }

    //mlapsk
    public function get_tahun_sk(){
        $query = $this->db->query("SELECT YEAR(tgl_surat) as  tahun FROM tb_surat_keluar GROUP BY YEAR(tgl_surat)ORDER BY YEAR(tgl_surat)ASC");
        
        return $query->result();
        
    }
    
    public function filterbytanggalsk($tanggalawal,$tanggalakhir){
        $query = $this->db->query("SELECT * FROM tb_surat_sk WHERE tgl_surat BETWEEN '$tanggalawal' AND '$tanggalakhir' ORDER BY tgl_surat ASC");
        
        return $query->result();
    }
    
    public function filterbybulansk($tahun1,$bulanawal,$bulanakhir){
        $query = $this->db->query("SELECT * FROM tb_surat_keluar WHERE YEAR(tgl_surat) = '$tahun1' and MONTH(tgl_surat) BETWEEN '$bulanawal' AND '$bulanakhir' ORDER BY tgl_surat ASC");
        return $query->result();
    }
    
    public function filterbytahunsk($tahun2){
        $query = $this->db->query("SELECT * FROM tb_surat_keluar WHERE YEAR(tgl_surat) = '$tahun2' ORDER BY tgl_surat ASC");
        return $query->result();
        
    }


}