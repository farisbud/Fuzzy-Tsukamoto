<?php


class C_produksi extends CI_Controller
{
  
  function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('produksi/M_produksi');
     $this->load->model('roti/M_roti'); 
    $this->load->model('M_login');
    $this->load->helper(array('url'));
    if ($this->session->userdata('logged_in') !==TRUE) {
      redirect('login');    
    }

  }


  public function index(){


    $jumlah_data= $this->M_produksi->jumlah_data();
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/produksi/C_produksi/index/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 10;
 
        // Membuat Style pagination untuk BootStrap v4
       $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
          $from = $this->uri->segment(4);
        $this->pagination->initialize($config);     
       
        $data['produksi'] = $this->M_produksi->page($config['per_page'],$from);
       
      
     $data['pagination'] = $this->pagination->create_links();
    $this->load->view('produksi/list_tanggal_produksi',$data);

  }


    

  public function hitung($id=null)
  {
   
   $product = $this->M_produksi;
   $roti=$this->M_roti;
   $validation= $this->form_validation;
   $validation->set_rules($product->rules_hitung());
   $validation->set_message('required','%s silahkan di isi dahulu');

   if ($validation->run() == FALSE) {

     
     $data["detail_pengetahuan"] = $product->idEdit($id);
     $data["roti"] = $roti->tampil();
     if (!$data["detail_pengetahuan"]) show_404();
     
     $this->load->view("pengetahuan/hitung", $data); 
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data gagal disimpan</div>');

   }else{
    

      $post = $this->input->post();
    //  $this->Id_roti = $post["id"];
      $id_p=$this->input->post('id_p');
      
$Pmt_min = $this->input->post('Permintaan_min');
$Pmt_max = $this->input->post('Permintaan_max');
$Psd_min = $this->input->post('Persediaan_min');
$Psd_max = $this->input->post('Persediaan_max');
$Tng_min = $this->input->post('Tng_min');
$Tng_max = $this->input->post('Tng_max');
$Pro_min = $this->input->post('Produksi_min');
$Pro_max = $this->input->post('Produksi_max');

$tgl_p=$this->input->post('tgl_p');
$Permintaan=$this->input->post('Permintaan');
$Persediaan=$this->input->post('Persediaan');
$Tenaga=$this->input->post('Tenaga');

//rumus derajat permintaan

if ($Permintaan > $Pmt_min && $Permintaan < $Pmt_max) {
$Pmt=$Pmt_max-$Pmt_min;
if ($Pmt <= 0) $Pmt = 1;  
$PmtT=($Pmt_max-$Permintaan)/$Pmt;
$PmtTu=round($PmtT,PHP_ROUND_HALF_DOWN); 
}elseif ($Permintaan <= $Pmt_min) {
$PmtTu = 1;
}elseif($Permintaan >= $Pmt_max){
$PmtTu=0;
}

if ($Permintaan > $Pmt_min && $Permintaan < $Pmt_max) {
$Pmt=$Pmt_max-$Pmt_min;
if ($Pmt <= 0) $Pmt = 1;  
$PmtN=($Permintaan-$Pmt_min)/$Pmt;
$PmtNa=round($PmtN,PHP_ROUND_HALF_DOWN);
  
}elseif ($Permintaan <= $Pmt_min) {
$PmtNa = 0;
}elseif($Permintaan >= $Pmt_max){
$PmtNa=1;
}


//rumus derajat persediaan

if ($Persediaan > $Psd_min && $Persediaan < $Psd_max) {
$Psd=$Psd_max-$Psd_min;
if ($Psd <= 0) $Psd = 1;  
$PsdS=($Psd_max-$Persediaan)/$Psd;
$PsdSe=round($PsdS,PHP_ROUND_HALF_DOWN); 
}elseif ($Persediaan <= $Psd_min) {
$PsdSe = 1;
}elseif($Persediaan >= $Psd_max){
$PsdSe=0;
}

if ($Persediaan > $Psd_min && $Persediaan < $Psd_max) {
$Psd=$Psd_max-$Psd_min;
if ($Psd <= 0) $Psd = 1;  
$PsdB=($Persediaan-$Psd_min)/$Psd;
$PsdBa=round($PsdB,PHP_ROUND_HALF_DOWN);  
}elseif ($Persediaan <= $Psd_min) {
$PsdBa = 0;
}elseif($Persediaan >= $Psd_max){
$PsdBa=1;
}


//rumus derajat tenaga kerja


if ($Tenaga > $Tng_min && $Tenaga < $Tng_max) {
$Tng=$Tng_max-$Tng_min;
if ($Tng <= 0) $Tng = 1;  
$TngS=($Tng_max-$Tenaga)/$Tng; 
$TngSdk=round($TngS,PHP_ROUND_HALF_DOWN); 
}elseif ($Tenaga <= $Tng_min) {
$TngSdk = 1;
}elseif($Tenaga >= $Tng_max){
$TngSdk=0;
}

if ($Tenaga > $Tng_min && $Tenaga < $Tng_max) {
$Tng=$Tng_max-$Tng_min;
if ($Tng <= 0) $Tng = 1;  
$TngB=($Tenaga-$Tng_min)/$Tng;
$TngByk=round($TngB,PHP_ROUND_HALF_DOWN);  
}elseif ($Tenaga <= $Tng_min) {
$TngByk = 0;
}elseif($Tenaga >= $Tng_max){
$TngByk=1;
}


//nilai a predikat 1
$a1=min($PmtNa,$PsdBa,$TngByk);
//permintaan naik persediaan banyak tenaga kerja banyak produksi bertambah
$z1=($a1 * ($Pro_max - $Pro_min)) + $Pro_min;
//nilai a predikat 2
$a2=min($PmtNa,$PsdBa,$TngSdk);
//permintaan naik persediaan banyak tenaga kerja sedikit produksi berkurang
$z2=$Pro_max - ($a2 * ($Pro_max - $Pro_min));
//nilai a predikat 3
$a3=min($PmtNa,$PsdSe,$TngByk);
//permintaan naik persediaan sedikit tenaga kerja banyak produksi bertambah
$z3=($a3 * ($Pro_max - $Pro_min)) + $Pro_min;
//nilai a predikat 4
$a4=min($PmtNa,$PsdSe,$TngSdk);
//permintaan naik persediaan sedikit tenaga kerja sedikit produksi bertambah
$z4=($a4 * ($Pro_max - $Pro_min)) + $Pro_min;
//nilai a predikat 5
$a5=min($PmtTu,$PsdBa,$TngByk);
//permintaan turun persediaan banyak tenaga kerja banyak produksi berkurang
$z5=$Pro_max - ($a5 * ($Pro_max - $Pro_min));
//nilai a predikat 6
$a6=min($PmtTu,$PsdBa,$TngSdk);
//permintaan turun persediaan banyak tenaga kerja sedikit produksi berkurang
$z6=$Pro_max - ($a6 * ($Pro_max - $Pro_min));
//nilai a predikat 7
$a7=min($PmtTu,$PsdSe,$TngByk);
//permintaan turun persediaan sedikit tenaga kerja banyak produksi bertambah
$z7=($a7 * ($Pro_max - $Pro_min)) + $Pro_min;
//nilai a predikat 8
$a8=min($PmtTu,$PsdSe,$TngSdk);
//permintaan turun persediaan sedikit tenaga kerja sedikit produksi berkurang
$z8=$Pro_max - ($a8 * ($Pro_max - $Pro_min));

// Nilai z total
$a=$a1+$a2+$a3+$a4+$a5+$a6+$a7+$a8;
if ($a <= 0) $a = 1;
$z=(($a1*$z1)
+($a2*$z2)
+($a3*$z3)
+($a4*$z4)
+($a5*$z5)
+($a6*$z6)
+($a7*$z7)
+($a8*$z8))/$a;

$data= array(
  // 'Pmt_min'=>$Pmt_min,
  // 'Pmt_max'=>$Pmt_max,
  // 'Psd_min'=>$Psd_min,
  // 'Psd_max'=>$Psd_max,
  // 'Tng_min'=>$Tng_min,
  // 'Tng_max'=>$Tng_max,
  'Id'=>$id,
  'tgl_p'=>$tgl_p,
   'Pro_min'=>$Pro_min,
   'Pro_max'=>$Pro_max,
  'Permintaan'=>$Permintaan,
  'Persediaan'=>$Persediaan,
  'Tenaga'=>$Tenaga,
  'PmtTu' =>$PmtTu,
  'PmtNa'=>$PmtNa,
  'PsdSe'=>$PsdSe,
  
  'PsdBa'=>$PsdBa,
  'TngSdk'=>$TngSdk,

  'TngByk'=>$TngByk,
  
  'a1'=>$a1,
  'z1'=>$z1,
  'a2'=>$a2,
  'z2'=>$z2,
  'a3'=>$a3,
  'z3'=>$z3,
  'a4'=>$a4,
  'z4'=>$z4,
  'a5'=>$a5,
  'z5'=>$z5,
  'a6'=>$a6,
  'z6'=>$z6,
  'a7'=>$a7,
  'z7'=>$z7,
  'a8'=>$a8,
  'z8'=>$z8,

  'a'=>$a,
  'z'=>$z

               );

   // $product->saveH();
    // $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Hasil Produksi berhasil disimpan</div>');
    // redirect(site_url("pengetahuan/c_pengetahuan/"));      
    $this->load->view("pengetahuan/proses_hitung", $data); 
    
    
  }

}

public function simpan_produksi(){

  $product = $this->M_produksi;
  $roti=$this->M_roti;
  $product->saveH();
 
   $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Hasil Produksi berhasil disimpan</div>');
  redirect(site_url("pengetahuan/c_pengetahuan/"));  
}

public function lihat($tgl=null){

$data['detail_produksi']  = $this->M_produksi->hal($tgl);
       
$this->load->view('produksi/list_produksi', $data);
        
    }

public function cetak($tgl=null)
{
  $data['detail_produksi']  = $this->M_produksi->hal($tgl);
       
$this->load->view('produksi/print', $data);
        
}

 function hapus($id=null){

      if (!isset($id)){

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Hasil produksi gagal dihapus</div>'); 
 redirect(site_url('produksi/C_produksi'));
    }elseif ($this->M_produksi->hapus($id)) {
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Hasil produksi berhasil dihapus</div>');
            redirect(site_url('produksi/C_produksi'));
    }
      }


}
?>