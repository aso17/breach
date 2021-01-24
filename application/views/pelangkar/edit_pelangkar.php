<!-- Content Header (Page header) -->
<div class="content-header">

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3><i class="fas fa-edit">Edit Pelanggaran Karyawan</i></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="nik_karyawan">NIK</label>
                  <input type="text" value="<?= $this->input->post('nik_karyawan') ? $this->input->post('nik_karyawan') : $pelangkar->nik_karyawan ?>" class="form-control <?php echo form_error('nik_karyawan') ? 'is-invalid' : '' ?>" id="nik_karyawan" name="nik_karyawan">
                  <div class="invalid-feedback">
                    <?php echo form_error('nik_karyawan') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama_karyawan">Nama Lengkap</label>
                  <input type="hidden" value="<?= $pelangkar->id_pelangkar ?>" class="form-control" id="id_pelangkar" name="id_pelangkar">
                  <input type="text" value="<?= $this->input->post('nama_karyawan') ? $this->input->post('nama_karyawan') : $pelangkar->nama_karyawan ?>" class="form-control <?php echo form_error('nama_karyawan') ? 'is-invalid' : '' ?>" id="nama_karyawan" name="nama_karyawan">
                  <div class="invalid-feedback">
                    <?php echo form_error('nama_karyawan') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="departemen">Departemen</label>
                  <select name="departemen" id="departemen" class="form-control custom-form <?= form_error('departemen') ? 'is-invalid' : '' ?>" name="departemen">

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

                    <?php foreach ($kriteria as $dt) { ?>
                      <option value="<?= $dt->id_kriteria ?>" <?= set_value('kriteria') == "<?= $dt->id_kriteria ?>" ? "selected" : '' ?>><?= $dt->kriteria ?></option>
                    <?php } ?>
                  </select>
                  <div class="invalid-feedback">
                    <?php echo form_error('kriteria'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="ket_pelanggaran">Keterangan Pelanggaran</label>
                  <input type="hidden" value="<?= $pelangkar->id_pelangkar ?>" class="form-control" id="id_pelangkar" name="id_pelangkar">
                  <input type="text" value="<?= $this->input->post('ket_pelanggaran') ? $this->input->post('ket_pelanggaran') : $pelangkar->ket_pelanggaran ?>" class="form-control <?php echo form_error('ket_pelanggaran') ? 'is-invalid' : '' ?>" id="ket_pelanggaran" name="ket_pelanggaran">
                  <div class="invalid-feedback">
                    <?php echo form_error('ket_pelanggaran') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="waktu">Tanggal</label>
                  <input type="hidden" value="<?= $pelangkar->id_pelangkar ?>" class="form-control" id="id_pelangkar" name="id_pelangkar">
                  <input type="date" value="<?= $this->input->post('waktu') ? $this->input->post('waktu') : $pelangkar->waktu ?>" class="form-control <?php echo form_error('waktu') ? 'is-invalid' : '' ?>" id="waktu" name="waktu" placeholder="tanggal">
                  <div class="invalid-feedback">
                    <?php echo form_error('waktu') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="bukti">Bukti Pelanggaran</label>
                  <input type="hidden" value="<?= $pelangkar->id_pelangkar ?>" class="form-control" id="id_pelangkar" name="id_pelangkar">
                  <input type="file" value="<?= $this->input->post('bukti') ? $this->input->post('bukti') : $pelangkar->bukti ?>" class="form-control <?php echo form_error('bukti') ? 'is-invalid' : '' ?>" id="bukti" name="bukti" placeholder="bukti">
                  <div class="invalid-feedback">
                    <?php echo form_error('bukti') ?>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="<?php echo base_url('pelangkar') ?>" class="btn btn-primary btn-icon-split btn-sm float-right" style="margin-bottom: 5px;"><span class="icon text-white-5">
                    <i class="fas fa-arrow-circle-left"></i></span>
                  <span class="font-weight-bold text">Kembali</span></a>
                <button type="submit" class="btn btn-success btn-icon-split btn-sm float-right" style="margin-right: 5px;"><span class="icon text-white-5">
                    <i class="fas fa-pencil-alt"></i></span>
                  <span class="font-weight-bold text">Update</span></a></button>

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