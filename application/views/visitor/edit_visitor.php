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
                            <h3><i class="fas fa-edit">Edit Visitor</i></h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_visitor">Nomor Visitor</label>
                                    <input type="text"
                                        value="<?= $this->input->post('id_visitor') ? $this->input->post('id_visitor') : $visitor->id_visitor ?>"
                                        class="form-control <?php echo form_error('id_visitor') ? 'is-invalid' : '' ?>"
                                        id="id_visitor" name="id_visitor" placeholder="id_visitor">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('id_visitor') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="no_ktp">Nomer Ktp</label>
                                    <input type="text"
                                        value="<?= $this->input->post('no_ktp') ? $this->input->post('no_ktp') : $visitor->no_ktp ?>"
                                        class="form-control <?php echo form_error('no_ktp') ? 'is-invalid' : '' ?>"
                                        id="no_ktp" name="no_ktp" placeholder="no_ktp">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('no_ktp') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nama_visitor">Nama Visitor</label>

                                    <input type="text"
                                        value="<?= $this->input->post('nama_visitor') ? $this->input->post('nama_visitor') : $visitor->nama_visitor ?>"
                                        class="form-control <?php echo form_error('nama_visitor') ? 'is-invalid' : '' ?>"
                                        id="nama_visitor" name="nama_visitor" placeholder="nama_visitor">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_visitor') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text"
                                        value="<?= $this->input->post('alamat') ? $this->input->post('alamat') : $visitor->alamat ?>"
                                        class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>"
                                        id="alamat" name="alamat">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('alamat') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_perusahaan">Nama Perusahaan</label>
                                    <input type="text"
                                        value="<?= $this->input->post('nama_perusahaan') ? $this->input->post('nama_perusahaan') : $visitor->nama_perusahaan ?>"
                                        class="form-control <?php echo form_error('nama_perusahaan') ? 'is-invalid' : '' ?>"
                                        id="nama_perusahaan" name="nama_perusahaan">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_perusahaan') ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="<?php echo base_url('visitor') ?>"
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