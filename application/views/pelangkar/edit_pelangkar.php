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

                            <h3><i class="fas fa-edit ">Form Edit Pelanggaran</i></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->


                        <form method="post" action="<?= base_url('pelangkar/change') ?>" enctype="multipart/form-data">


                            <input type="hidden" name="id_pelanggaran" value="<?= $pelangkar->id_pelanggaran ?>">
                            <div class="card-body">
                                <div class="row ">
                                    <div
                                        class="col-md-5 pl-2 ml-2 rounded-top rounded-right rounded-left border border-dark border-bottom p-0 mb-0 pl-3 pr-3 ml-1">
                                        <div class="form-group text-info font-italic font-weight-bold ">
                                            <label for="nik">Ketikan nik Karyawan</label>
                                            <input type="text"
                                                class="form-control <?php echo form_error('nik') ? 'is-invalid' : '' ?>   "
                                                id="nik" name="nik" autocomplete="off" onkeyup="ketik()"
                                                value="<?= $this->input->post('nik') ? $this->input->post('nik') : $pelangkar->nik_karyawan ?>">
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

                                        <?php foreach ($kategori as $kate) : ?>
                                        <?php if ($kate->id_kategori == $pelangkar->id_kategori) : ?>
                                        <option value="<?= $kate->id_kategori ?>" selected><?= $kate->kategori ?>
                                        </option>
                                        <?php else : ?>
                                        <option value="<?= $kate->id_kategori ?>"><?= $kate->kategori ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('kategori'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ket_pelanggaran">Kronologis Pelanggaran</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('ket_pelanggaran') ? 'is-invalid' : '' ?>"
                                        id="ket_pelanggaran" name="ket_pelanggaran"
                                        value="<?= $this->input->post('ket_pelanggaran') ? $this->input->post('ket_pelanggaran') : $pelangkar->keterangan ?>"></input>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('ket_pelanggaran') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="waktu">Waktu</label>
                                    <input type="Datetime-local"
                                        class="form-control <?php echo form_error('waktu') ? 'is-invalid' : '' ?> "
                                        id="waktu" name="waktu" placeholder="waktu"
                                        value="<?= $this->input->post('waktu') ? $this->input->post('waktu') : $pelangkar->waktu ?>">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('waktu') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bukti">bukti</label>
                                    <div class="row">
                                        <div class="col-md-3">


                                            <img src="<?php echo base_url() . './assets/bukti/' . $pelangkar->bukti ?>"
                                                class="img-thumbnail mb-4" style="width: 100px;height:100px">
                                        </div>

                                    </div>
                                    <label for="bukti">Ganti bukti foto</label>
                                    <input type="file" class="form-control" id="bukti" name="bukti"
                                        value="<?= $pelangkar->bukti ?>">

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
                                    <span class="font-weight-bold text">Upadate</span></a></button>
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