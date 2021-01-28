<?php

class surat extends CI_Controller{

    

    public function dashboard()
	{
        if($this->session->userdata('username')!= ''){

            $this->session->userdata('username');
		    $this->load->view('templates/sidebar');
		    $this->load->view('templates/header');
		    $this->load->view('beranda');
		    $this->load->view('templates/footer');
        }else{
            redirect(base_url() . 'surat/login');
        }
    }
    

    public function surat_masuk(){
        if($this->session->userdata('username')!= ''){
            $data['surat'] = $this->m_surat->tampil_data()->result();
            $this->load->view('templates/sidebar');
            $this->load->view('templates/header');
            $this->load->view('v_surat_masuk',$data);
            $this->load->view('templates/footer');
        }else{
            redirect(base_url() . 'surat/login');
        }
    }

    public function tambah_aksi(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('no_surat','nomor surat','is_unique[tb_surat_masuk.no_surat]');

        if ($this->form_validation->run() == FALSE){

           
            echo '<script type="text/javascript">
            alert("nomor surat tidak boleh sama")</script>';
            $data['surat'] = $this->m_surat->tampil_data()->result();
            $this->load->view('templates/sidebar');
            $this->load->view('templates/header');
            $this->load->view('v_surat_masuk',$data);
            $this->load->view('templates/footer');

        }else{
            $no_surat           = $this->input->post('no_surat');
        $asal_surat         = $this->input->post('asal_surat');
        $isi                = $this->input->post('isi');
        $tgl_surat          = $this->input->post('tgl_surat');
        $tgl_diterima       = $this->input->post('tgl_diterima');
        $file               = $_FILES['file'];
        
        if ($file=''){}else{
            $config['upload_path']      ='./assets/file';
            $config['allowed_types']    ='pdf|doc|jpeg|jpg|docx|csv|xlsx|pptx';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('file')){
                echo "upload gagal"; die();
            }else{
                $file=$this->upload->data('file_name');
            }
        }
        

        $data = array(

            'no_surat'          => $no_surat,
            'asal_surat'        => $asal_surat,
            'isi'               => $isi,
            'tgl_surat'         => $tgl_surat,
            'tgl_diterima'      => $tgl_diterima,
            'file'              => $file,
        );

        $this->m_surat->input_data($data, 'tb_surat_masuk');
        redirect('surat/surat_masuk');

        }
        
        
    }

    public function hapus($id_surat){
        if($this->session->userdata('username')!= ''){
            $where = array('id_surat' => $id_surat);
            $this->m_surat->hapus_data($where,'tb_surat_masuk');
            redirect('surat/surat_masuk');
        }else{
            redirect(base_url() . 'surat/login');  
        }
    }

    public function edit($id_surat){
        if($this->session->userdata('username')!= ''){
            $where = array('id_surat'=>$id_surat);
            $data['surat'] = $this->m_surat->edit_data($where,'tb_surat_masuk')->result();
            $this->load->view('templates/sidebar');
            $this->load->view('templates/header');
            $this->load->view('v_edit_sm',$data);
            $this->load->view('templates/footer');
        }else{
            redirect(base_url() . 'surat/login'); 
        }
    }

    public function update(){
        $id_surat = $this->input->post('id_surat');
        $no_surat = $this->input->post('no_surat');
        $asal_surat = $this->input->post('asal_surat');
        $isi = $this->input->post('isi');
        $tgl_surat = $this->input->post('tgl_surat');
        $tgl_diterima = $this->input->post('tgl_diterima');
        $file               = $_FILES['file'];
        if ($file=''){}else{
            $config['upload_path']      ='./assets/file';
            $config['allowed_types']    ='pdf|doc|jpeg|jpg|docx|csv|xlsx|pptx';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('file')){
                echo "upload gagal"; die();
            }else{
                $file=$this->upload->data('file_name');
            }
        }

        $data = array(
            'no_surat'          => $no_surat,
            'asal_surat'        => $asal_surat,
            'isi'               => $isi,
            'tgl_surat'         => $tgl_surat,
            'tgl_diterima'      => $tgl_diterima,
            'file'              => $file,
        );
        $where = array(
            'id_surat' => $id_surat
        );

        $this->m_surat->update_data($where,$data,'tb_surat_masuk');
        redirect('surat/surat_masuk');
    }

    public function detail($id_surat){
        $this->load->model('m_surat');
        $detail = $this->m_surat->detail_data($id_surat);
        $data['detail'] = $detail;

        $this->load->view('templates/sidebar');
		$this->load->view('templates/header');
		$this->load->view('v_detail_sm',$data);
		$this->load->view('templates/footer');

    }

    public function __construct(){
        parent::__construct();
        $this->load->model('M_laporan');
        
    }

    public function lap_sm(){
        if($this->session->userdata('username')!= ''){
        
            $data['tahun'] = $this->M_laporan->get_tahun();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('v_lap_sm', $data, False);
            $this->load->view('templates/footer');
        }else{
            redirect(base_url() . 'surat/login');
        }
    }
    
    public function filter(){
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $tahun2 = $this->input->post('tahun2');
        $nilaifilter = $this->input->post('nilaifilter');
        
        if($nilaifilter == 1){
            $data['title'] = "Laporan surat masuk by tanggal";
            $data['subtitle'] = "dari tanggal : ".$tanggalawal. 'sampai tanggal : '.$tanggalakhir;
            $data['datafilter'] = $this->m_laporan->filterbytanggal($tanggalawal,$tanggalakhir);
            
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('data_lap_sm',$data);
            $this->load->view('templates/footer');
            
        }elseif($nilaifilter == 2){
            $data['title'] = "Laporan surat masuk by bulan";
            $data['subtitle'] = "dari bulan : ".$bulanawal. ' sampai bulan : '.$bulanakhir.' tahun :'.$tahun1;
            $data['datafilter'] = $this->m_laporan->filterbybulan($tahun1,$bulanawal,$bulanakhir);
            
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('data_lap_sm',$data);
            $this->load->view('templates/footer');

        }elseif($nilaifilter == 3){
            $data['title'] = "Laporan surat masuk by tahun";
            $data['subtitle'] = 'tahun :'.$tahun2;
            $data['datafilter'] = $this->m_laporan->filterbytahun($tahun2);
            
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('data_lap_sm',$data);
            $this->load->view('templates/footer');
        }
    }
    public function surat_keluar(){
        if($this->session->userdata('username')!= ''){
            $data['surat'] = $this->m_surat->tampil_sk()->result();
            $this->load->view('templates/sidebar');
            $this->load->view('templates/header');
            $this->load->view('v_surat_keluar',$data);
            $this->load->view('templates/footer');
        }else{
            redirect(base_url() . 'surat/login');
        }
    }
    public function tambah_sk(){

    // $bagian = $this->m_surat->get();
    
    $this->load->library('form_validation');
    $this->form_validation->set_rules('no_surat','nomor surat','is_unique[tb_surat_keluar.no_surat]');

    if ($this->form_validation->run() == FALSE){

        
        echo '<script type="text/javascript">
        alert("nomor surat tidak boleh sama")</script>';
        $data['surat'] = $this->m_surat->tampil_sk()->result();
        $this->load->view('templates/sidebar');
            $this->load->view('templates/header');
            $this->load->view('v_surat_keluar',$data);
            $this->load->view('templates/footer');

    }else{
        $no_surat               = $this->input->post('no_surat');
    $tujuan                 = $this->input->post('tujuan');
    $tgl_surat              = $this->input->post('tgl_surat');
    $tgl_catat              = $this->input->post('tgl_catat');
    $isi                    = $this->input->post('isi');
    $file                   = $_FILES['file'];
    if ($file=''){}else{
        $config['upload_path']      ='./assets/file';
        $config['allowed_types']    ='pdf|doc|jpeg|jpg|docx|csv|xlsx|pptx';

        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('file')){
            echo "upload gagal"; die();
        }else{
            $file=$this->upload->data('file_name');
        }
    }

    $data = array(

        'no_surat'          => $no_surat,
        'tujuan'            => $tujuan,
        'tgl_surat'         => $tgl_surat,
        'tgl_catat'         => $tgl_catat,
        'isi'               => $isi,
        'file'              => $file,
        // 'bagian'            => $bagian,
    );

    $this->m_surat->input_sk($data, 'tb_surat_keluar');
    redirect('surat/surat_keluar');
    }
   
    

   }
   public function hapus_sk($id_surat){
    $where = array('id_surat' => $id_surat);
    $this->m_surat->hapus_data_sk($where,'tb_surat_keluar');
    redirect('surat/surat_keluar');
    }
    public function edit_sk($id_surat){
        $where = array('id_surat'=>$id_surat);
        $data['surat'] = $this->m_surat->edit_data_sk($where,'tb_surat_keluar')->result();
        $this->load->view('templates/sidebar');
		$this->load->view('templates/header');
		$this->load->view('v_edit_sk',$data);
        $this->load->view('templates/footer');
    }
    public function update_sk(){
        $id_surat = $this->input->post('id_surat');
        $no_surat = $this->input->post('no_surat');
        $tujuan = $this->input->post('tujuan');
        $tgl_surat = $this->input->post('tgl_surat');
        $tgl_catat = $this->input->post('tgl_catat');
        $isi = $this->input->post('isi');
        $file               = $_FILES['file'];
        // $file = $this->input->post('file');
        if ($file=''){}else{
            $config['upload_path']      ='./assets/file';
            $config['allowed_types']    ='pdf|doc|jpeg|jpg|docx|csv|xlsx|pptx';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('file')){
                echo "upload gagal"; die();
            }else{
                $file=$this->upload->data('file_name');
            }
        }

        $data = array(
            'no_surat'          => $no_surat,
            'tujuan'            => $tujuan,
            'isi'               => $isi,
            'tgl_surat'         => $tgl_surat,
            'tgl_diterima'      => $tgl_diterima,
            'file'              => $file,
        );
        $where = array(
            'id_surat' => $id_surat
        );

        $this->m_surat->update_data_sk($where,$data,'tb_surat_keluar');
        redirect('surat/surat_keluar');
    }
    public function detail_sk($id_surat){
        $this->load->model('m_surat');
        $detail = $this->m_surat->detail_data_sk($id_surat);
        $data['detail'] = $detail;

        $this->load->view('templates/sidebar');
		$this->load->view('templates/header');
		$this->load->view('v_detail_sk',$data);
        $this->load->view('templates/footer');
    }

    //lap sk

    public function lap_sk(){
        if($this->session->userdata('username')!= ''){
            $data['tahun'] = $this->M_laporan->get_tahun_sk();
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('v_lap_sk', $data, False);
            $this->load->view('templates/footer');
        }else{
            redirect(base_url() . 'surat/login');
        }
    }

    public function filtersk(){
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $tahun2 = $this->input->post('tahun2');
        $nilaifilter = $this->input->post('nilaifilter');
        
        if($nilaifilter == 1){
            $data['title'] = "Laporan surat keluar by tanggal";
            $data['subtitle'] = "dari tanggal : ".$tanggalawal. 'sampai tanggal : '.$tanggalakhir;
            $data['datafilter'] = $this->m_laporan->filterbytanggalsk($tanggalawal,$tanggalakhir);
            
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('data_lap_sk',$data);
            $this->load->view('templates/footer');
            
        }elseif($nilaifilter == 2){
            $data['title'] = "Laporan surat keluar by bulan";
            $data['subtitle'] = "dari bulan : ".$bulanawal. ' sampai bulan : '.$bulanakhir.' tahun :'.$tahun1;
            $data['datafilter'] = $this->m_laporan->filterbybulansk($tahun1,$bulanawal,$bulanakhir);
            
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('data_lap_sk',$data);
            $this->load->view('templates/footer');

        }elseif($nilaifilter == 3){
            $data['title'] = "Laporan surat keluar by tahun";
            $data['subtitle'] = 'tahun :'.$tahun2;
            $data['datafilter'] = $this->m_laporan->filterbytahunsk($tahun2);
            
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('data_lap_sk',$data);
            $this->load->view('templates/footer');
        }
    }

    //disposisi
    public function disposisi(){
    
        $data['disposisi'] = $this->m_surat->tampil_data_disp()->result();
        $this->load->view('templates/sidebar');
		$this->load->view('templates/header');
		$this->load->view('v_tambah_disp',$data);
		$this->load->view('templates/footer');
    }

    public function tambah_disposisi(){

        $data['result'] = $this->m_surat->tampil_data_disp()->result();

        $id_surat = $this->input->post('id_surat');
        $tujuan = $this->input->post('tujuan');
        $isi_disposisi = $this->input->post('isi_disposisi');
        $sifat = $this->input->post('sifat');
        $batas_waktu = $this->input->post('batas_waktu');
        $data = array(

            'id_surat'             => $id_surat,
            'tujuan'               => $tujuan,
            'isi_disposisi'        => $isi_disposisi,
            'sifat'                => $sifat,
            'batas_waktu'          => $batas_waktu,
            
        );
        $this->m_surat->input_disp($data,'tb_disposisi');
        redirect('surat/disp');
        
    }
    public function disp(){
        $data['result'] = $this->m_surat->tampil_data_disp()->result();
        $this->load->view('templates/sidebar');
		$this->load->view('templates/header');
		$this->load->view('v_disposisi',$data);
		$this->load->view('templates/footer');

    }
    public function print_sm($id_surat){
        
        $this->load->model('m_surat');
        $cetak = $this->m_surat->cetak_sm($id_surat);
        $data['cetak'] = $cetak;

        $this->load->view('templates/sidebar');
		$this->load->view('templates/header');
		$this->load->view('print_surat',$data);
    
    }
    public function print_sk($id_surat){
        
        $this->load->model('m_surat');
        $cetak = $this->m_surat->cetak_sk($id_surat);
        $data['cetak'] = $cetak;

        $this->load->view('templates/sidebar');
		$this->load->view('templates/header');
		$this->load->view('print_surkel',$data);
    
    }

    public function bagian(){
        if($this->session->userdata('username')!= ''){
            $data['bagian'] = $this->m_surat->tampil_bagian()->result();
            $this->load->view('templates/sidebar');
            $this->load->view('templates/header');
            $this->load->view('v_bagian',$data);
            $this->load->view('templates/footer');
        }else{
            redirect(base_url() . 'surat/login');
        }
    }

    public function tambah_bagian(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_bagian','nama bagian','is_unique[bagian.nama_bagian]');
    
        if ($this->form_validation->run() == FALSE){
    
            // redirect(base_url(). 'surat/surat_masuk');
            echo '<script type="text/javascript">
            alert("nama bagian sudah terdaftar")</script>';
            $data['bagian'] = $this->m_surat->tampil_bagian()->result();
            $this->load->view('templates/sidebar');
            $this->load->view('templates/header');
            $this->load->view('v_bagian',$data);
            $this->load->view('templates/footer');
    
        }else{$nama_bagian = $this->input->post('nama_bagian');

            $data = array(
                'nama_bagian'   => $nama_bagian,
            );
    
            $this->m_surat->input_bagian($data, 'tb_bagian');
            redirect('surat/bagian');}


        
        

    }
    public function login(){
        $this->form_validation->set_rules('username','Username','required',[
            'required'      => 'username wajib diisi'
        ]);
        $this->form_validation->set_rules('password','Password','required',[
            'required'      => 'password wajib diisi'
        ]);
        if($this->form_validation->run() == FALSE){
            $this->load->view('v_login');
        }else{
            $auth = $this->m_auth->cek_login();
            if($auth == FALSE){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert>
                Username atau Password salah!!
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('surat/login');
            }else{
                $this->session->set_userdata('username',$auth->username);
                redirect('surat/dashboard');
            }
        }

    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('surat/login');
    }

    public function searchsm(){
        $keyword = $this->input->post('keyword');
        $data['surat'] = $this->m_surat->get_keyword($keyword);
        $this->load->view('templates/sidebar');
		$this->load->view('templates/header');
		$this->load->view('v_surat_masuk',$data);
		$this->load->view('templates/footer');
    }
    public function searchsk(){
        $keyword = $this->input->post('keyword');
        $data['surat'] = $this->m_surat->get_keyword1($keyword);
        $this->load->view('templates/sidebar');
		$this->load->view('templates/header');
		$this->load->view('v_surat_keluar',$data);
		$this->load->view('templates/footer');
    }
  
}
?>