    <!-- Begin Page Content -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message') ?>
            </div>

        </div>
        <div class="col-sl-12">
         <!--    <div class="card shadow mb-4">
                <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Air</h6>

                </a> -->

                <!-- Card Content - Collapse -->
              <!--   <div class="collapse show" id="collapseCardExample1">

                    <div class="card-body responsive">

                        <div class="row">
                            <div class="col-sm-12 mb-4">
                                <select id="kode_kolam1" name="kode_kolam" class="form-control">
                                    <option value="">--pilih kolam --</option>
                                    <?php foreach ($kolamnya as $a) : ?>

                                        <option value="<?= $a['kode_kolam']; ?>"><?= $a['kode_kolam']; ?>

                                        </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="row text-center responsive" id="k">
                            <div class="col-md-3 responsive">
                                <image src="<?= base_url('assets/img/1.png') ?>">Suhu</image>
                                <p>0</p>
                            </div>
                            <div class="col-md-3 mb-4 responsive">
                                <image src="<?= base_url('assets/img/3.png') ?>">Salinitas</image>
                                <p>0</p>
                            </div>
                            <div class="col-md-3" id="ph_pagi" name="ph_pagi">
                                <image src="<?= base_url('assets/img/4.png') ?>">Ph Pagi</image>
                                <p>0</p>
                            </div>
                            <div class="col-md-3" id="ph_sore" name="ph_sore">
                                <image src="<?= base_url('assets/img/4.png') ?>">Ph Sore</image>
                                <p>0</p>
                            </div>
                        </div>


                        <div class="mt-1 text-center small">
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
                </div> -->
         <!--    </div> -->

            <!-- Collapsable Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Air</h6>
                    <a href="<?= base_url('data/form_air'); ?>" class="btn btn-primary " style="margin-left: auto;"><i class="fa fa-plus"></i> Tambah</a>

                </div>

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
                                    <?php $ai = $this->db->query("SELECT * from kolam d join data_parsial p on p.id_master_kolam = d.id_master_kolam join parsial l on l.id_parsial = p.id_parsial")->result_array(); ?>
                                    <?php foreach ($airnya as $ai) : ?>

                                        <tr>

                                            <td><?= date('d-m-y', strtotime($ai['tanggal'])); ?></td>
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