    <!-- Begin Page Content -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message') ?>
            </div>
            <div class="col-sm-12" style="margin-bottom:10px;">
                <div class="card" style="border-color: blue;">
                    <div class="card-body form-group row">
                        <h5 class="card-title"><b><?= $title; ?></b></h5>
                        <?php if ($user['role_id'] == 1) {
                            echo '<a href="' . base_url() . 'data/form_air style="margin-left: auto;" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
                        ';
                        } else {
                            echo '';
                        } ?>
                    </div>
                </div>
            </div>
        </div>


        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Air</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample1">
                <div class="card-body">

                    <!-- <div class="card-header">
                        <h3 class="card-title">Data Kolam</h3>
                        <a href="#" class="btn btn-primary " style="margin-left:70%;"><i class="fa fa-plus"></i> Tambah</a>
                        <a href="#" class="btn btn-success" style="margin-left:2%"><i class="fa fa-file-excel"></i> Export Excel</a>

                    </div> -->
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped ">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Kode Kolam</th>
                                        <th>Suhu</th>
                                        <th>Salinitas</th>
                                        <th>Ph Pagi</th>
                                        <th>Ph Sore</th>
                                        <th>Kecerahan(Warna Air)</th>
                                        <th>Cuaca</th>
                                        <th>Tinggi Air(cm)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($airnya as $ai) : ?>
                                        <tr>

                                            <td><?= $ai['tanggal']; ?></td>
                                            <td><?= $ai['kode_kolam']; ?></td>
                                            <td><?= $ai['suhu']; ?></td>
                                            <td><?= $ai['salinitas']; ?></td>
                                            <td><?= $ai['ph_pagi']; ?></td>
                                            <td><?= $ai['ph_sore']; ?></td>
                                            <td><?= $ai['kecerahan']; ?></td>
                                            <td><?= $ai['cuaca']; ?></td>
                                            <td><?= $ai['tg_air']; ?></td>
                                            <td>
                                                <a href="<?= base_url('data/form_editA/') .  $ai['id_air'];  ?>" class="badge badge-success">edit</a>
                                                <a href="<?= base_url('data/form_del/') . $ai['id_air'];  ?>" class="badge badge-danger" data-confirm="Anda yakin akan menghapus data ini?">Hapus<i class=”fa fa-trash”></i></a>
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


    </div>

    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->