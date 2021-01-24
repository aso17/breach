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
                            <h3><i class="fas fa-edit">Edit Posisi</i></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_posisi">ID Posisi</label>
                                    <input type="hidden" value="<?= $posisi->id_posisi ?>" class="form-control" id="id_posisi" name="id_posisi">
                                    <input type="text" value="<?= $this->input->post('id_posisi') ? $this->input->post('id_posisi') : $posisi->id_posisi ?>" class="form-control <?php echo form_error('id_posisi') ? 'is-invalid' : '' ?>" id="id_posisi" name="id_posisi">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('id_posisi') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bagian">Bagian</label>
                                    <input type="text" value="<?= $this->input->post('bagian') ? $this->input->post('bagian') : $posisi->bagian ?>" class="form-control <?php echo form_error('bagian') ? 'is-invalid' : '' ?>" id="bagian" name="bagian">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('bagian') ?>
                                    </div>
                                </div>

                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <a href="<?php echo base_url('posisi') ?>" class="btn btn-primary btn-icon-split btn-sm float-right" style="margin-bottom: 5px;"><span class="icon text-white-5">
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