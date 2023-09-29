<!-- <ol class="breadcrumb">
	<a href="<?= base_url('kasus/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
</ol> -->
<?php
//notifikasi pesan data berhasil disimpan
if ($this->session->flashdata('pesan')) {
	echo '<div class="alert alert-success alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
	echo $this->session->flashdata('pesan');
	echo '</div>';
}
?>
<div class="col-sm-12">
	<table class="table table-bordered">
		<thead class="text-sm">
			<tr class="text-center">
				<th>No</th>
				<th>Komponen dan Golongan Darah</th>
				<th width="200px">Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th>0</th>
				<th>Semua Komponen</th>
				<th class="text-center">
					<a href="<?= base_url('kasus/prediksi_all') ?>" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i> Prosess</a>
					<a href="<?= base_url('kasus/print_prediksi_all') ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print</a>
				</th>
			</tr>
			<?php $no = 1;
			foreach ($jenis as $key => $value) { ?>
				<?php
				if ($controller->cekjenis($value->id_jenis) == false) {
					// pass
				} else {
				?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $value->komponen_darah . ' ' . $value->golongan_darah ?></td>
						<td class="text-center">
							<a href="<?= base_url('kasus/prediksi_kasus/' . $value->id_jenis) ?>" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i> Prosess</a>
							<a href="<?= base_url('kasus/print_prediksi_kasus/' . $value->id_jenis) ?>" target="_blank" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print</a>
						</td>
					</tr>
				<?php } ?>

			<?php } ?>
		</tbody>
	</table>

</div>