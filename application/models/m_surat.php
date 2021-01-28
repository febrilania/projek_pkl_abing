<?php

class M_surat extends CI_Model{

    public function tampil_data(){

        return $this->db->get('tb_surat_masuk');
    }

    public function input_data($data){
        $this->db->insert('tb_surat_masuk', $data);
    }

    public function hapus_data($where,$table){

        $this->db->where($where);
        $this->db->delete($table);

    }
    public function edit_data($where,$table){
        return $this->db->get_where($table,$where);
    }

    public function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function detail_data($id_surat = NULL){
        $query = $this->db->get_where('tb_surat_masuk', array('id_surat' => $id_surat))->row();
        return $query;
    }

    //sk

    public function tampil_sk(){
        return $this->db->get('tb_surat_keluar');
    }
    public function input_sk($data){
        $this->db->insert('tb_surat_keluar', $data);
        // $this->db->select('*');
        // $this->db->from('bagian');
        // $this->db->join('tb_surat_keluar','tb_surat_keluar.id_surat = bagian.id_bagian');
        // $query = $this->db->get();
    }
    public function hapus_data_sk($where,$table){

        $this->db->where($where);
        $this->db->delete($table);
    }
    public function edit_data_sk($where,$table){
        return $this->db->get_where($table,$where);
    }
    public function update_data_sk($where,$data,$table){
        $this->db->where($where);
        $this->db->update_sk($table,$data);
    }
    public function detail_data_sk($id_surat = NULL){
        $query = $this->db->get_where('tb_surat_keluar', array('id_surat' => $id_surat))->row();
        return $query;
    }

    public function tampil_data_disp(){
        return $this->db->get('tb_disposisi');
    }
    public function input_disp($data,$table){
        $this->db->insert($table,$data);

    }
    public function cetak_sm($id_surat = NULL){
        $query = $this->db->get_where('tb_surat_masuk', array('id_surat' => $id_surat))->row();
        return $query;
    }
    public function cetak_sk($id_surat = NULL){
        $query = $this->db->get_where('tb_surat_keluar', array('id_surat' => $id_surat))->row();
        return $query;
    }

    public function tampil_bagian(){
        return $this->db->get('bagian');
    }

    public function input_bagian($data){
        $this->db->insert('bagian',$data);
    }
    public function get_keyword($keyword){
        $this->db->select('*');
        $this->db->from('tb_surat_masuk');
        $this->db->like('no_surat',$keyword);
        $this->db->or_like('asal_surat',$keyword);
        $this->db->or_like('isi',$keyword);
        $this->db->or_like('tgl_surat',$keyword);
        $this->db->or_like('tgl_diterima',$keyword);
        return $this->db->get()->result();
    }
    public function get_keyword1($keyword){
        $this->db->select('*');
        $this->db->from('tb_surat_keluar');
        $this->db->like('no_surat',$keyword);
        $this->db->or_like('tujuan',$keyword);
        $this->db->or_like('isi',$keyword);
        $this->db->or_like('tgl_surat',$keyword);
        $this->db->or_like('tgl_catat',$keyword);
        return $this->db->get()->result();
    }

    
}