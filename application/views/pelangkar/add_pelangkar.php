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
              <h3><i class="fas fa-edit">Tambah Pelanggaran Karyawan</i></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="nik_karyawan">NIK</label>
                  <input type="text" class="form-control <?php echo form_error('nik_karyawan') ? 'is-invalid' : '' ?>" id="nik_karyawan" name="nik_karyawan">
                  <div class="invalid-feedback">
                    <?php echo form_error('nik_karyawan') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama_karyawan">Nama Karyawan</label>
                  <input type="text" class="form-control <?php echo form_error('nama_karyawan') ? 'is-invalid' : '' ?>" id="nama_karyawan" name="nama_karyawan">
                  <div class="invalid-feedback">
                    <?php echo form_error('nama_karyawan') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="departemen">Departemen</label>
                  <select name="departemen" id="departemen" class="form-control custom-form <?= form_error('departemen') ? 'is-invalid' : '' ?>" name="departemen">
                    <option selected hidden value="">-- Pilih Departemen --</option>
                    <?php foreach ($departemen as $dt) { ?>
                      <option value="<?= $dt->id_dept ?>" <?= set_value('departemen') == "<?= $dt->id_dept ?>" ? "selected" : '' ?>><?= $dt->departemen ?></option>
                    <?php } ?>
                  </select>
                  <div class="invalid-feedback">
                    <?php echo form_error('departemen'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="kriteria">Kategori Pelanggaran</label>
                  <select name="kriteria" id="kriteria" class="form-control custom-form <?= form_error('kriteria') ? 'is-invalid' : '' ?>" name="kriteria">
                    <option selected hidden value="">-- Pilih Kategori --</option>
                    <?php foreach ($kriteria as $dt) { ?>
                      <option value="<?= $dt->id_kriteria ?>" <?= set_value('kriteria') == "<?= $dt->id_kriteria ?>" ? "selected" : '' ?>><?= $dt->kriteria ?></option>
                    <?php } ?>
                  </select>
                  <div class="invalid-feedback">
                    <?php echo form_error('kriteria'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="ket_pelanggaran">Kronologis Pelanggaran</label>
                  <textarea type="text" class="form-control <?php echo form_error('ket_pelanggaran') ? 'is-invalid' : '' ?>" id="ket_pelanggaran" name="ket_pelanggaran"></textarea>
                  <div class="invalid-feedback">
                    <?php echo form_error('ket_pelanggaran') ?>
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
                  <label for="bukti">Bukti Pelanggaran</label>
                  <input type="file" class="form-control <?php echo form_error('bukti') ? 'is-invalid' : '' ?>" id="bukti" name="bukti" placeholder="bukti pelanggaran">
                  <div class="invalid-feedback">
                    <?php echo form_error('bukti') ?>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <a href="<?php echo base_url('pelangkar') ?>" class="btn btn-primary btn-icon-split btn-sm float-right" style="margin-bottom: 5px;"><span class="icon text-white-5">
                    <i class="fas fa-arrow-circle-left"></i></span>
                  <span class="font-weight-bold text">Kembali</span></a>
                <button type="submit" class="btn btn-success btn-icon-split btn-sm float-right" style="margin-right: 5px;"><span class="icon text-white-5">
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