<?= $this->extend('layout/template') ?>
<?= $this->section('content'); ?>
<section class="content-header">
       <div class="container-fluid">
              <div class="row mb-2">
                     <div class="col-sm-6">
                            <h1>Data Buku</h1>
                     </div>
              </div>
       </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
       <div class="container-fluid">
              <div class="row">
                     <div class="col-12">
                            <div class="card">
                                   <!-- /.card-header -->
                                   <div class="card-header">
                                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                                                 + Tambah Data
                                          </button>
                                   </div>

                                   <div class="card-body">
                                          <table id="example2" class="table table-bordered table-hover">
                                                 <thead>
                                                        <tr>
                                                               <th style="width: 10px">No.</th>
                                                               <th>Judul Buku</th>
                                                               <th>Pengarang</th>
                                                               <th>Penerbit</th>
                                                               <th>Tahun Terbit</th>
                                                        </tr>
                                                 </thead>
                                                 <tbody>
                                                        <?php $no = 1;
                                                        foreach ($dataBuku as $row) : ?>
                                                               <tr>
                                                                      <td><?= $no++; ?></td>
                                                                      <td><?= $row->judul_bk ?></td>
                                                                      <td><?= $row->pengarang ?></td>
                                                                      <td><?= $row->penerbit ?></td>
                                                                      <td><?= $row->thn_terbit ?></td>
                                                               </tr>
                                                        <?php endforeach ?>
                                                 </tbody>
                                          </table>
                                   </div>
                            </div>
                     </div>
              </div>
       </div>
</section>
<!-- /.content -->


<div class="modal fade" id="modal-default">
       <div class="modal-dialog">
              <div class="modal-content">
                     <div class="modal-header">
                            <h4 class="modal-title">Form Tambah Data Buku</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                            </button>
                     </div>
                     <form action="<?php echo base_url('Buku/simpan'); ?>" method="POST">
                            <div class="modal-body">
                                   <div class="form-group row">
                                          <label for="idBuku" class="col-sm-3 col-form-label">ID Buku</label>
                                          <div class="col-sm-9">
                                                 <input type="text" class="form-control" id="idBuku" name="idBuku" placeholder="ID Buku">
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <label for="judulBuku" class="col-sm-3 col-form-label">Judul Buku</label>
                                          <div class="col-sm-9">
                                                 <input type="text" class="form-control" id="judulBuku" name="judulBuku" placeholder="Judul Buku">
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <label for="pengarang" class="col-sm-3 col-form-label">Pengarang</label>
                                          <div class="col-sm-9">
                                                 <input type="text" class="form-control" id="pengarang" name="pengarang" placeholder="Pengarang">
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <label for="penerbit" class="col-sm-3 col-form-label">Penerbit</label>
                                          <div class="col-sm-9">
                                                 <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Penerbit">
                                          </div>
                                   </div>
                                   <div class="form-group row">
                                          <label for="tahunTerbit" class="col-sm-3 col-form-label">Tahun Terbit</label>
                                          <div class="col-sm-9">
                                                 <input type="number" class="form-control" id="tahunTerbit" name="tahunTerbit" placeholder="Tahun Terbit">
                                          </div>
                                   </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                   <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                   <button type="submit" class="btn btn-success"><i class="far fa-check-circle pr-2" aria-hidden="true"></i>Simpan</button>
                            </div>
                     </form>
              </div>
              <!-- /.modal-content -->
       </div>
       <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<?= $this->endSection(); ?>