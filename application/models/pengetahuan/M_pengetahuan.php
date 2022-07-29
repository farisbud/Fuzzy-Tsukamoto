<?php


/**
 *
 */
class M_pengetahuan extends CI_Model
{
    private $_table="perhitungan";
 //   private $_pro="produksi";

public function rules_pengetahuan()
    {
         
    return [
            ['field' => 'Id_roti',
            'label' => 'Nama Roti',
            'rules' => 'required'],

            ['field' => 'tanggal',
            'label' => 'Tanggal/Bulan/Tahun',
            'rules' => 'required'],
            
            ['field' => 'Permintaan_min',
            'label' => 'Permintaan Minimal',
            'rules' => 'required'],
            
            ['field' => 'Permintaan_max',
            'label' => 'Permintaan Maksimal',
            'rules' => 'required'],

            ['field' => 'Persediaan_min',
            'label' => 'Persediaan Minimal',
            'rules' => 'required'],

              ['field' => 'Persediaan_max',
            'label' => 'Persediaan Maksimal',
            'rules' => 'required'],
            
            ['field' => 'Tng_min',
            'label' => 'Tenaga kerja Minimal',
            'rules' => 'required'],

            ['field' => 'Tng_max',
            'label' => 'Tenaga kerja Maksimal',
            'rules' => 'required'],

             ['field' => 'Produksi_min',
            'label' => 'Produksi Minimal',
            'rules' => 'required'],
            
            ['field' => 'Produksi_max',
            'label' => 'Produksi Maksimal',
            'rules' => 'required']
        ];

    }




	 public function page($number,$offset){
       // return $this->db->get($this->_table,$number,$offset)->result();
       $this->db->select('perhitungan.tanggal, count(perhitungan.tanggal) as total'); 
//$this->db->from('perhitungan');
 $this->db->group_by('perhitungan.tanggal');
 $this->db->order_by('perhitungan.tanggal','desc');
 //$query = $this->db->get($this->_table,$number,$offset);
 
 return $this->db->get($this->_table,$number,$offset)->result();
/*if($query->num_rows()>0)
 {
 return $query->result();
 }
  */
    }
 
   public function jumlah_data(){
    $this->db->select('perhitungan.tanggal, count(perhitungan.tanggal) as total'); 
//$this->db->from('perhitungan');
 $this->db->group_by('perhitungan.tanggal');
 //$query = $this->db->get($this->_table);
 $this->db->order_by('perhitungan.tanggal','desc');
 return $this->db->get($this->_table)->num_rows();
        
        //return $this->db->get($this->_table)->num_rows();
    }


 public function hal($tgl)
    {
      
      $this->db->select('*');
  $this->db->from('produk_roti');
  $this->db->join('perhitungan','perhitungan.Id_roti = produk_roti.Id_roti');
  $this->db->where('tanggal',$tgl);
  $this->db->order_by('perhitungan.tanggal','desc');
  return $this->db->get()->result();
  }


 public function idEdit($id)
    {
      $this->db->select('*');
  $this->db->from('produk_roti');
  $this->db->join('perhitungan', 'perhitungan.Id_roti = produk_roti.Id_roti');
  $this->db->where('perhitungan.Id_perhitungan',$id);
  return $this->db->get()->result();

}

 public function saveP()
    {
        $post = $this->input->post();
      //  $this->Id_roti = $post["id"];
       
        $this->Id_roti = $post["Id_roti"];
        $this->tanggal =date('Y/m/d',strtotime($post["tanggal"]));
          $this->Permintaan_naik = $post["Permintaan_max"];
          $this->Permintaan_turun = $post["Permintaan_min"];
          $this->Persediaan_banyak = $post["Persediaan_max"];
          $this->Persediaan_sedikit = $post["Persediaan_min"];
          $this->Tenaga_Kerja_banyak = $post["Tng_max"];
          $this->Tenaga_Kerja_sedikit = $post["Tng_min"];
          $this->Produksi_terbanyak = $post["Produksi_max"];
          $this->Produksi_sedikit = $post["Produksi_min"];
    
        $this->db->insert($this->_table, $this);
}

   public function update()
    {
        $post = $this->input->post();
        $this->Id_perhitungan = $post["id"];
        $this->Id_roti = $post["Id_roti"];
        $this->tanggal = date('Y/m/d',strtotime($post["tanggal"]));
          $this->Permintaan_naik = $post["Permintaan_max"];
          $this->Permintaan_turun = $post["Permintaan_min"];
          $this->Persediaan_banyak = $post["Persediaan_max"];
          $this->Persediaan_sedikit = $post["Persediaan_min"];
          $this->Tenaga_Kerja_banyak = $post["Tng_max"];
          $this->Tenaga_Kerja_sedikit = $post["Tng_min"];
          $this->Produksi_terbanyak = $post["Produksi_max"];
          $this->Produksi_sedikit = $post["Produksi_min"];

        $this->db->update($this->_table, $this, array('Id_perhitungan' => $post['id']));
    
    }
    function hapus($id){

       return $this->db->delete($this->_table, array('Id_perhitungan'=>$id));
    }

   

}
?>