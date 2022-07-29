<?php $this->load->view("includes/header.php") ?>

 <div class="app-body">
<?php $this->load->view("includes/menu.php") ?> 

  <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">
            Perhitungan
          </li>
          <li class="breadcrumb-item active">Proses hitung</li>
          <!-- Breadcrumb Menu-->
         
        </ol>


        
        <div class="container-fluid justify-content-center">
          <div class="animated fadeIn">

          <div class="row d-flex justify-content-center">
              <div class="col-md-6">
                <div class="card">

                <div class="card-header">
                    <strong>Fuzzy Tsukamoto</strong>
                  </div>

                <div class="card-body">
                  <form class="form-horizontal" action="<?= site_url('produksi/C_produksi/simpan_produksi') ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="Id_p" value="<?= $Id ?>">
                        <input type="hidden" name="tgl_p" value="<?= $tgl_p ?>">
                      <div class="form-group row">
                        <label class="col-md-2 col-form-label" for="text-input">Permintaan</label>
                        <div class="col-sm-2">
                          <input class="form-control" type="number" name="Permintaan" value="<?= $Permintaan ?>" readonly>
                     
                        </div>
                         <label class="col-md-2 col-form-label" for="text-input">Persediaan terakhir</label>
                        <div class="col-sm-2">
                          <input class="form-control" type="number" name="Persediaan" value="<?=$Persediaan ?>"readonly>
                     
                        </div>
                          <label class="col-md-2 col-form-label" for="text-input">Tenaga kerja</label>
                        <div class="col-sm-2">
                          <input class="form-control" type="number" name="Tenaga" value="<?= $Tenaga ?>"readonly>
                      
                        </div>
                      </div>

                      <div class="form-group">
                        <label>1. Permintaan <strong>Banyak</strong> AND Persediaan <strong>Banyak</strong> AND Tenaga Kerja <strong>Banyak</strong> Then Produksi <strong>Bertambah</strong></label>
                        <label>2. Permintaan <strong>Banyak</strong> AND Persediaan <strong>Banyak</strong> AND Tenaga Kerja <strong>Sedikit</strong> Then Produksi <strong>Berkurang</strong></label>
                        <label>3. Permintaan <strong>Banyak</strong> AND Persediaan <strong>Sedikit</strong> AND Tenaga Kerja <strong>Banyak</strong> Then Produksi <strong>Bertambah</strong></label>
                        <label>4. Permintaan <strong>Banyak</strong> AND Persediaan <strong>Sedikit</strong> AND Tenaga Kerja <strong>Sedikit</strong> Then Produksi <strong>Bertambah</strong></label>
                        <label>5. Permintaan <strong>Sedikit</strong> AND Persediaan <strong>Banyak</strong> AND Tenaga Kerja <strong>Banyak</strong> Then Produksi <strong>Berkurang</strong></label>
                        <label>6. Permintaan <strong>Sedikit</strong> AND Persediaan <strong>Banyak</strong> AND Tenaga Kerja <strong>Sedikit</strong> Then Produksi <strong>Berkurang</strong></label>
                        <label>7. Permintaan <strong>Sedikit</strong> AND Persediaan <strong>Sedikit</strong> AND Tenaga Kerja <strong>Banyak</strong> Then Produksi <strong>Bertambah</strong></label>
                        <label>8. Permintaan <strong>Sedikit</strong> AND Persediaan <strong>Sedikit</strong> AND Tenaga Kerja <strong>Sedikit</strong> Then Produksi <strong>Berkurang</strong></label>
                    
                   </div>
                   <hr>
                   <div class="text-align-center">
                     <p><strong>Nilai Keanggotaan</strong></p>
                   </div>
                    <table class="table table-responsive-sm table-bordered table-striped table-sm" style="text-align: center;">
                      <thead>
                        <tr>
                          <th>Fungsi Keanggotaan</th>
                          <th>Nilai</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Permintaan Sedikit</td>
                          <td><?= $PmtTu ?></td>
                        </tr>
                        <tr>
                          <td>Permintaan Banyak</td>
                          <td><?= $PmtNa ?></td>
                       
                        </tr>
                        <tr>
                          <td>Persediaan Sedikit</td>
                          <td><?= $PsdSe ?></td>
                        
                        </tr>
                        <tr>
                          <td>Persediaan Banyak</td>
                          <td><?= $PsdBa?></td>
                        
                        </tr>
                        <tr>
                          <td>Tenaga Kerja Sedikit</td>
                          <td><?= $TngSdk ?></td>
                         
                        </tr>
                        <tr>
                          <td>Tenaga Kerja Banyak</td>
                          <td><?= $TngByk ?></td>
                         
                        </tr>
                      </tbody>
                    </table>
                   <hr>
                   <p><strong>Hasil Dari Aturan</strong></p>
                   <table class="table table-responsive-sm table-bordered table-striped table-sm" style="text-align: center;">
                      <thead>
                        <tr>
                          <th>Aturan</th>
                          <th>Nilai MIN</th>
                          <th></th>
                          <th>Nilai Z</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Aturan 1</td>
                          <td><?= $a1 ?></td>
                          <td>----></td>
                          <td><?= $z1 ?></td>
                        </tr>
                        <tr>
                          <td>Aturan 2</td>
                          <td><?= $a2 ?></td>
                          <td>----></td>
                          <td><?= $z2 ?></td>
                       
                        </tr>
                        <tr>
                          <td>Aturan 3</td>
                          <td><?= $a3 ?></td>
                          <td>----></td>
                          <td><?= $z3 ?></td>
                        
                        </tr>
                        <tr>
                          <td>Aturan 4</td>
                          <td><?= $a4 ?></td>
                          <td>----></td>
                          <td><?= $z4 ?></td>
                        </tr>
                        <tr>
                          <td>Aturan 5</td>
                          <td><?= $a5 ?></td>
                          <td>----></td>
                          <td><?= $z5 ?></td>
                        </tr>
                        <tr>
                          <td>Aturan 6</td>
                          <td><?= $a6 ?></td>
                          <td>----></td>
                          <td><?= $z6 ?></td>
                        </tr>
                        <tr>
                          <td>Aturan 7</td>
                          <td><?= $a7 ?></td>
                          <td>----></td>
                          <td><?= $z7 ?></td>
                        </tr>
                        <tr>
                          <td>Aturan 8</td>
                          <td><?= $a8 ?></td>
                          <td>----></td>
                          <td><?= $z8 ?></td>
                        </tr>
                        
                      </tbody>
                    </table>
                    <hr>
                    <p><strong>Defuzzifikasi</strong></p>
                    <div class="form-group">
                     <p>Total Rata-rata dari tiap aturan =<strong><?= $z ?></strong></p>
                        <div class="text-align-center">
                           <h4>Produksi = <?= round($z,0,PHP_ROUND_HALF_DOWN) ?></h4>
                           <input type="hidden" name="z" value="<?= round($z,0,PHP_ROUND_HALF_DOWN) ?>">
                          </div>
                   </div>
                                         
                  </div>

                  
                  <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit">
                      <i class="fa fa-dot-circle-o"></i> Simpan</button>
                    
                      <a href="<?=site_url('produksi/C_produksi/hitung/'.$Id) ?>">
                      <button class="btn btn-sm btn-danger" >Kembali</button>
                      </a>
                  
                   </div>

                  </form>

                </div>


                 
                 
              
              </div>
              
              <!-- /.col-->
            </div>
          
        </div>
          
        </div>


       </main>
      </div>
<?php $this->load->view("includes/footer"); ?>


