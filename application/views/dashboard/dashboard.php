<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style type="text/css">
        .page1 {
            font-size: 16px;
            line-height: 8px;
        }

        .page2 {
            font-size: 16px;
            line-height: 15px;
        }
    </style>
</head>

<body>


    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-center mb-4">
            <h1 class="h4 mb-0 font-weight-bold text-gray-800 text-uppercase mb-1">Kategori Pelanggaran</h1>
        </div>

        <!-- Content Row -->
        <div class="row justify-content-left">

            <!-- Pelanggaran Ringan -->
            <div class="col-xl-4 col-md-5 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h6 mb-0 font-weight-bold text-grey-800 text-uppercase mb-1">Pelanggaran Ringan</div>
                                <div class="text-xs font-weight-bold text-primary">
                                    <a class="button" data-toggle="modal" data-target="#modal-ringan">
                                        <span class="font-weight-bold">Desc</span></a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Ringan -->
            <div class="modal fade" id="modal-ringan" tabindex="-1" data-bs-keyboard="false" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p class="page2">Berikut adalah kategori pelanggaran ringan :</p>
                            <p class="page1">1. Mengucapkan/menulis kata yang tidak sopan</p>
                            <p class="page1">2. Memasuki ruangan yang ada tanda "Dilarang Masuk!"</p>
                            <p class="page1">3. Berjualan didalam perusahaan</p>
                            <p class="page1">4. Menggunakan barang milik perusahaan untuk urusan pribadi</p>
                            <p class="page1">5. Memakai perhiasan didalam produksi</p>
                            <p class="page1">6. Mengabaikan, bermalas-malasan, bergurau pada saat bekerja</p>
                            <p class="page1">7. Membawa produk kompetitor</p>
                            <p class="page1">8. Menggunakan parfum kedalam produksi</p>
                            <p class="page1">9. Parkir kendaraan sembarangan didalam perusahaan</p>
                            <p class="page1">10. Membawa produk kompetitor</p>
                            <p class="page1">11. Memanjangkan rambut dan kuku</p>
                            <p class="page1">12. Mencabut atau merobek pengumuman resmi dari perusahaan</p>
                            <p class="page1">13. Menerima imbalan apapun dari pihak yang mempunyai relasi dengan perusahaan</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pelanggaran Sedang -->
            <div class="col-xl-4 col-md-5 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h6 mb-0 font-weight-bold text-grey-800 text-uppercase mb-1">Pelanggaran Sedang</div>
                                <div class=" text-xs font-weight-bold text-primary">
                                    <a class="button" data-toggle="modal" data-target="#modal-sedang">
                                        <span class="font-weight-bold">Desc</span></a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Sedang -->
            <div class="modal fade" id="modal-sedang" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p class="page2">Berikut adalah kategori pelanggaran sedang :</p>
                            <p class="page1">1. Melakukan pungutan-pungutan didalam perusahaan tanda ijin manajemen</p>
                            <p class="page1">2. Membuat tulisan, coretan dan gambar pada seragam kerja</p>
                            <p class="page1">3. Bermain game pada jam kerja</p>
                            <p class="page1">4. Tidur pada jam kerja</p>
                            <p class="page1">5. Menyebarluaskan berita/kejadian-kejadian dilingkungan perusahaan</p>
                            <p class="page1">6. Mencoret-coret, menggambar di dinding ataupun aset perusahaan</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pelanggaran Berat -->
            <div class="col-xl-4 col-md-5 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h6 mb-0 font-weight-bold text-grey-800 text-uppercase mb-1">Pelanggaran Berat</div>
                                <div class=" text-xs font-weight-bold text-primary">
                                    <a class="button" data-toggle="modal" data-target="#modal-berat">
                                        <span class="font-weight-bold">Desc</span></a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal Sedang -->
            <div class="modal fade" id="modal-berat" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-scrollable modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <p class="page2">Berikut adalah kategori pelanggaran Berat :</p>
                            <p class="page1">1. Melakukan penipuan, pencurian, penggelapan barang milik perusahaan atau teman kerja</p>
                            <p class="page1">2. Memberikan keterangan palsu atau yang dipalsukan sehingga merugikan perusahaan</p>
                            <p class="page1">3. Membawa senjata tajam, senjata api/benda-benda lain yang membahayakan orang kedalam perusahaan</p>
                            <p class="page1">4. Menganiyaya, mengancam dan menghina atasan ataupun teman kerja</p>
                            <p class="page1">5. Membawa, menyimpan, mengedarkan & memakai miras, ganja, narkoba & narkotika kedalam perusahaan</p>
                            <p class="page1">6. Berjudi didalam perusahaan</p>
                            <p class="page1">7. Makan, minum, merokok di tempat yang diberi tanda "Larangan!"</p>
                            <p class="page1">8. Berkelahi dengan teman sekerja di dalam perusahaan maupun diluar perusahaan</p>
                            <p class="page1">9. Membujuk, menghasut, menjebak atasan atau teman kerja untuk melakukan melanggar hukum</p>
                            <p class="page1">10. Meludah sembarangan dilingkungan perusahaan</p>
                            <p class="page1">11. Membuang sampah atau limbah apapun tidak pada tempatnya</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<link href="<?php echo base_url('assets/chart.js/Chart.js') ?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>
<?php


?>
<div>

    <body>
        <div style="width: 800px; margin:0px auto;">
            <canvas id="myChart"></canvas>

        </div>
        <script>
            var barChartData = {
                labels: [
                    "Pelanggaran Ringan",
                    "Pelanggaran Sedang",
                    "Pelanggaran Berat",
                ],

                datasets: [{
                        label: "Pelanggaran Karyawan",
                        backgroundColor: "red",
                        borderColor: "pink",
                        borderWidth: 1,
                        data: [<?php echo $this->db->query("select * from tb_pelangkar where kriteria='5feea0645334'")->num_rows(); ?>,
                            <?php echo $this->db->query("select * from tb_pelangkar where kriteria='5feea48629aa'")->num_rows(); ?>, <?php echo $this->db->query("select * from tb_pelangkar where kriteria='5feea67db0d5'")->num_rows(); ?>
                        ]
                    },
                    {
                        label: "Pelanggaran Visitor",
                        backgroundColor: "blue",
                        borderColor: "lightblue",
                        borderWidth: 1,
                        data: [<?php echo $this->db->query("select * from tb_pelangvis where kriteria_pelanggaran='5feea0645334'")->num_rows(); ?>, <?php echo $this->db->query("select * from tb_pelangvis where kriteria_pelanggaran='5feea48629aa'")->num_rows(); ?>, <?php echo $this->db->query("select * from tb_pelangvis where kriteria_pelanggaran='5feea67db0d5'")->num_rows(); ?>]
                    },
                ]
            };

            var chartOptions = {
                responsive: true,
                legend: {
                    position: "top"
                },
                title: {
                    display: true,
                    text: "Grafik Pelanggaran"
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }

            var ctx = document.getElementById("myChart").getContext("2d");
            window.myBar = new Chart(ctx, {
                type: "bar",
                data: barChartData,
                options: chartOptions
            });
        </script>
    </body>
</div>

</html>