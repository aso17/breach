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
              <h3><i class="fas fa-edit">Edit User</i></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" action="">
              <div class="card-body">
                <div class="form-group">
                  <label for="nik">NIK</label>
                  <input type="text" value="<?= $this->input->post('nik') ? $this->input->post('nik') : $user->nik ?>" class="form-control <?php echo form_error('nik') ? 'is-invalid' : '' ?>" id="nik" name="nik">
                  <div class="invalid-feedback">
                    <?php echo form_error('nik') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama_lengkap">Nama Lengkap</label>
                  <input type="hidden" value="<?= $user->id_user ?>" class="form-control" id="id_user" name="id_user">
                  <input type="text" value="<?= $this->input->post('nama_lengkap') ? $this->input->post('nama_lengkap') : $user->nama_lengkap ?>" class="form-control <?php echo form_error('nama_lengkap') ? 'is-invalid' : '' ?>" id="nama_lengkap" name="nama_lengkap">
                  <div class="invalid-feedback">
                    <?php echo form_error('nama_lengkap') ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" value="<?= $this->input->post('username') ? $this->input->post('username') : $user->username ?>" class="form-control <?php echo form_error('username') ? 'is-invalid' : '' ?>" id="username" name="username">
                  <div class="invalid-feedback">
                    <?php echo form_error('username') ?>
                  </div>

                </div>
                <div class="form-group col-md-6">
                  <label for="level">Level</label>
                  <select id="level" value="<?= $this->input->post('level') ? $this->input->post('level') : $user->level ?>" class="form-control <?php echo form_error('level') ? 'is-invalid' : '' ?>" id="level" name="level">
                    <div class="invalid-feedback">
                      <?php echo form_error('level') ?>
                    </div>
                    <?php $level = $this->input->post('level') ? $this->input->post('level') : $user->level ?>
                    <option value="1" <?= $this == "1" ? "selected" : '' ?>> Admin</option>
                    <option value="2" <?= $this == "2" ? "selected" : '' ?>> Security</option>
                    <option value="3" <?= $this == "3" ? "selected" : '' ?>> IRGA</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" value="<?= $this->input->post('password') ? $this->input->post('password') : $user->password ?>" class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" id="password" name="password">
                  <div class="invalid-feedback">
                    <?php echo form_error('password') ?>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="<?php echo base_url('user') ?>" class="btn btn-primary btn-icon-split btn-sm float-right" style="margin-bottom: 5px;"><span class="icon text-white-5">
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