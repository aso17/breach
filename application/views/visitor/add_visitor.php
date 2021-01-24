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
              <h3><i class="fas fa-edit">Tambah Visitor</i></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="">
              <div class="card-body">
                <div class="form-group">
                  <label for="no_ktp">No KTP</label>
                  <input type="text" class="form-control <?php echo form_error('no_ktp') ? 'is-invalid' : '' ?>" id="no_ktp" name="no_ktp">
                  <div class="invalid-feedback">
                    <?php echo form_error('no_ktp') ?>
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
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" id="alamat" name="alamat" placeholder="nama alamat">
                  <div class="invalid-feedback">
                    <?php echo form_error('alamat') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama_perusahaan">Nama Perusahaan</label>
                  <input type="text" class="form-control <?php echo form_error('nama_perusahaan') ? 'is-invalid' : '' ?>" id="nama_perusahaan" name="nama_perusahaan">
                  <div class="invalid-feedback">
                    <?php echo form_error('nama_perusahaan') ?>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="<?php echo base_url('visitor') ?>" class="btn btn-primary btn-icon-split btn-sm float-right" style="margin-bottom: 5px;"><span class="icon text-white-5">
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