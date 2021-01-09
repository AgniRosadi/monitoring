    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message') ?>
            </div>
            <div class="col-sm-12" style="margin-bottom:10px;">
                <div class="card" style="border-color: blue;">
                    <div class="card-body form-group row">
                        <div class="col-md-3">
                            <h4 class="card-title"><b><?= $title; ?></b></h4>
                        </div>
                        <div class="col-md-9">
                            <a href="<?= base_url('data/t_parsial'); ?>" class="btn btn-primary " style="margin-left: 60%;"><i class="fa fa-plus"></i> Tambah</a>
                            <a href="<?= base_url('data/excel'); ?>" class="btn btn-success" style="margin-left: auto;"><i class="fa fa-file-excel"></i> Export Excel</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Kolam</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample1">
                <div class="card-body">

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Kode Kolam</th>
                                        <th>No Parsial</th>
                                        <th>Hari</th>
                                        <th>Mbw (gram)</th>
                                        <th>Size (Ekor/Kg)</th>
                                        <th>Biomasa (Kg)</th>
                                        <th>Populasi (Ekor)</th>
                                        <th>Parsial (%)</th>
                                        <th>Sisa Populasi</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $a = $this->db->query("SELECT * from data_kolam d join data_parsial p on p.id_kolam = d.id_kolam")->result_array(); ?>
                                    <?php foreach ($a as $p) : ?>
                                        <tr>
                                            <td><?= date('d-m-y', strtotime($p['tanggal'])); ?></td>
                                            <td><?= $p['kode_kolam']; ?></td>
                                            <td><?= $p['id_parsial']; ?></td>
                                            <td><?= $p['hari']; ?></td>
                                            <td><?= $p['mbw']; ?></td>
                                            <td><?= $p['size']; ?></td>
                                            <td><?= $p['biomasa']; ?></td>
                                            <td><?= $p['populasi']; ?></td>
                                            <td><?= $p['parsial']; ?></td>
                                            <td><?= $p['sisa_p']; ?></td>

                                            <td> <a href="<?= base_url('data/u_parsial/') . $p['id_parsial'];  ?>" class="badge badge-success">edit</a>
                                                <a href="<?= base_url('data/d_parsial/') . $p['id_parsial'];  ?>" class="badge badge-danger" data-confirm="Anda yakin akan menghapus data ini?">delete</a>
                                            </td>
                                        </tr>

                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->