<ol class="breadcrumb">
	<a href="<?= base_url('kasus/prediksi'); ?>" class="btn btn-warning"><i class="fa fa-backward"></i> Kembali</a>

	<h3>Keseluruhan Data</h3>
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


			if ($kasus != NULL) {

				foreach ($kasus as $key) {
					$jumlah[] = $key->jml;
					$nama_kasus[] = $key->komponen_darah . ' ' . $key->golongan_darah;
					$thn[] = $key->tahun;
					$ks[] = $key->komponen_darah . ' ' . $key->golongan_darah  . " " . $key->tahun;
				}


				//mencari nilai s1

				$tahun = array();
				$kasus = array();
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
				for ($i = 0; $i < $jml_kasus; $i++) {
					// echo ("<h1>" . $i . "</h1></br>");
					// for ($i = 0; $i < $jml_kasus; $i++) {
					// jika ini adalah data awal (index ke 0)
					if ($i == 0) {
						$no = $i;
						$kasus[$i] = $ks[$i];
			?>
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
					<?php } else {
						// data ke 2 dst (index > 0)
						$kasus[$i] = $ks[$i];
					?>
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
								echo $err[$i] = number_format($jml[$i] - $fct[$i], 3);
								$sum += $err[$i];
								?></td>
							<td><?= number_format($abs_err[$i] = abs($err[$i]), 3) ?></td>
							<td><?php
								$jml[$i] = $jml[$i] == 0 ? 1 : $jml[$i];

								echo $pe[$i] = number_format($abs_err[$i] / $jml[$i] * 100, 0);

								$pe[$i] = str_replace(",", ".", $pe[$i]);
								$pe[$i] = doubleval($pe[$i]);

								$sum_pe += $pe[$i];
								?>%</td>

						</tr>

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
foreach ($kasus as $key => $value) {
	$data_thn[] = $value;
}
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