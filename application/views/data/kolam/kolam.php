    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <?= $this->session->flashdata('message') ?>
            </div>
            <div class="col-12 mb-4">
                <div class="card" style="border-color: blue;">
                    <div class="card-body form-group row">
                        <h4 class="card-title"><b> <?= $title; ?></b></h4>
                        <button type="button" style="margin-left: auto;" class="btn btn-primary" data-toggle="modal" data-target="#newRoleModal"><i class="fa fa-plus"></i> Tambah</button type="button" class="btn">
                    </div>
                </div>
            </div>
            <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newRoleModalLabel">Tambah Data Kolam</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?= form_error('kolam', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <form action="<?= base_url('data/kolam'); ?>" method="post">
                            <div class="collapse show" id="collapseCardExample">
                                <div class="card-body">
                                    <div class="form-row">

                                        <div class="form-group col-md-12">
                                            <label>Kode Kolam</label>
                                            <select id="kode_kolam" name="kode_kolam" class="form-control">
                                                <?php
                                                $query1 = $this->db->query("SELECT * FROM kolam where status_kolam = 'tidak dipakai'")->result();
                                                foreach ($query1 as $k) { ?>

                                                    <option value=" <?php echo $k->id_master_kolam ?>"><?php echo $k->kode_kolam  ?></option>
                                                <?php
                                                } ?>
                                                <!--  <option>--pilih parsial---</option> -->
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Luas Kolam (m2)</label>
                                            <input type="number" min="1" class="form-control" id="luas_kolam" name="luas_kolam">
                                            <?= form_error('luas_kolam', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Tanggal Tebar</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                                            <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Asal Benur</label>
                                            <input type="text" class="form-control" id="asal_b" name="asal_b">
                                            <?= form_error('asal_b', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Jumlah Tebar</label>
                                            <input type="number" min="1" class="form-control" id="jumlah_tebar" name="jumlah_tebar">
                                            <?= form_error('jumlah_tebar', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
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
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Kolam</th>
                                    <th>Luas Kolam(m2)</th>
                                    <th>Tanggal Tebar</th>
                                    <th>Asal Benur</th>
                                    <th>Jumlah Tebar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kolamnya as $ko) :
                                ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $ko->kode_kolam; ?></td>
                                        <td><?= $ko->luas_kolam; ?></td>
                                        <td><?= $ko->tanggal; ?></td>
                                        <td><?= $ko->asal_b; ?></td>
                                        <td><?= $ko->jumlah_tebar; ?></td>
                                        <td> <a href="" class="badge badge-success" data-toggle="modal" data-target="#newRoleModal1<?= $ko->id_master_kolam; ?>">edit<i class=”fa fa-trash”></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                    <div class="modal fade" id="newRoleModal1<?= $ko->id_master_kolam; ?>" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel1<?= $ko->id_master_kolam; ?>" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="newRoleModalLabel1<?= $ko->id_master_kolam; ?>">Edit Data Kolam</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <?php
                                                $id = $ko->id_master_kolam;
                                                $query1 = $this->db->query("SELECT * FROM data_kolam where id_master_kolam=$id")->row_array() ?>
                                                <?= form_error('edit_Mkolam', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                                                <form action="<?= base_url('data/kolam'); ?>" method="post">
                                                    <div class="collapse show" id="collapseCardExample">
                                                        <div class="card-body">
                                                            <div class="form-row">

                                                                <div class="form-group col-md-12">
                                                                    <label>Kode Kolam</label>
                                                                    <select id="kode_kolam" name="kode_kolam" disabled="" class="form-control">
                                                                        <option value="<?= $query1['kode_kolam'] ?>"><?= $query1['kode_kolam'] ?></option>

                                                                    </select>
                                                                </div>

                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Luas Kolam (m2)</label>
                                                                    <input type="number" min="1" class="form-control" id="luas_kolam" name="luas_kolam" value="<?= $query1['luas_kolam'] ?>">
                                                                    <?= form_error('luas_kolam', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Tanggal Tebar</label>
                                                                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $query1['tanggal'] ?>">
                                                                    <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                </div>
                                                            </div>
                                                            <div class="form-row">
                                                                <div class="form-group col-md-6">
                                                                    <label>Asal Benur</label>
                                                                    <input type="text" class="form-control" id="asal_b" name="asal_b" value="<?= $query1['asal_b'] ?>">
                                                                    <?= form_error('asal_b', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label>Jumlah Tebar</label>
                                                                    <input type="number" min="1" class="form-control" id="jumlah_tebar" name="jumlah_tebar" value="<?= $query1['jumlah_tebar'] ?>">
                                                                    <?= form_error('jumlah_tebar', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- End of Main Content -->