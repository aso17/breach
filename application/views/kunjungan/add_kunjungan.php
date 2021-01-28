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
                            <h3><i class="fas fa-edit">Tambah Kunjungan</i></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="novisit">No Visitor</label>
                                    <input type="text" name="novisit" id="novisit" onkeyup="auto()"
                                        class="form-control <?php echo form_error('novisit') ? 'is-invalid' : '' ?>"
                                        autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('novisit') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_visitor">Nama Visitor</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('nama_visitor') ? 'is-invalid' : '' ?>"
                                        id="nama_visitor" name="nama_visitor" readonly>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_visitor') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>"
                                        id="alamat" name="alamat" readonly>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('alamat') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nama_perusahaan">Nama Perusahaan</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('nama_perusahaan') ? 'is-invalid' : '' ?>"
                                        id="nama_perusahaan" name="nama_perusahaan" readonly>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_perusahaan') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="no_kendaraan">No Kendaraan</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('no_kendaraan') ? 'is-invalid' : '' ?>"
                                        id="no_kendaraan" name="no_kendaraan">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('no_kendaraan') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bertemu">Bertemu</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('bertemu') ? 'is-invalid' : '' ?>"
                                        id="bertemu" name="bertemu">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('bertemu') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kepentingan">Kepentingan</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('kepentingan') ? 'is-invalid' : '' ?>"
                                        id="kepentingan" name="kepentingan">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('kepentingan') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jam_masuk">Jam Masuk</label>
                                    <input type="Datetime-local"
                                        class="form-control <?php echo form_error('jam_masuk') ? 'is-invalid' : '' ?>"
                                        id="jam_masuk" name="jam_masuk">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('jam_masuk') ?>
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

    <script type="text/javascript">
    function auto() {
        var novisit = $("#novisit").val();
        $.ajax({

            url: "<?php echo base_url(); ?>/kunjungan/cari",
            data: "novisit=" + novisit,
            success: function(data) {
                var json = data;
                obj = JSON.parse(json);
                $('#nama_visitor').val(obj.nama_visitor);
                $('#alamat').val(obj.alamat);
                $('#nama_perusahaan').val(obj.nama_perusahaan);

            }

        });
    }
    </script>