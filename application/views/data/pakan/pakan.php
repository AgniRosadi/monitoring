    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <!-- Collapsable Card Example -->

        <div class="row">
            <div class="col-sm-12" style="margin-bottom:10px;">
                <div class="card" style="border-color: blue;">
                    <div class="card-body form-group row">
                        <div class="col-md-3">
                            <h5 class="card-title"><b> Data Pakan Lengkap</b></h5>
                        </div>
                        <div class="col-md-9">
                            <a href="<?= base_url('data/t_pakan') ?>" class="btn btn-primary " style="margin-left:60%;"><i class="fa fa-plus"></i> Tambah</a>
                            <a href="#" class="btn btn-success" style="margin-left:0%"><i class="fa fa-file-excel"></i> Export Excel</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Sampling</h6>
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
                                        <th>No</th>
                                        <th>Umur Udang</th>
                                        <th>Pakan Pagi</th>
                                        <th>Pakan Siang</th>
                                        <th>Pakan Sore</th>
                                        <th>Pakan Malam</th>
                                        <th>Total Pakan</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pakan as $p) : ?>
                                        <tr>
                                            <th scope="row"><?= $i; ?></th>
                                            <td><?= $p['umur']; ?></td>
                                            <td><?= $p['pakan_p']; ?></td>
                                            <td><?= $p['pakan_s']; ?></td>
                                            <td><?= $p['pakan_sr']; ?></td>
                                            <td><?= $p['pakan_m']; ?></td>
                                            <td><?= $p['total_pkn']; ?></td>
                                            <td><?= $p['ket']; ?></td>
                                            <td> <a href="<?= base_url('data/update/') . $p['id_kolam'];  ?>" class="badge badge-success">edit</a>
                                                <a href="<?= base_url('data/delete/') . $p['id_kolam'];  ?>" class="badge badge-danger" data-confirm="Anda yakin akan menghapus data ini?">delete</a>
                                            </td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endforeach ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>