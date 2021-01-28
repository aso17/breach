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
                            <h3><i class="fas fa-edit">Tambah Karyawan</i></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nik_karyawan">NIK Karyawan</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('nik_karyawan') ? 'is-invalid' : '' ?>"
                                        id="nik_karyawan" name="nik_karyawan"
                                        value="<?php echo set_value('nik_karyawan'); ?>">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nik_karyawan') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Karyawan</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('nama_lengkap') ? 'is-invalid' : '' ?>"
                                        id="nama_lengkap" name="nama_lengkap"
                                        value="<?php echo set_value('nama_lengkap'); ?>">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_lengkap') ?>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="departemen">Departemen</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('departemen') ? 'is-invalid' : '' ?>"
                                        id="departemen" name="departemen"
                                        value="<?php echo set_value('departemen'); ?>">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('departemen') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="id_posisi">Bagian</label>
                                    <select name="id_posisi" id="id_posisi"
                                        class="form-control custom-form <?= form_error('id_posisi') ? 'is-invalid' : '' ?>"
                                        name="id_posisi">
                                        <option selected hidden value="">-- Pilih Bagian --</option>
                                        <?php foreach ($id_posisi as $dt) { ?>
                                        <option value="<?= $dt->id_posisi ?>"
                                            <?= set_value('id_posisi') == "<?= $dt->id_posisi ?>" ? "selected" : '' ?>
                                            ><?= $dt->level ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('kriteria_pelanggaran'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="j_kelamin">Jenis Kelamin</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('j_kelamin') ? 'is-invalid' : '' ?>"
                                        id="j_kelamin" name="j_kelamin" value="<?php echo set_value('j_kelamin'); ?>">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('j_kelamin') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>"
                                        id="email" name="email" value="<?php echo set_value('j_kelamin'); ?>">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('email') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="telp">Telepon</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('telp') ? 'is-invalid' : '' ?>"
                                        id="telp" name="telp" value="<?php echo set_value('j_kelamin'); ?>">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('telp') ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="<?php echo base_url('karyawan') ?>"
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