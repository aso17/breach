<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-12 col-md-8">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h3 text-grey-900 mb-2">Aplikasi Pendataan Pelanggaran</h1>
                                    </div>
                                    <div class="text-center">
                                        <img src="<?php echo base_url('assets/img/logobaru.png') ?>" alt="Image" height="200px" width="200px" class="mb-3">
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-grey-900 mb-1">Masuk | JtOne</h1>
                                    </div>
                                    <form class="user" method="POST" action="<?= base_url('auth/login'); ?> ">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username" placeholder="Masukkan Username Anda" value="<?= set_value('username') ?>" name="username">
                                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="password" placeholder="Masukkan Password Anda" name="password">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary form-control">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>