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

                    <strong>Input Pengetahuan</strong>
                    
                    </div>
                    <?= $this->session->flashdata('pesan'); ?> 
                  <div class="card-body">
                    
                    <form class="form-horizontal" action="<?php site_url('pengetahuan/c_pengetahuan/addP') ?>" method="post" >
                      
                      
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Nama roti</label>
                        
                        <div class="form-group col-sm-4">
                          <select class="form-control" name="Id_roti">
                            <option></option>
                            <?php foreach ($roti as $r): ?>
                              
                             <option value="<?= $r->Id_roti ?>"<?= set_value('Id_roti') == $r->Id_roti ? "selected" : null?>><?= $r->Nama ?></option>
                           <?php endforeach; ?>
                         </select>
                         <?= form_error('Id_roti')?>
                       </div>
                     </div>

                     <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="birthday">Tanggal/Bulan/Tahun</label>
                      <div class="col-sm-4">
                        <input  class="form-control tanggal1" type="text" name="tanggal" placeholder="Tanggal" value="<?= set_value('tanggal') ?>"> 
                        <?= form_error('tanggal') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">Permintaan Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="number" name="Permintaan_min" placeholder="Permintaan Minimal" value="<?= set_value('Permintaan_min')?>">
                        <?= form_error('Permintaan_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">Permintaan Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="number" name="Permintaan_max" placeholder="Permintaan Maksimal" value="<?= set_value('Permintaan_max')?>">
                        <?= form_error('Permintaan_max') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">Persediaan Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="number" name="Persediaan_min" placeholder="Persediaan Minimal" value="<?= set_value('Persediaan_min')?>">
                        <?= form_error('Persediaan_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">Persediaan Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="number" name="Persediaan_max" placeholder="Persediaan Maksimal" value="<?= set_value('Persediaan_max')?>">
                        <?= form_error('Persediaan_max') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">Tenaga kerja Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="number" name="Tng_min" placeholder="Tenaga Kerja Minimal" value="<?= set_value('Tng_min')?>">
                        <?= form_error('Tng_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">Tenaga kerja Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="number" name="Tng_max" placeholder="Tenaga Kerja Maksimal" value="<?= set_value('Tng_max')?>" >
                        <?= form_error('Tng_max') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">Produksi Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="number" name="Produksi_min" placeholder="Produksi Minimal" value="<?= set_value('Produksi_min')?>">
                        <?= form_error('Produksi_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">Produksi Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="number" name="Produksi_max" placeholder="Produksi Maksimal" value="<?= set_value('Produksi_max')?>" >
                        <?= form_error('Produksi_max') ?>
                      </div>
                    </div>
                    
                    
                    
                    
                    <div class="card-footer">
                      <button class="btn btn-sm btn-primary" type="submit">
                        <i class="fa fa-dot-circle-o"></i> Submit</button>
                        <button class="btn btn-sm btn-danger" type="reset">
                          <i class="fa fa-ban"></i> Reset</button>
                          
                        </div>

                      </form>
              
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
