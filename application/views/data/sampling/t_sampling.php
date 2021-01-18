 <div class="container-fluid">

 	<!-- Page Heading -->
 	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
 	<!-- Collapsable Card Example -->
 	<div class="card shadow mb-4">
 		<?= form_error('t_sampling', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

 		<?= $this->session->flashdata('message'); ?>

 		<form action="<?= base_url('data/t_sampling'); ?>" method="post">
 			<!-- Card Header - Accordion -->
 			<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
 				<h6 class="m-0 font-weight-bold text-primary">Tambah Data Sampling</h6>
 			</a>
 			<!-- Card Content - Collapse -->
 			<div class="collapse show" id="collapseCardExample">
 				<div class="card-body">
 					<div class="form-row">
 						<div class="form-group col-md-6">
 							<label>Tanggal Sampling</label>
 							<input type="date" class="form-control" id="tanggal_s" name="tanggal_s">
 							<?= form_error('tanggal_s', '<small class="text-danger pl-3">', '</small>'); ?>
 						</div>
 						<div class="form-group col-md-6">
 							<label>Kode Kolam</label>
 							<select id="kode_kolam" name="kode_kolam" class="form-control">
 								<option>pilih kolam</option>
 								<?php
									$query1 = $this->db->query("SELECT * FROM kolam where status_kolam = 'dipakai'")->result();
									foreach ($query1 as $k) { ?>

 									<option value="<?php echo $k->id_master_kolam ?>"><?php echo $k->kode_kolam  ?></option>
 								<?php
									} ?>
 							</select>
 						</div>
 					</div>
 					<div class="form-row">
 						<div class="form-group col-md-6">
 							<label>Umur Udang</label>
 							<input type="number" min="1" class="form-control" id="umur_u" name="umur_u">
 							<?= form_error('umur_u', '<small class="text-danger pl-3">', '</small>'); ?>
 						</div>
 						<div class="form-group col-md-6">
 							<label>MBW (Gram)</label>
 							<input type="number" min="1" class="form-control" id="mbw" name="mbw">
 							<?= form_error('mbw', '<small class="text-danger pl-3">', '</small>'); ?>
 						</div>
 					</div>
 					<div class="form-row">
 						<div class="form-group col-md-6">
 							<label>Size (Ekor/Kg)</label>
 							<input type="number" min="1" class="form-control" id="size" name="size">
 							<?= form_error('size', '<small class="text-danger pl-3">', '</small>'); ?>
 						</div>
 						<div class="form-group col-md-6">
 							<label>ADG</label>
 							<input type="number" min="1" class="form-control" id="adg" name="adg">
 							<?= form_error('adg', '<small class="text-danger pl-3">', '</small>'); ?>
 						</div>
 					</div>
 					<div class="form-row">
 						<div class="form-group col-md-6">
 							<label>Pakan (Kg)</label>
 							<input type="number" min="1" class="form-control" id="pakan" name="pakan">
 							<?= form_error('pakan', '<small class="text-danger pl-3">', '</small>'); ?>
 						</div>
 						<div class="form-group col-md-6">
 							<label>Keterangan</label>
 							<input type="text" class="form-control" id="ket" name="ket">
 							<?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>
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