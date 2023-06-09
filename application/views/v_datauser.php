
<ol class="breadcrumb">
  <a href="<?= base_url('user/input') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
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

<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama User</th>
				<th>Username</th>
				<th>Password</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; foreach ($user as $key => $value) { ?>
			<tr>
				<td><?= $no++; ?></td>
				<td><?= $value->nama_user ?></td>
				<td><?= $value->username ?></td>
				<td><?= $value->password ?></td>
				<td>
					<a href="<?= base_url('user/edit/'.$value->id_user) ?>" class="btn btn-sm btn-warning">Edit</a>
					<a href="<?= base_url('user/hapus/'.$value->id_user) ?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah Data Ingin Dihapus...?')">Hapus</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>


