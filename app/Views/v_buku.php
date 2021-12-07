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
                            <h4 class="modal-title">Default Modal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                            </button>
                     </div>
                     <form action="<?php echo base_url('Buku/simpan'); ?>" method="POST"></form>
                     <div class="modal-body">
                            <div class="form-group row">
                                   <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                   <div class="col-sm-10">
                                          <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                   </div>
                            </div>
                     </div>
                     <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                     </div>
              </div>
              <!-- /.modal-content -->
       </div>
       <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<?= $this->endSection(); ?>