<?php
require_once('application/libraries/RegresiLinier.php');

$x = [
    2000,
    2001,
    2002,
    2003,
    2004,
    2005,
    2006,
    2007,
    2008,
    2009
];

$y = [
    45,
    48,
    51,
    51,
    52,
    54,
    61,
    67,
    69,
    70
];


$regresi = new RegresiLinier($x, $y);
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row ">
        <div class="col-lg-12 mb-4">
            <!-- AREA CHART -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                    <h6 class="m-0 font-weight-bold text-primary">Perkembangan Udang</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample1">
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample2">
                    <h6 class="m-0 font-weight-bold text-primary">Perkembangan Pakan </h6>
                </a>
                <div class="collapse show" id="collapseCardExample2">
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Indikator Kualitas Air</h6>
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
    <div class="card">



        <?php
        //contoh menampilkan data regresi linear
        echo "<textarea style='width:100%; height:300px; '>";
        echo "X Variable : \n";
        print_r($x);
        echo "</textarea>";

        echo "<textarea style='width:100%; height:300px; '>";
        echo "Y Variable : \n";
        print_r($y);
        echo "</textarea>";

        echo "<textarea style='width:100%; height:300px; '>";
        echo "Hasil Analisis Regresi Linear Sederhana : \n";
        print_r($regresi->all);
        echo "</textarea>";
        ?>
        <br>
        <h3>Penerapan RegresiLinearPHP dengan ChartJS</h3>

        <canvas id="graph" width=500 height="150"></canvas>


    </div>
</div>