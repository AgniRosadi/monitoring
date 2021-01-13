    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message') ?>
            </div>
            <div class="col-sm-12" style="margin-bottom:10px;">
                <div class="card" style="border-color: blue;">
                    <div class="card-body form-group row">       
                            <h4 class="card-title"><b><?= $title; ?></b></h4>       
                            <a href="<?= base_url('data/t_parsial'); ?>" class="btn btn-primary " style="margin-left: auto;"><i class="fa fa-plus"></i> Tambah</a>
                    </div>
                </div>
            </div>
        </div>


        <?php
        $query13 = $this->db->query("SELECT * FROM Kolam")->result();

        foreach ($query13 as $key => $q) {
            # code...
         $query12 = $this->db->query("SELECT * FROM data_parsial where id_master_kolam = $q->id_master_kolam group by id_siklus order by id_parsial desc")->result();

        foreach ($query12 as $key => $qr) {
              ?>

        <!-- Collapsable Card Example -->
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                <h6 class="m-0 font-weight-bold text-primary"> Kolam <?php echo $q->kode_kolam ?></h6>
                <h6 class="m-0 font-weight-bold text-primary"> siklus <?php echo $qr->id_siklus ?></h6>
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
                                        <th>No Parsial</th>
                                        <th>Siklus</th>
                                        <th>Hari</th>
                                        <th>Mbw (gram)</th>
                                        <th>Size (Ekor/Kg)</th>
                                        <th>Biomasa (Kg)</th>
                                        <th>Populasi (Ekor)</th>
                                        <th>Parsial (%)</th>
                                        <th>Pemasukan</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $query14 = $this->db->query("SELECT * FROM data_parsial d join parsial p on d.id_parsial = p.id_parsial where d.id_master_kolam = $q->id_master_kolam and d.id_siklus = $qr->id_siklus order by d.id_parsial asc")->result();

                                    foreach ($query14 as  $qw) {
                                         # code...
                                      ?>
                                        <tr>
                                            <td><?= $qw->tanggal;?> </td>
                                            <td><?= $qw->nama_parsial;?> </td>
                                            <td><?= $qw->id_siklus ?> </td>
                                            <td><?= $qw->hari ?> </td>
                                            <td><?= $qw->mbw ?> </td>
                                            <td><?= $qw->size ?> </td>
                                            <td><?= $qw->biomasa ?> </td>
                                            <td><?= $qw->populasi ?> </td>
                                            <td><?= $qw->parsial ?> </td>
                                            <td><?= $qw->pemasukan ?> </td>

                                            <td> <a href=" base_url('data/u_parsial/') $qw->id_parsial  " class="badge badge-success">edit</a>
                                                <a href=" base_url('data/d_parsial/') $qw->id_parsial  " class="badge badge-danger" data-confirm="Anda yakin akan menghapus data ini?">delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                     <h4>total pemasukan pada kolam <?php echo $q->kode_kolam ?> siklus <?php echo $qr->id_siklus ?> adalah </h4>
                </div>
            </div>
        </div>
    <?php
    }
     } ?>


        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->