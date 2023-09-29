
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
			
			echo form_open('kasus/add') ?>
			<div class="control-group form-group">
              <div class="controls">
                <label>Komponen & Golongan Darah:</label>
                <select name="id_jenis" class="form-control">
					<option value="">--Komponen & Golongan Darah--</option>
					<?php foreach ($jenis as $key => $value) { ?>
						<option value="<?= $value->id_jenis ?>"><?= $value->komponen_darah . ' ' . $value->golongan_darah ?></option>
					<?php } ?>					
				</select>
              </div>
            </div>

			<div class="control-group form-group">
              <div class="controls">
                <label>Tahun:</label>
                <select name="tahun" class="form-control">
				<option value="">--Tahun Permintaan--</option>

					<?php
					$now=2030;
					for ($a=2019;$a<=$now;$a++){ ?>
						<option value="<?= $a ?>"><?= $a ?></option>
					<?php }?>
				</select>
              </div>
            </div>

			<!-- Bulan -->
			<div class="control-group form-group">
              <div class="controls">
                <label>Bulan:</label>
                <select name="bulan" class="form-control">
				<option value="">--Bulan Permintaan--</option>

					<?php
					$bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
						'September', 'Oktober', 'November', 'Desember'
					];
					$now=12;
					for ($a=1;$a<=$now;$a++){ ?>
						<option value="<?= $a ?>"><?= $bulan[$a-1] ?></option>
					<?php }?>
				</select>
              </div>
            </div>

			<div class="control-group form-group">
              <div class="controls">
                <label>Jumlah:</label>
                <input type="text" name="jml" class="form-control" placeholder="Jumlah Permintaan">
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
