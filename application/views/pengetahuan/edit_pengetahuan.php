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
          <li class="breadcrumb-item active">Edit Perhitungan</li>
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
                    <?= $this->session->flashdata('pesan') ?>
                     
                  <div class="card-body">
                    <?php foreach($detail_pengetahuan as $p): ?>
                      <form class="form-horizontal" action="<?php site_url('pengetahuan/c_pengetahuan/edit'. $p->Id_perhitungan) ?>" method="post" >
                       <input class="form-control"  type="hidden" name="id" placeholder="Text" value="<?= $p->Id_perhitungan ?>">

                       <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Nama roti</label>

                        <div class="form-group col-sm-4">
                          <select class="form-control" name="Id_roti">
                           <?php foreach ($roti as $r):
                            ?>

                            <option value="<?= $r->Id_roti ?>" <?= $r->Id_roti == $p->Id_roti ? "selected" : null ?>><?= $r->Nama ?></option>
                          <?php endforeach; ?>
                        </select>
                        <?=form_error('Id_roti') ?>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="birthday">Tanggal/Bulan/Tahun</label>
                      <div class="col-sm-4">
                        <input  class="form-control tanggal1" type="text" name="tanggal" placeholder="Text" value="<?= $this->input->post('tanggal') ?? date('d-m-Y',strtotime($p->tanggal)) ?>"> 
                        <?=form_error('tanggal') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">Permintaan Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="Permintaan_min" placeholder="Text" value="<?= $this->input->post('Permintaan_min') ?? $p->Permintaan_turun ?>">
                        <?=form_error('Permintaan_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">Permintaan Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="Permintaan_max" placeholder="Text" value="<?= $this->input->post('Permintaan_max') ?? $p->Permintaan_naik ?>">
                        <?=form_error('Permintaan_max') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">Persediaan Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="Persediaan_min" placeholder="Text" value="<?= $this->input->post('Persediaan_min') ?? $p->Persediaan_sedikit ?>">
                        <?=form_error('Persediaan_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">Persediaan Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="Persediaan_max" placeholder="Text" value="<?= $this->input->post('Persediaan_max') ?? $p->Persediaan_banyak ?>">
                        <?=form_error('Persediaan_max') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">Tenaga kerja Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="Tng_min" placeholder="Text" value="<?= $this->input->post('Tng_min') ?? $p->Tenaga_kerja_sedikit ?>">
                        <?=form_error('Tng_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">Tenaga kerja Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="Tng_max" placeholder="Text" value="<?= $this->input->post('Tng_max') ?? $p->Tenaga_kerja_banyak ?>">
                        <?=form_error('Tng_max') ?>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-md-2 col-form-label" for="text-input">Produksi Minimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="Produksi_min" placeholder="Text" value="<?= $this->input->post('Produksi_min') ?? $p->Produksi_sedikit ?>">
                        <?=form_error('Produksi_min') ?>
                      </div>
                      <label class="col-md-2 col-form-label" for="text-input">Produksi Maksimal</label>
                      <div class="col-sm-4">
                        <input class="form-control" type="text" name="Produksi_max" placeholder="Text" value="<?= $this->input->post('Produksi_max') ?? $p->Produksi_terbanyak ?>">
                        <?=form_error('Produksi_max') ?>
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
