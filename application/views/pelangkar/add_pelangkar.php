<!-- Content Header (Page header) -->
<div class="content-header">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">

                            <h3><i class="fas fa-edit ">Tambah Pelanggaran Karyawan</i></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row ">
                                    <div
                                        class="col-md-5 pl-2 ml-2 rounded-top rounded-right rounded-left border border-dark border-bottom p-0 mb-0 pl-3 pr-3 ml-1">
                                        <div class="form-group text-info font-italic font-weight-bold ">
                                            <label for="nik">Ketikan nik Karyawan</label>
                                            <input type="text"
                                                class="form-control <?php echo form_error('nik') ? 'is-invalid' : '' ?>   "
                                                id="nik" name="nik" autocomplete="off" onkeyup="ketik()">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('nik') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nama_karyawan">Nama Lengkap Karyawan</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('nama_karyawan') ? 'is-invalid' : '' ?>"
                                        id="nama_karyawan" name="nama_karyawan" readonly>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama_karyawan') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Departemen</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('departemen') ? 'is-invalid' : '' ?>"
                                        id="departemen" name="departemen" readonly>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('departemen') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="kategori">Kategori Pelanggaran</label>
                                    <select name="kategori" id="kategori"
                                        class="form-control custom-form <?= form_error('kategori') ? 'is-invalid' : '' ?>"
                                        name="kategori">
                                        <option selected hidden value="">-- Pilih Kategori --</option>
                                        <?php foreach ($kategori as $kate) { ?>
                                        <option value="<?= $kate->id_kategori ?>"
                                            <?= set_value('kategori') == "<?= $kate->id_kategori ?>" ? "selected" : ''
                                            ?>><?= $kate->kategori ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('kategori'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ket_pelanggaran">Kronologis Pelanggaran</label>
                                    <textarea type="text"
                                        class="form-control <?php echo form_error('ket_pelanggaran') ? 'is-invalid' : '' ?>"
                                        id="ket_pelanggaran" name="ket_pelanggaran"></textarea>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('ket_pelanggaran') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="waktu">Waktu</label>
                                    <input type="date"
                                        class="form-control <?php echo form_error('waktu') ? 'is-invalid' : '' ?>"
                                        id="waktu" name="waktu" placeholder="waktu">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('waktu') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bukti">Bukti Pelanggaran</label>
                                    <input type="file"
                                        class="form-control <?php echo form_error('bukti') ? 'is-invalid' : '' ?>"
                                        id="bukti" name="bukti" placeholder="bukti pelanggaran">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('bukti') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('pelangkar') ?>"
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
<script type="text/javascript">
function ketik() {
    var nik = $("#nik").val();
    $.ajax({

        url: "<?php echo base_url(); ?>/pelangkar/cari",
        data: "nik=" + nik,
        success: function(data) {
            var json = data;
            obj = JSON.parse(json);
            $('#nama_karyawan').val(obj.nama_lengkap);
            $('#departemen').val(obj.departemen);

        }

    });
}
</script>