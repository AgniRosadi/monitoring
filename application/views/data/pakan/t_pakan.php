  <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Collapsable Card Example -->

  <div class="card shadow mb-4">
        <?= form_error('t_pakan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

        <?= $this->session->flashdata('message'); ?>

        <form action="<?= base_url('data/t_pakan'); ?>" method="post">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Sampling</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Umur Udang</label>
                            <input type="text" class="form-control" id="umur" name="umur">
                            <?= form_error('umur', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pakan Pagi</label>
                            <input type="text" class="form-control" id="pakan_p" name="pakan_p">
                            <?= form_error('pakan_p', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="form-row">
                           <div class="form-group col-md-6">
                            <label>Pakan Siang</label>
                            <input type="number" min="1" class="form-control" id="pakan_s" name="pakan_s">
                            <?= form_error('pakan_s', '<small class="text-danger pl-3">', '</small>'); ?>

                        </div>
                        <div class="form-group col-md-6">
                            <label>Pakan Sore</label>
                            <input type="number" min="1" class="form-control" id="pakan_sr" name="pakan_sr">
                            <?= form_error('pakan_sr', '<small class="text-danger pl-3">', '</small>'); ?>

                        </div>
                       
                    </div>
                    <div class="form-row">   
                     <div class="form-group col-md-6">
                            <label>Pakan Malam</label>
                            <input type="text" min="1" class="form-control" id="pakan_m" name="pakan_m">
                            <?= form_error('pakan_m', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>               
                        <div class="form-group col-md-6">
                            <label>Total Pakan</label>
                            <input type="number" min="1" class="form-control" id="total_pkn" name="total_pkn">
                            <?= form_error('total_pkn', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                      
                    </div>
                      <div class="form-group">
                            <label>Keterangan</label>
                            <input type="number" min="1" class="form-control" id="ket" name="ket">
                            <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
