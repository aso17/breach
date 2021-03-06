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
                            <h3><i class="fas fa-edit">Tambah Pelanggaran Visitor</i></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="" enctype="multipart/form-data">
                            <input type="hidden" name="idkunjungan" id="idkunjungan">
                            <div class="card-body">
                                <div class="row ">
                                    <div
                                        class="col-md-5 pl-2 ml-2 rounded-top rounded-right rounded-left border border-dark border-bottom p-0 mb-0 pl-3 pr-3 ml-1">
                                        <div class="form-group text-info font-italic font-weight-bold ">
                                            <label for="novisit">Ketikan id visitor</label>
                                            <input type="text"
                                                class="form-control <?php echo form_error('novisit') ? 'is-invalid' : '' ?>   "
                                                id="novisit" name="novisit" autocomplete="off" onkeyup="ketik()">
                                            <div class="invalid-feedback">
                                                <?php echo form_error('novisit') ?>
                                            </div>
                                        </div>
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
                                    <label for="perusahaan">Nama Perusahaan</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('perusahaan') ? 'is-invalid' : '' ?>"
                                        id="perusahaan" name="perusahaan" readonly></input>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('perusahaan') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea type="text"
                                        class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>"
                                        id="alamat" name="alamat" readonly></textarea>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('alamat') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nokendaraan">Nomor Kendaraan</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('nokendaraan') ? 'is-invalid' : '' ?>"
                                        id="nokendaraan" name="nokendaraan" readonly></input>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nokendaraan') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="jamin">Waktu Masuk</label>
                                    <input type="text"
                                        class="form-control <?php echo form_error('jamin') ? 'is-invalid' : '' ?>"
                                        id="jamin" name="jamin" placeholder="" readonly>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('jamin') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="waktu">Waktu pelanggaran</label>
                                    <input type="Datetime-local"
                                        class="form-control <?php echo form_error('waktu') ? 'is-invalid' : '' ?>"
                                        id="waktu" name="waktu" placeholder="waktu">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('waktu') ?>
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
                                    <label for="lampiran_ktp">Lampiran foto KTP</label>
                                    <input type="file"
                                        class="form-control <?php echo form_error('lampiran_ktp') ? 'is-invalid' : '' ?>"
                                        id="lampiran_ktp" name="lampiran_ktp" placeholder="">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('lampiran_ktp') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bukti">Bukti</label>
                                    <input type="file"
                                        class="form-control <?php echo form_error('bukti') ? 'is-invalid' : '' ?>"
                                        id="bukti" name="bukti" placeholder="">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('bukti') ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <a href="<?php echo base_url('pelangvis') ?>"
                                    class="btn btn-primary btn-icon-split btn-sm float-right"
                                    style="margin-bottom: 5px;"><span class="icon text-white-5">
                                        <i class="fas fa-arrow-circle-left"></i></span>
                                    <span class="font-weight-bold text">Kembali</span></a>
                                <button type="submit" class="btn btn-success btn-icon-split btn-sm float-right"
                                    style="margin-right: 5px;">
                                    <span class="icon text-white-5">
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
    var novisit = $("#novisit").val();
    $.ajax({

        url: "<?php echo base_url(); ?>/pelangvis/cari",
        data: "novisit=" + novisit,
        success: function(data) {
            var json = data;
            obj = JSON.parse(json);
            $('#idkunjungan').val(obj.id_kunjungan);
            $('#nama_visitor').val(obj.nama_visitor);
            $('#perusahaan').val(obj.nama_perusahaan);
            $('#alamat').val(obj.alamat);
            $('#nokendaraan').val(obj.no_kendaraan);
            $('#jamin').val(obj.jam_masuk);

        }

    });
}
</script>