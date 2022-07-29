<?php $this->load->view("includes/header.php") ?>

 <div class="app-body">
<?php $this->load->view("includes/menu.php") ?> 

  <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            <a href="#">Perhitungan</a>
          </li>
          <li class="breadcrumb-item active">Tambah Hitungan</li>
          <!-- Breadcrumb Menu-->
         
        </ol>
        <div class="container-fluid">
          <div class="animated fadeIn">
<div class="row">
              <div class="col-md-10">
                <div class="card">
                  <div class="card-header">

                    <strong>hitung</strong>
                    </div>
                    <?= $this->session->flashdata('pesan')?>
                  <div class="card-body">
                    <?php 
                      foreach ($detail_pengetahuan as $p):
                        $tanggal=date('d/m/Y',strtotime($p->tanggal));
                    ?>
                    <form class="form-horizontal" action="<?= site_url('produksi/c_produksi/hitung/'.$p->Id_perhitungan) ?>" method="post">
                     <input type="hidden" name="id_p" value="<?php echo $p->Id_perhitungan ?>" >
                      
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Nama roti</label>
                      
                         <div class="form-group col-sm-4">
                        <select class="form-control" name="Id_roti">
                    
                      <option value="<?php echo $p->Id_roti ?>"><?php echo $p->Nama ?></option>
                  
                        </select>
                      </div>
                    </div>
   <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Tanggal/Bulan/Tahun Produksi</label>
                      
                          <div class="col-sm-4">
                          <input  class="form-control tanggal1" type="text" name="tgl_p" placeholder="Tanggal Produksi" value="<?=$this->input->post('tgl_p') ?>">
                          <?= form_error('tgl_p') ?> 
                        </div>
                    </div>
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="birthday">Tanggal/Bulan/Tahun</label>
                        <div class="col-sm-4">
                          <input  class="form-control" type="text" name="tanggal" readonly placeholder="Text" value="<?php echo $tanggal ?>"> 
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Permintaan Minimal</label>
                        <div class="col-sm-4">
                          <input class="form-control" type="text" name="Permintaan_min" placeholder="Text" value="<?php echo $p->Permintaan_turun ?>" readonly>
                      
                        </div>
                         <label class="col-md-2 col-form-label" for="text-input">Permintaan Maksimal</label>
                        <div class="col-sm-4">
                          <input class="form-control" type="text" name="Permintaan_max" placeholder="Text" value="<?php echo $p->Permintaan_naik ?>" readonly>
                      
                        </div>
                      </div>
                        <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Persediaan Minimal</label>
                        <div class="col-sm-4">
                          <input class="form-control" type="text" name="Persediaan_min" placeholder="Text" value="<?php echo $p->Persediaan_sedikit ?>"readonly>
                      
                        </div>
                         <label class="col-md-2 col-form-label" for="text-input">Persediaan Maksimal</label>
                        <div class="col-sm-4">
                          <input class="form-control" type="text" name="Persediaan_max" placeholder="Text" value="<?php echo $p->Persediaan_banyak ?>"readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Tenaga kerja Minimal</label>
                        <div class="col-sm-4">
                          <input class="form-control" type="text" name="Tng_min" placeholder="Text" value="<?php echo $p->Tenaga_kerja_sedikit ?>"readonly>
                      
                        </div>
                         <label class="col-md-2 col-form-label" for="text-input">Tenaga kerja Maksimal</label>
                        <div class="col-sm-4">
                          <input class="form-control" type="text" name="Tng_max" placeholder="Text" value="<?php echo $p->Tenaga_kerja_banyak ?>"readonly>
                      
                        </div>
                      </div>
                        <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Produksi Minimal</label>
                        <div class="col-sm-4">
                          <input class="form-control" type="text" name="Produksi_min" placeholder="Text" value="<?php echo $p->Produksi_sedikit ?>"readonly>
                      
                        </div>
                         <label class="col-md-2 col-form-label" for="text-input">Produksi Maksimal</label>
                        <div class="col-sm-4">
                          <input class="form-control" type="text" name="Produksi_max" placeholder="Text" value="<?php echo $p->Produksi_terbanyak ?>"readonly>
                      
                        </div>
                      </div>
                         <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Permintaan</label>
                        <div class="col-sm-2">
                          <input class="form-control" type="number" name="Permintaan" value="<?= $this->input->post('Permintaan') ?>" >
                      <?= form_error('Permintaan') ?>
                        </div>
                         <label class="col-md-2 col-form-label" for="text-input">Persediaan terakhir</label>
                        <div class="col-sm-2">
                          <input class="form-control" type="number" name="Persediaan" value="<?= $this->input->post('Persediaan') ?>">
                      <?= form_error('Persediaan') ?>
                        </div>
                          <label class="col-md-2 col-form-label" for="text-input">Tenaga kerja</label>
                        <div class="col-sm-2">
                          <input class="form-control" type="number" name="Tenaga" value="<?= $this->input->post('Tenaga') ?>">
                      <?= form_error('Tenaga') ?>
                        </div>
                      </div>

                    
                     
                  
                      
                    
                        <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit">
                      <i class="fa fa-dot-circle-o"></i> Submit</button>
                     <button class="btn btn-sm btn-danger" type="reset">
                      <i class="fa fa-ban"></i> Reset</button>
                  </div>

                    </form>
                  <?php endforeach; ?>
               
                  </div>

                </div>
                </div>



            </div> 
              </div>

              <!-- /.col-->
       </div>
       </main>
      </div>
<?php $this->load->view("includes/footer"); ?>


