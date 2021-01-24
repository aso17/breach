<!-- Content Header (Page header) -->
<div class="content-header">

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-8">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3><i class="fas fa-edit">Tambah Pelanggaran Visitor</i></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="nik_visitor">NIK KTP</label>
                  <input type="text" class="form-control <?php echo form_error('nik_visitor') ? 'is-invalid' : '' ?>" id="nik_visitor" name="nik_visitor">
                  <div class="invalid-feedback">
                    <?php echo form_error('nik_visitor') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama_visitor">Nama Visitor</label>
                  <input type="text" class="form-control <?php echo form_error('nama_visitor') ? 'is-invalid' : '' ?>" id="nama_visitor" name="nama_visitor">
                  <div class="invalid-feedback">
                    <?php echo form_error('nama_visitor') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="tamu">Tamu</label>
                  <select name="tamu" id="tamu" class="form-control custom-form <?= form_error('tamu') ? 'is-invalid' : '' ?>" name="tamu">
                    <option selected hidden value="">-- Pilih Tamu --</option>
                    <?php foreach ($tamu as $dt) { ?>
                      <option value="<?= $dt->id_visitor ?>" <?= set_value('tamu') == "<?= $dt->id_visitor ?>" ? "selected" : '' ?>><?= $dt->visitor ?></option>
                    <?php } ?>
                  </select>
                  <div class="invalid-feedback">
                    <?php echo form_error('status'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea type="text" class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" id="alamat" name="alamat"></textarea>
                  <div class="invalid-feedback">
                    <?php echo form_error('alamat') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="kriteria_pelanggaran">Kategori Pelanggaran</label>
                  <select name="kriteria_pelanggaran" id="kriteria_pelanggaran" class="form-control custom-form <?= form_error('kriteria_pelanggaran') ? 'is-invalid' : '' ?>" name="kriteria_pelanggaran">
                    <option selected hidden value="">-- Pilih Kategori --</option>
                    <?php foreach ($kriteria_pelanggaran as $dt) { ?>
                      <option value="<?= $dt->id_kriteria ?>" <?= set_value('kriteria_pelanggaran') == "<?= $dt->id_kriteria ?>" ? "selected" : '' ?>><?= $dt->kriteria ?></option>
                    <?php } ?>
                  </select>
                  <div class="invalid-feedback">
                    <?php echo form_error('kriteria_pelanggaran'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="keterangan">Keterangan Pelanggaran</label>
                  <textarea type="text" class="form-control <?php echo form_error('keterangan') ? 'is-invalid' : '' ?>" id="keterangan" name="keterangan"></textarea>
                  <div class="invalid-feedback">
                    <?php echo form_error('keterangan') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="waktu">Waktu</label>
                  <input type="date" class="form-control <?php echo form_error('waktu') ? 'is-invalid' : '' ?>" id="waktu" name="waktu" placeholder="waktu">
                  <div class="invalid-feedback">
                    <?php echo form_error('waktu') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="bukti_pelanggaran">Bukti Pelanggaran</label>
                  <input type="file" class="form-control <?php echo form_error('bukti_pelanggaran') ? 'is-invalid' : '' ?>" id="bukti_pelanggaran" name="bukti_pelanggaran" placeholder="bukti pelanggaran">
                  <div class="invalid-feedback">
                    <?php echo form_error('bukti_pelanggaran') ?>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="<?php echo base_url('pelangvis') ?>" class="btn btn-primary btn-icon-split btn-sm float-right" style="margin-bottom: 5px;"><span class="icon text-white-5">
                    <i class="fas fa-arrow-circle-left"></i></span>
                  <span class="font-weight-bold text">Kembali</span></a>
                <button type="submit" class="btn btn-success btn-icon-split btn-sm float-right" style="margin-right: 5px;">
                  <span class="icon text-white-5">
                    <i class="fas fa-save"></i></span>
                  <span class="font-weight-bold text">Simpan</span></a></button>
              </div>
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>
  <!-- /.content -->
</div>