<?php


/**
 *
 */
class M_produksi extends CI_Model
{
  private $_table="produksi";



public function rules_hitung()
    {
         
    return [

             ['field' => 'tgl_p',
            'label' => 'Tanggal Produksi',
            'rules' => 'required'],

            ['field' => 'Permintaan',
            'label' => 'Permintaan',
            'rules' => 'required'],

             ['field' => 'Persediaan',
            'label' => 'Persediaan terakhir',
            'rules' => 'required'],

             ['field' => 'Tenaga',
            'label' => 'Tenaga kerja',
            'rules' => 'required']
        ];

    }


    public function page($number,$offset){
       
       
       $this->db->select('produksi.Tanggal_Produksi, count(produksi.Tanggal_Produksi) as total') ;
//$this->db->from('perhitungan');
$this->db->join('perhitungan','produksi.Id_perhitungan=perhitungan.Id_perhitungan');
 $this->db->group_by('produksi.Tanggal_Produksi');
 $this->db->order_by('produksi.Tanggal_Produksi','desc');
 return $this->db->get($this->_table,$number,$offset)->result();
    }
 
   public function jumlah_data(){
$this->db->select('produksi.Tanggal_Produksi, count(produksi.Tanggal_Produksi) as total') ;
//$this->db->from('perhitungan');
$this->db->join('perhitungan','produksi.Id_perhitungan=perhitungan.Id_perhitungan');
$this->db->group_by('produksi.Tanggal_Produksi');
$this->db->order_by('produksi.Tanggal_Produksi','desc');
 
 return $this->db->get($this->_table)->num_rows();
        
            }

 public function idEdit($id)
    {
      
      $this->db->select('*');
  $this->db->from('produk_roti');
  $this->db->join('perhitungan', 'perhitungan.Id_roti = produk_roti.Id_roti');
  $this->db->where('perhitungan.Id_perhitungan',$id);
  return $this->db->get()->result();

}
     public function saveH()
    {

        $post = $this->input->post();
        //$this->Permintaan_naik = $post["Permintaan_max"];
          $this->Id_perhitungan = $post['Id_p'];
          $this->Tanggal_Produksi = date('Y/m/d',strtotime($post["tgl_p"]));
          $this->Permintaan =$post['Permintaan'];
          $this->Persediaan = $post['Persediaan'];
          $this->Tenaga_kerja = $post['Tenaga'];
        // $this->Permintaan = $Permintaan;
        // $this->Persediaan = $Persediaan;
        // $this->Tenaga_kerja = $Tenaga;
         $this->Total_produksi=$post['z'];
        // $this->Total_produksi = round($z,0,PHP_ROUND_HALF_DOWN);

            
        $this->db->insert($this->_table, $this);

    }

 public function hal($tgl)
    {
      
      $this->db->select('*');
      $this->db->from('produk_roti');
      $this->db->join('perhitungan','perhitungan.Id_roti = produk_roti.Id_roti');
      $this->db->join('produksi','produksi.Id_perhitungan = perhitungan.Id_perhitungan');
      $this->db->where('Tanggal_Produksi',$tgl);
      $this->db->order_by('produksi.Tanggal_Produksi','desc');
      return $this->db->get()->result();
  }


 function hapus($id){

       return $this->db->delete($this->_table, array('Id_produksi'=>$id));
    }
}
?>