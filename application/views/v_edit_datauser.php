<div class="row">
	<div class="col-lg-3"></div>
	<div class="col-lg-6">
		<ol class="breadcrumb">
			<a href="<?= base_url('kasus') ?>" class="btn btn-success"><i class="fa fa-backward"></i> Kembali</a>
		</ol>
	</div>
	<div class="col-lg-3"></div>

	<div class="col-lg-3"></div>
	<div class="col-lg-6">
		<div class="card h-100">
			<h4 class="card-header"></h4>
			<div class="card-body">
				<?php
				//validasi data tidak boleh kosong
				echo validation_errors('<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>');

				//notifikasi pesan data berhasil disimpanasi
				if ($this->session->flashdata('pesan')) {
					echo '<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
					echo $this->session->flashdata('pesan');
					echo '</div>';
				}

				echo form_open('user/edit/' . $user->id_user);
				?>

				<div class="form-group">
					<label>Nama User</label>
					<input name="nama_user" placeholder="Nama User" value="<?= $user->nama_user ?>" class="form-control" />
				</div>

				<div class="form-group">
					<label>Username</label>
					<input name="username" placeholder="Username" value="<?= $user->username ?>" class="form-control" />
				</div>

				<div class="form-group">
					<label>Password</label>
					<input name="password" placeholder="Password" value="<?= $user->password ?>" class="form-control" />
				</div>

				<div class="form-group">
					<label></label>
					<button type="submit" class="btn btn-sm btn-primary">Simpan</button>
					<button type="reset" class="btn btn-sm btn-success">Reset</button>
				</div>


				<?php echo form_close() ?>
			</div>
		</div>
		<div class="col-lg-3"></div>
	</div>
</div>

<br>
