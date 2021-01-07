<div class="container-fluid">
    <div class="card shadow mb-4">
        <?= form_error('edit_kolam', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('message'); ?>

        <form action="<?= base_url('data/edit_kolam/') . $kolamnya['id_kolam']; ?>" method="post">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Sampling</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample2">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Siklus</label>
                            <input type="number" min="1" class="form-control" id="siklus" name="siklus" value="<?= $kolamnya['siklus']; ?>">
                            <?= form_error('siklus', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Kode Kolam</label>
                            <input type="text" class="form-control" id="kode_kolam" name="kode_kolam" placeholder="Contoh (A1/A2 dst)" value="<?= $kolamnya['kode_kolam']; ?>">
                            <?= form_error('kode_kolam', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Luas Kolam (m2)</label>
                            <input type="number" min="1" class="form-control" id="luas_kolam" name="luas_kolam" value="<?= $kolamnya['luas_kolam']; ?>">
                            <?= form_error('luas_kolam', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tanggal Tebar</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $kolamnya['tanggal']; ?>">
                            <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Asal Benur</label>
                            <input type="text" class="form-control" id="asal_b" name="asal_b" value="<?= $kolamnya['asal_b']; ?>">
                            <?= form_error('asal_b', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Jumlah Tebar</label>
                            <input type="number" min="1" class="form-control" id="jumlah_tebar" name="jumlah_tebar" value="<?= $kolamnya['jumlah_tebar']; ?>">
                            <?= form_error('jumlah_tebar', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tipe Plastik</label>
                            <select id="tipe_p" name="tipe_p" class="form-control">
                                <option value="<?= $kolamnya['tipe_p']; ?>">-Tipe-</option>
                                <option value="mulsa">Mulsa</option>
                                <option value="hdpe">Hdpe</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>