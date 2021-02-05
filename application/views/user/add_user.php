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
                            <h3><i class="fas fa-edit">Tambah User</i></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('nik') ? 'is-invalid' : '' ?>"
                                        id="nik" name="nik" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nik') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('username') ? 'is-invalid' : '' ?>"
                                        id="username" name="username">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('username') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password"
                                        class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>"
                                        id="password" name="password">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('password') ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="<?php echo base_url('user') ?>"
                                    class="btn btn-primary btn-icon-split btn-sm float-right"
                                    style="margin-bottom: 5px;"><span class="icon text-white-5">
                                        <i class="fas fa-arrow-circle-left"></i></span>
                                    <span class="font-weight-bold text">Kembali</span></a>
                                <button type="submit" class="btn btn-success btn-icon-split btn-sm float-right"
                                    style="margin-right: 5px;"><span class="icon text-white-5">
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
</div>
</div>