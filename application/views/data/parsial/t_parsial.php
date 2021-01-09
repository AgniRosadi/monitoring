<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<div class="card shadow mb-4">
		<?= form_error('t_parsial', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

		<?= $this->session->flashdata('message'); ?>

		<form action="<?= base_url('data/tambah_parsial'); ?>" method="post">
			<!-- Card Header - Accordion -->
			<a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
				<h6 class="m-0 font-weight-bold text-primary">Tambah Data parsial</h6>
			</a>
			<!-- Card Content - Collapse -->
			<?php $query = $this->db->query("SELECT * FROM parsial")->result(); ?>
			<div class="collapse show" id="collapseCardExample">
				<div class="card-body">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>No_Parsial</label>
							<select id="no_parsial" name="no_parsial" class="form-control">
								<option>--pilih parsial---</option>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label>Kode Kolam</label>
							<select id="kode_kolam" name="kode_kolam" class="form-control">
								<option value="">-Pilih-</option>
								<?php foreach ($kolam as $a) : ?>

									<option value="<?= $a['id_kolam']; ?>"><?= $a['kode_kolam']; ?>

									</option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label>Tanggal</label>
							<input type="date" class="form-control" id="tanggal" name="tanggal">
							<?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group col-md-6">
							<label>Hari</label>
							<input type="text" class="form-control" id="hari" name="hari">
							<?= form_error('hari', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>MBW (gram)</label>
							<input type="number" min="1" class="form-control" id="mbw" name="mbw">
							<?= form_error('mbw', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group col-md-6">
							<label>Size (Ekor/Kg)</label>
							<input type="number" min="1" class="form-control" id="size" name="size">
							<?= form_error('size', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Biomasa</label>
							<input type="number" min="1" class="form-control" id="biomasa" name="biomasa">
							<?= form_error('biomasa', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group col-md-6">
							<label>Populasi Parsial</label>
							<input type="number" min="1" class="form-control" id="populasi" name="populasi">
							<?= form_error('populasi', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Parsial (%)</label>
							<input type="number" min="1" class="form-control" id="parsial" name="parsial">
							<?= form_error('parsial', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-group col-md-6">
							<label>Sisa Populasi</label>
							<input type="number" min="1" class="form-control" id="sisa_p" name="sisa_p">
							<?= form_error('sisa_p', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Pemasukan (Rp)</label>
							<input type="number" min="1" class="form-control" id="pemasukan" name="pemasukan">
							<?= form_error('pemasukan', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<div class="form-group col-md-6">
							<label>Total (Rp)</label>
							<input type="number" min="1" class="form-control" id="total" name="total">
							<?= form_error('total', '<small class="text-danger pl-3">', '</small>'); ?>
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