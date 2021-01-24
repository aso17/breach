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
              <h3><i class="fas fa-edit">Edit Pelanggaran Visitor</i></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="nik_visitor">NIK KTP</label>
                  <input type="text" value="<?= $this->input->post('nik_visitor') ? $this->input->post('nik_visitor') : $pelangvis->nik_visitor ?>" class="form-control <?php echo form_error('nik_visitor') ? 'is-invalid' : '' ?>" id="nik_visitor" name="nik_visitor">
                  <div class="invalid-feedback">
                    <?php echo form_error('nik_visitor') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama_visitor">Nama Lengkap</label>
                  <input type="hidden" value="<?= $pelangvis->id_pelangvis ?>" class="form-control" id="id_pelangvis" name="id_pelangvis">
                  <input type="text" value="<?= $this->input->post('nama_visitor') ? $this->input->post('nama_visitor') : $pelangvis->nama_visitor ?>" class="form-control <?php echo form_error('nama_visitor') ? 'is-invalid' : '' ?>" id="nama_visitor" name="nama_visitor">
                  <div class="invalid-feedback">
                    <?php echo form_error('nama_visitor') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="tamu">Tamu</label>
                  <select name="tamu" id="tamu" class="form-control custom-form <?= form_error('tamu') ? 'is-invalid' : '' ?>" name="tamu">

                    <?php foreach ($tamu as $dt) { ?>
                      <option value="<?= $dt->id_visitor ?>" <?= set_value('tamu') == "<?= $dt->id_visitor ?>" ? "selected" : '' ?>><?= $dt->visitor ?></option>
                    <?php } ?>
                  </select>
                  <div class="invalid-feedback">
                    <?php echo form_error('tamu'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat Lengkap</label>
                  <input type="text" value="<?= $this->input->post('alamat') ? $this->input->post('alamat') : $pelangvis->alamat ?>" class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" id="alamat" name="alamat">
                  <div class="invalid-feedback">
                    <?php echo form_error('alamat') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="kriteria_pelanggaran">Kategori Pelanggaran</label>
                  <select name="kriteria_pelanggaran" id="kriteria_pelanggaran" class="form-control custom-form <?= form_error('kriteria_pelanggaran') ? 'is-invalid' : '' ?>" name="kriteria_pelanggaran">

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
                  <input type="text" value="<?= $this->input->post('keterangan') ? $this->input->post('keterangan') : $pelangvis->keterangan ?>" class="form-control <?php echo form_error('keterangan') ? 'is-invalid' : '' ?>" id="keterangan" name="keterangan">
                  <div class="invalid-feedback">
                    <?php echo form_error('keterangan') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="waktu">Tanggal</label>
                  <input type="hidden" value="<?= $pelangvis->id_pelangvis ?>" class="form-control" id="id_pelangvis" name="id_pelangvis">
                  <input type="date" value="<?= $this->input->post('waktu') ? $this->input->post('waktu') : $pelangvis->waktu ?>" class="form-control <?php echo form_error('waktu') ? 'is-invalid' : '' ?>" id="waktu" name="waktu" placeholder="tanggal">
                  <div class="invalid-feedback">
                    <?php echo form_error('waktu') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="bukti_pelanggaran">Bukti Pelanggaran</label>
                  <input type="file" value="<?= $this->input->post('bukti_pelanggaran') ? $this->input->post('bukti_pelanggaran') : $pelangvis->bukti_pelanggaran ?>" class="form-control <?php echo form_error('bukti_pelanggaran') ? 'is-invalid' : '' ?>" id="bukti_pelanggaran" name="bukti_pelanggaran" placeholder="Bukti Pelanggaran">
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