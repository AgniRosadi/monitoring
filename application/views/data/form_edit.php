<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow mb-4">
        <?= form_error('form_editA', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('message'); ?>

        <form action="<?= base_url('data/form_editA/') . $airnya['id_air']; ?>" method="post">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Edit Data Sampling</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $airnya['tanggal']; ?>">
                            <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Kode Kolam</label>
                            <select id="kode_kolam" name="kode_kolam" class="form-control">
                                <option value="<?= $airnya['kode_kolam']; ?>">-Pilih-</option>
                                <?php foreach ($kolam as $a) : ?>
                                    <option value=" <?= $a['kode_kolam']; ?>"><?= $a['kode_kolam']; ?>
                                    </option>
                                <?php endforeach ?>
                            </select>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Suhu</label>
                            <input type="number" min="1" class="form-control" id="suhu" name="suhu" value="<?= $airnya['suhu']; ?>">
                            <?= form_error('suhu', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Salinitas</label>
                            <input type="number" min="1" class="form-control" id="salinitas" name="salinitas" value="<?= $airnya['salinitas']; ?>">
                            <?= form_error('salinitas', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Ph Pagi</label>
                            <input type="number" min="1" class="form-control" id="ph_pagi" name="ph_pagi" value="<?= $airnya['ph_pagi']; ?>">
                            <?= form_error('ph_pagi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Ph Sore</label>
                            <input type="number" min="1" class="form-control" id="ph_sore" name="ph_sore" value="<?= $airnya['ph_sore']; ?>">
                            <?= form_error('ph_sore', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Kecerahan</label>
                            <select id="kecerahan" name="kecerahan" class="form-control">
                                <option value="<?= $airnya['kecerahan']; ?>">-Pilih-</option>
                                <option value="h">Hijau</option>
                                <option value="hp">Hijau Pekat</option>
                                <option value="hc">Hijau Coklat</option>
                                <option value="c">Coklat</option>
                                <option value="ck">Coklat Kuning</option>
                                <option value="k">Kuning</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Cuaca</label>
                            <select id="cuaca" name="cuaca" class="form-control">
                                <option value="<?= $airnya['cuaca']; ?>">-Pilih-</option>
                                <option value="cerah">Cerah</option>
                                <option value="mendung">Mendung</option>
                                <option value="mendung">Hujan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tinggi Air</label>
                            <input type="number" min="1" class="form-control" id="tg_air" name="tg_air" value="<?= $airnya['tg_air']; ?>">
                            <?= form_error('tg_air', '<small class="text-danger pl-3">', '</small>'); ?>
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