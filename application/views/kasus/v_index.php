
<ol class="breadcrumb">
  <a href="<?= base_url('kasus/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
</ol>
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
				<th>Komponen Darah</th>
				<th>Golongan Darah</th>
				<th>Tahun</th>
				<th>Bulan</th>
				<th>Jumlah</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($kasus as $key => $value) { ?>
			<?php $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
						'September', 'Oktober', 'November', 'Desember'
					]; ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $value->komponen_darah ?></td>
				<td><?= $value->golongan_darah ?></td>
				<td><?= $value->tahun ?></td>
				<td><?= $bulan[$value->bulan - 1] ?></td>
				<td><?= $value->jml ?></td>
				<td class="text-center" width="100px">
					<a href="<?= base_url('kasus/edit/'.$value->id_kasus) ?>" class="btn btn-warning btn-sm" ><i class="fa fa-pencil"></i></a>
					<a href="<?= base_url('kasus/delete/'.$value->id_kasus) ?>" class="btn btn-danger btn-sm" onClick="return confirm('Apakah Data Ingin Dihapus...?')"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			
			<?php } ?>
		</tbody>
	</table>

</div>



