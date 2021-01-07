<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <!-- Collapsable Card Example -->

    <div class="card shadow mb-4">

        <?= form_error('u_sampling', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('message'); ?>
        <form action="<?= base_url('data/u_sampling/') . $sampling['id_sampling']; ?>" method="post">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Sampling</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tanggal Sampling</label>
                            <input type="date" class="form-control" id="tanggal_s" name="tanggal_s" value="<?= $sampling['tanggal_s']; ?>">
                            <?= form_error('tanggal_s', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Kode Kolam</label>
                            <select id="kode_kolam" name="kode_kolam" class="form-control">
                                <option value="<?= $sampling['kode_kolam']; ?>">-Pilih-</option>
                                <?php foreach ($kolam as $a) : ?>

                                    <option value=" <?= $a['kode_kolam']; ?>"><?= $a['kode_kolam']; ?>

                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Umur Udang</label>
                            <input type="number" min="1" class="form-control" id="umur_u" name="umur_u" value="<?= $sampling['umur_u']; ?>">
                            <?= form_error('umur_u', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class=" form-group col-md-6">
                            <label>MBW (Gram)</label>
                            <input type="number" min="1" class="form-control" id="mbw" name="mbw" value="<?= $sampling['mbw']; ?>">
                            <?= form_error('mbw', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class=" form-row">
                        <div class="form-group col-md-6">
                            <label>Size (Ekor/Kg)</label>
                            <input type="number" min="1" class="form-control" id="size" name="size" value="<?= $sampling['size']; ?>">
                            <?= form_error('size', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class=" form-group col-md-6">
                            <label>ADG</label>
                            <input type="number" min="1" class="form-control" id="adg" name="adg" value="<?= $sampling['adg']; ?>">
                            <?= form_error('adg', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class=" form-row">
                        <div class="form-group col-md-6">
                            <label>Pakan (Kg)</label>
                            <input type="number" min="1" class="form-control" id="pakan" name="pakan" value="<?= $sampling['pakan']; ?>">
                            <?= form_error('pakan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class=" form-group col-md-6">
                            <label>Estimasi</label>
                            <input type="number" min="1" class="form-control" id="estimasi" name="estimasi" value="<?= $sampling['estimasi']; ?>">
                            <?= form_error('estimasi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class=" form-group ">
                        <label>Keterangan</label>
                        <input type=" text" class="form-control" id="ket" name="ket" value="<?= $sampling['ket']; ?>">
                        <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class=" card-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
        </form>
    </div>
</div>