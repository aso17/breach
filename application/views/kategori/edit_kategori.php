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
                            <h3><i class="fas fa-edit">Edit Kategori Pelanggaran</i></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="<?= base_url('kategori/change') ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kategori">Kategori Pelanggaran</label>
                                    <input type="hidden" value="<?= $kategori->id_kategori ?>" class="form-control"
                                        id="id_kategori" name="id_kategori">
                                    <input type="text"
                                        value="<?= $this->input->post('kategori') ? $this->input->post('kategori') : $kategori->kategori ?>"
                                        class="form-control <?php echo form_error('kategori') ? 'is-invalid' : '' ?>"
                                        id="kategori" name="kategori">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('kategori') ?>
                                    </div>
                                </div>

                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <a href="<?php echo base_url('kategori') ?>"
                                        class="btn btn-primary btn-icon-split btn-sm float-right"
                                        style="margin-bottom: 5px;"><span class="icon text-white-5">
                                            <i class="fas fa-arrow-circle-left"></i></span>
                                        <span class="font-weight-bold text">Kembali</span></a>
                                    <button type="submit" class="btn btn-success btn-icon-split btn-sm float-right"
                                        style="margin-right: 5px;"><span class="icon text-white-5">
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