
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
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>','</div>');
			
			//notifikasi pesan data berhasil disimpanasi
			if ($this->session->flashdata('pesan')) {
				echo '<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
				echo $this->session->flashdata('pesan');
				echo '</div>';
			}
			
			echo form_open('kasus/edit/'.$kasus->id_kasus) ?>
			<div class="control-group form-group">
              <div class="controls">
                <label>Jenis Kasus:</label>
                <select name="id_jenis" class="form-control">
					<option value="<?= $kasus->id_jenis  ?>"><?= $kasus->jenis_kriminal  ?></option>
					<?php foreach ($jenis as $key => $value) { ?>
						<option value="<?= $value->id_jenis ?>"><?= $value->jenis_kriminal ?></option>
					<?php } ?>					
				</select>
              </div>
            </div>

			<div class="control-group form-group">
              <div class="controls">
                <label>Tahun:</label>
                <select name="tahun" class="form-control">
				<option value="<?= $kasus->tahun  ?>"><?= $kasus->tahun  ?></option>

					<?php
					$now=2030;
					for ($a=2012;$a<=$now;$a++){ ?>
						<option value="<?= $a ?>"><?= $a ?></option>
					<?php }?>
				</select>
              </div>
            </div>

			<div class="control-group form-group">
              <div class="controls">
                <label>Jumlah:</label>
                <input type="text" name="jml" value="<?= $kasus->jml  ?>" class="form-control" placeholder="Jumlah Kasus">
              </div>
            </div>

		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Simpan</button>
		</div>
		<?php echo form_close() ?>
		</div>
	</div>
	<div class="col-lg-3"></div>
</div>

<br>
