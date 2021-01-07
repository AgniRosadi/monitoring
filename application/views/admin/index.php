        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pakan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sampling['pakan'] ?> Kg</div>

                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendapatan</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?= $parsialnya['pemasukan']; ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <?php $s = $this->db->query("SELECT count(id_kolam) as jumlah FROM data_kolam")->row_array(); ?>

                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Kolam</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $s['jumlah'] ?></div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pengguna</div>
                                    <?php $s = $this->db->query("SELECT count(id) as jumlah FROM user")->row_array(); ?>

                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $s['jumlah'] ?> Orang</div>

                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Pendapatan Parsial</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Action</div>
                                    <a class="dropdown-item" href="<?= base_url('data/parsial/parsial') ?>">Cek Data Parsial</a>

                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Kualitas Air</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Action</div>
                                    <a class="dropdown-item" href="<?= base_url('data') ?>">Cek Data Air</a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body responsive">

                            <div class="row">
                                <div class="col-sm-12 mb-4">
                                    <select id="kode_kolam" name="kode_kolam" class="form-control">
                                        <option value="">--pilih kolam --</option>
                                        <?php foreach ($kolamnya as $a) : ?>

                                            <option value="<?= $a['kode_kolam']; ?>"><?= $a['kode_kolam']; ?>

                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row text-center responsive" id="kl">
                                <div class="col-md-6 responsive">
                                    <image src="<?= base_url('assets/img/1.png') ?>">Suhu</image>
                                    <p>0</p>
                                </div>
                                <div class="col-md-6 mb-4 responsive">
                                    <image src="<?= base_url('assets/img/3.png') ?>">Salinitas</image>
                                    <p>0</p>
                                </div>
                                <div class="col-md-6" id="ph_pagi" name="ph_pagi">
                                    <image src="<?= base_url('assets/img/4.png') ?>">Ph Pagi</image>
                                    <p>0</p>
                                </div>
                                <div class="col-md-6" id="ph_sore" name="ph_sore">
                                    <image src="<?= base_url('assets/img/4.png') ?>">Ph Sore</image>
                                    <p>0</p>
                                </div>
                            </div>


                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-success"></i> Baik
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-warning"></i> Kurang Baik
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-danger"></i> Buruk
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->