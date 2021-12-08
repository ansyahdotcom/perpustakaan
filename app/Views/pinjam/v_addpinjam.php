<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Peminjaman Buku</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <form action="pinjam/save" method="POST">
                        <?= csrf_field(); ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Siswa</label>
                                <select class="form-control select2bs4" style="width: 100%;" name='nis' required>
                                    <?php foreach ($siswa as $sis) : ?>
                                        <option value="<?= $sis['nis']; ?>"><?= $sis['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Buku</label>
                                <select class="form-control select2bs4" style="width: 100%;" name='id_bk' required>
                                    <?php foreach ($buku as $bk) : ?>
                                        <option value="<?= $bk['id_bk']; ?>"><?= $bk['judul_bk'] . ' | Stok : ' . $bk['stok']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Pinjam</label>
                                <div class="col-md-2">
                                    <input type="number" class="form-control" name="jml_pinjam" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pinjam</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input type="text" class="form-control datetimepicker-input" name="tgl_pinjam" data-target="#reservationdate" placeholder="klik icon tanggal" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Wajib Kembali</label>
                                <div class="input-group date" id="kembali" data-target-input="nearest">
                                    <div class="input-group-append" data-target="#kembali" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                    <input type="text" class="form-control datetimepicker-input datepick" data-target="#kembali" placeholder="klik icon tanggal" />
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control datepick" readonly name="tgl_wajib_kembali" data-target="#kembali" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>