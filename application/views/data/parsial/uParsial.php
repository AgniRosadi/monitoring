<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="card shadow mb-4">
        <?= form_error('u_parsial', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('message'); ?>

        <form action="<?= base_url('data/u_parsial/') . $parsial['id_parsial'];  ?>" method="post">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data parsial</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>No_Parsial</label>
                            <select id="no_parsial" name="no_parsial" class="form-control">
                                <option value="<?= $parsial['no_parsial'] ?>">-Pilih parsial-</option>
                                <option value="parsial1">parsial1</option>
                                <option value="parsial2">parsial2</option>
                                <option value="parsial3">parsial3</option>
                                <option value="parsial4">parsial4</option>
                                <option value="parsial5">parsial5</option>
                                <option value="panen">panen</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Kode Kolam</label>
                            <select id="kode_kolam" name="kode_kolam" class="form-control">
                                <option value="value=" <?= $parsial['kode_kolam'] ?>"">-Pilih-</option>
                                <?php foreach ($kolam as $a) : ?>

                                    <option value="<?= $a['kode_kolam']; ?>"><?= $a['kode_kolam']; ?>

                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $parsial['tanggal'] ?>">
                            <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Hari</label>
                            <input type="text" class="form-control" id="hari" name="hari" value="<?= $parsial['hari'] ?>">
                            <?= form_error('hari', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>MBW (gram)</label>
                            <input type="number" min="1" class="form-control" id="mbw" name="mbw" value="<?= $parsial['mbw'] ?>">
                            <?= form_error('mbw', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Size (Ekor/Kg)</label>
                            <input type="number" min="1" class="form-control" id="size" name="size" value="<?= $parsial['size'] ?>">
                            <?= form_error('size', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Biomasa</label>
                            <input type="number" min="1" class="form-control" id="biomasa" name="biomasa" value="<?= $parsial['biomasa'] ?>">
                            <?= form_error('biomasa', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Populasi Parsial</label>
                            <input type="number" min="1" class="form-control" id="populasi" name="populasi" value="<?= $parsial['populasi'] ?>">
                            <?= form_error('populasi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Parsial (%)</label>
                            <input type="number" min="1" class="form-control" id="parsial" name="parsial" value="<?= $parsial['parsial'] ?>">
                            <?= form_error('parsial', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Sisa Populasi</label>
                            <input type="number" min="1" class="form-control" id="sisa_p" name="sisa_p" value="<?= $parsial['sisa_p'] ?>">
                            <?= form_error('sisa_p', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Pemasukan (Rp)</label>
                            <input type="number" min="1" class="form-control" id="pemasukan" name="pemasukan" value="<?= $parsial['pemasukan'] ?>">
                            <?= form_error('pemasukan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Total (Rp)</label>
                            <input type="number" min="1" class="form-control" id="total" name="total" value="<?= $parsial['total'] ?>">
                            <?= form_error('total', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>

        </form>
    </div>
</div>