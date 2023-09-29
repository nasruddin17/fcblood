<ol class="breadcrumb">
	<a href="<?= base_url('kasus/prediksi'); ?>" class="btn btn-warning"><i class="fa fa-backward"></i> Kembali</a>

	<div class="text-center">
		<h3 class="text-center"> Komponen dan Golongan Darah <?= $jenis->komponen_darah . ' ' . $jenis->golongan_darah ?></h3>
	</div>

</ol>

<div class="col-sm-12">
	<table class="table table-bordered">
		<thead class="text-sm">
			<tr class="text-center">
				<th>No</th>
				<th>Komponen dan Golongan Darah</th>
				<th>Xt</th>
				<th>s1t</th>
				<th>s2t</th>
				<th>s3t</th>
				<th>at</th>
				<th>bt</th>
				<th>ct</th>
				<th>forecasting</th>
				<th>Error</th>
				<th>ABS(Error)</th>
				<th>PE</th>
			</tr>
		</thead>
		<tbody>
			<?php

			/**
			 * Lakukan prediksi sebanyak jumlah data + target
			 */
			$targetPrediksi = 1; // hitungan dalam bulan

			$bulans = [
				'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
				'September', 'Oktober', 'November', 'Desember'
			];
			if ($kasus != NULL) {
				$tahunAkhir = 0;
				$bulanAkhir = 0;
				foreach ($kasus as $key) {
					$jumlah[] = $key->jml;
					$nama_kasus[] = $key->komponen_darah . ' ' . $key->golongan_darah;
					$thn[] = $key->tahun . ' ' . $bulans[$key->bulan - 1];
					$bulanAkhir  = $key->bulan;
					$tahunAkhir = $key->tahun;
				}

				// operasi tahun dan bulan selanjutnya
				$tahunTerakhir = $tahunAkhir;
				$bulanTerakhir = $bulanAkhir + 1;
				$counter = $targetPrediksi;
				while ($counter > 0) {
					$thn[] = $tahunTerakhir . ' ' . $bulans[$bulanTerakhir - 1];
					if ($bulanTerakhir == 12) {
						$tahunTerakhir++;
						$bulanTerakhir = 1;
					} else {
						$bulanTerakhir++;
					}
					$counter--;
				}


				//mencari nilai s1

				$tahun = array();
				$jml = array();
				$s1 = array();
				$s2 = array();
				$s3 = array();
				$at = array();
				$bt = array();
				$ct = array();
				$fct = array();
				$err = array();
				$abs_err = array();
				$pe = array();
				$a = 0.2;
				$m = 1;
				$sum = 0;
				$sum_pe = 0;
				for ($i = 0; $i < $jml_kasus + $targetPrediksi; $i++) {
					if ($i == 0) {
						$no = $i ?>
						<tr>
							<td><?= $no += 1 ?></td>
							<td><?= $s1[$i] = $nama_kasus[$i] ?> <?= $tahun[$i] = $thn[$i] ?></td>
							<td><?= $jml[$i] = $jumlah[$i] ?></td>
							<td><?= $s1[$i] = $jumlah[$i] ?></td>
							<td><?= $s2[$i] = $jumlah[$i] ?></td>
							<td><?= $s3[$i] = $jumlah[$i] ?></td>
							<td><?= $at[$i] = $jumlah[$i] ?></td>
							<td><?= $bt[$i] = 0 ?></td>
							<td><?= $ct[$i] = 0 ?></td>
							<td><?= $fct[$i] = $jumlah[$i] ?></td>
							<td><?= $err[$i] = 0 ?></td>
							<td><?= $abs_err[$i] = 0 ?></td>
							<td><?= $pe[$i] = 0 ?>%</td>

						</tr>
					<?php } else { ?>

						<?php if ($i >= $jml_kasus) { ?>
							<!-- kode prediksi -->
							<!-- AWAL KODE PREDIKSI TARGET -->
							<tr>
								<td><?= $no += 1 ?></td>

								<?php
								$index = $jml_kasus - 1;
								$jumlah[$i] = round(abs($fct[$i - 1])); // jumlah permintaan 1 bulan berikutnya adalah hasil dari prediksi bulan ini
								$jml[$i] = $jumlah[$i]; // sama dengan diatas
								?>

								<td><?= $s1[$index] = $nama_kasus[$index] ?> <?= $tahun[$i] = $thn[$i] ?></td>
								<!-- buatkan kode untuk mendapat tahun selanjutnya -->
								<td><?= $jml[$i] = $jumlah[$i]; ?></td>
								<td><?= $s1[$i] = (float)($a * $jumlah[$i]) + ((1 - $a) * (float)($s1[$i - 1])) ?></td>
								<td><?= number_format($s2[$i] = ($a * $s1[$i]) + ((1 - $a) * ($s2[$i - 1])), 3) ?></td>
								<td><?= number_format($s3[$i] = ($a * $s2[$i]) + ((1 - $a) * ($s3[$i - 1])), 3) ?></td>
								<td><?= number_format($at[$i] = (3 * $s1[$i]) - (3 * $s2[$i]) + $s3[$i], 3) ?></td>
								<td><?= number_format($bt[$i] = ($a / (2 * (pow(1 - $a, 2)))) * (((6 - (5 * $a)) * $s1[$i]) - ((10 - (8 * $a)) * $s2[$i]) + ((4 - (3 * $a)) * $s3[$i])), 3) ?></td>
								<td><?= number_format($ct[$i] = ((pow($a, 2)) / pow((1 - $a), 2)) * ($s1[$i] - (2 * $s2[$i]) + $s3[$i]), 3) ?></td>
								<td><?= round(number_format($fct[$i] = ($at[$i] + ($bt[$i] * $m) + pow((0.5 * $ct[$i] * $m), 2)), 3)) ?></td>

								<td><?php
									// echo $fct[$i];
									// echo '<br>';
									// echo $jml[$i];
									// echo '<br><br>';
									echo $err[$i] = number_format($jml[$i] - $fct[$i], 3);
									$sum += $err[$i];
									?></td>
								<td><?= round(number_format($abs_err[$i] = abs($err[$i]), 3)) ?></td>
								<td><?php
									// echo (int)$abs_err[$i];
									// echo '<br>';
									// echo $jml[$i];
									// echo '<br><br>';
									echo $pe[$i] = number_format(100 * (int)$abs_err[$i] / $jml[$i], 0);
									$sum_pe += $pe[$i];
									?>%</td>

								<!-- AKHIR DARI KODE PREDIKSI TARGET -->
							</tr>
						<?php } else { ?>

							<tr>
								<td><?= $no += 1 ?></td>
								<td><?= $s1[$i] = $nama_kasus[$i] ?> <?= $tahun[$i] = $thn[$i] ?></td>
								<td><?= $jml[$i] = $jumlah[$i]; ?></td>
								<td><?= number_format($s1[$i] = ($a * $jumlah[$i]) + ((1 - $a) * ($s1[$i - 1])), 3) ?></td>
								<td><?= number_format($s2[$i] = ($a * $s1[$i]) + ((1 - $a) * ($s2[$i - 1])), 3) ?></td>
								<td><?= number_format($s3[$i] = ($a * $s1[$i]) + ((1 - $a) * ($s3[$i - 1])), 3) ?></td>
								<td><?= number_format($at[$i] = (3 * $s1[$i]) - (3 * $s2[$i]) + $s3[$i], 3) ?></td>
								<td><?= number_format($bt[$i] = ($a / (2 * (pow(1 - $a, 2)))) * (((6 - (5 * $a)) * $s1[$i]) - ((10 - (8 * $a)) * $s2[$i]) + ((4 - (3 * $a)) * $s3[$i])), 3) ?></td>
								<td><?= number_format($ct[$i] = ((pow($a, 2)) / pow((1 - $a), 2)) * ($s1[$i] - (2 * $s2[$i]) + $s3[$i]), 3) ?></td>
								<td><?= round(number_format($fct[$i] = $at[$i] + ($bt[$i] * $m) + pow((0.5 * $ct[$i] * $m), 2), 3)) ?></td>

								<td><?php
									// echo $fct[$i];
									// echo '<br>';
									// echo $jml[$i];
									// echo '<br><br>';
									echo $err[$i] = number_format($jml[$i] - $fct[$i], 3);
									$sum += $err[$i];
									?></td>
								<td><?= round(number_format($abs_err[$i] = abs($err[$i]), 3)) ?></td>
								<td><?php
									// echo (int)$abs_err[$i];
									// echo '<br>';
									// echo $jml[$i];
									// echo '<br><br>';
									echo $pe[$i] = number_format(100 * (int)$abs_err[$i] / $jml[$i], 0);
									$sum_pe += $pe[$i];
									?>%</td>

							</tr>

						<?php } ?>

			<?php }
				}
			}
			?>
		</tbody>
	</table>

	<h5>Jumlah (PE) : <?php if ($jml_kasus == 0) {
							echo '0';
						} else {
							echo $sum_pe;
						} ?>%</h5>
	<h5>MAPE (PE) : <?php if ($jml_kasus == 0) {
						echo '0';
					} else {
						echo number_format(($sum_pe / $no), 0);
					} ?>%</h5>
</div>
<?php
foreach ($fct as $key => $value) {
	$data_fct[] = $value;
}
foreach ($tahun as $key => $value) {
	$data_thn[] = $value;
}

//echo json_encode($data_thn);
//echo json_encode($data_fct);

?>
<hr>
<div class="col-sm-12 text-center">
	<h3>Grafik Peramalan</h3>
</div>
<canvas id="myChart"></canvas>
<script>
	var ctx = document.getElementById('myChart').getContext('2d');
	var chart = new Chart(ctx, {
		// The type of chart we want to create
		type: 'line',
		// The data for our dataset
		data: {
			labels: <?php echo json_encode($data_thn); ?>,
			datasets: [{
				label: 'Data Permintaan Darah ',
				backgroundColor: 'rgba(56, 86, 255, 0.87)',
				borderColor: 'rgba(56, 86, 255, 0.87)',
				fill: false,
				data: <?php echo  json_encode($data_fct); ?>
			}]
		},
		// Configuration options go here
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>