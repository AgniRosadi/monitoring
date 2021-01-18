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
                       <div class="form-group col-md-12">
                                            <label>Kode Kolam</label>
                                            <select id="kode_kolam1" name="kode_kolam" class="form-control">
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
                                    <th>populasi</th>
                                    <th>% parsial</th>
                                    <th>populasi parsial</th>
                                    <th>biomasa partial</th>
                                    <th>sisa populasi</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>a1</td>
                                        <td>10000</td>
                                        <td>15%/20%</td>
                                     
                                    </tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- End of Main Content -->