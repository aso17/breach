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
                            <h3><i class="fas fa-edit">Edit Password</i></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="password">Masukan Password Lama</label>
                                    <input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" id="password" name="password">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('password') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Masukan Password Baru</label>
                                    <input type="password" class="form-control <?php echo form_error('password_baru') ? 'is-invalid' : '' ?>" id="password" name="password_baru">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('password_baru') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Konfirmasi Password Baru </label>
                                    <input type="password" class="form-control <?php echo form_error('password_konfir') ? 'is-invalid' : '' ?>" id="password" name="password_konfir">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('password_konfir') ?>
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