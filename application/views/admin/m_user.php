    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <?= form_error('admin', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <button type="button" style="margin-left: auto;" class="btn btn-primary" data-toggle="modal" data-target="#newRoleModal">
                                    <i class="fa fa-plus"></i> Tambah</button type="button" class="btn">
                            </div>
                            <div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="newRoleModalLabel">Tambah Data Teknisi</h5>
                                        </div>


                                        <form class="admin" method="post" action="<?= base_url('admin/registration') ?>">
                                            <div class="collapse show" id="collapseCardExample">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" value="<?= set_value('name'); ?>">
                                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="<?= set_value('email'); ?>">
                                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                                    </div>
                                                    <div class=" form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
                                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Repeat Password">
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
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped ">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nama</th>
                                                <th>E-mail</th>
                                                <th>Role_id</th>
                                                <th>Date Created</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($m_user as $m) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i; ?></th>
                                                    <td><?= $m['name']; ?></td>
                                                    <td><?= $m['email']; ?></td>
                                                    <td><?= $m['role_id']; ?></td>
                                                    <td><?= $m['date_created']; ?></td>
                                                    <td>
                                                        <a href="<?= base_url('data/delete/') . $m['id'];  ?>" class="badge badge-danger">delete</a>
                                                    </td>
                                                </tr>
                                                <?php $i++ ?>
                                            <?php endforeach ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->

                        </div>
                        <!-- /.col -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->