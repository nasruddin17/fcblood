<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Forecasting - <?= $title ?></title>

	<!-- Bootstrap core CSS -->
	<link href="<?= base_url() ?>template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url() ?>template/css/font-awesome.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="<?= base_url() ?>template/css/modern-business.css" rel="stylesheet">

	<script src="<?= base_url() ?>chart/dist/Chart.min.js"></script>

	<style>
		canvas {
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
		}
	</style>
</head>

<body onload="window.print();">
	<div class="container">
		<div class="content">
			<div class="row">
				<div class="col-sm-12 text-center">
					<img src="<?= base_url('logo/polri.png') ?>" width="140px">
				</div>
				<div class="col-sm-12 text-center">
					<h3>DATA UTD</h3>
					<h5>Kabupaten Polewali Mandar</h5>
					<hr>
					<h5><u>Komponen dan Golongan Darah <?= $jenis->komponen_darah . ' ' . $jenis->golongan_darah ?></u></h5>

				</div>
				<div class="col-sm-12">
					<table class="table table-bordered">
						<thead class="text-sm">
							<tr class="text-center">
								<th>No</th>
								<th>Komponen dan Golongan Darah</th>
								<th>yt</th>
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
							$bulans = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus',
								'September', 'Oktober', 'November', 'Desember'
							];
							if ($kasus != NULL) {

								foreach ($kasus as $key) {
									$jumlah[] = $key->jml;
									$nama_kasus[] = $key->komponen_darah . ' ' . $key->golongan_darah;
									$thn[] = $key->tahun . ' ' . $bulans[$key->bulan - 1];
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
								$a = 0.1;
								$m = 1;
								$sum = 0;
								$sum_pe = 0;
								for ($i = 0; $i < $jml_kasus; $i++) {
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
											<td><?= number_format($fct[$i] = $at[$i - 1] + ($bt[$i - 1] * $m) + pow((0.5 * $ct[$i - 1] * $m), 2), 3) ?></td>
											<td><?php
												echo $err[$i] = number_format($jml[$i] - $fct[$i], 3);
												$sum += $err[$i];
												?></td>
											<td><?= number_format($abs_err[$i] = abs($err[$i]), 3) ?></td>
											<td><?php
												echo $pe[$i] = number_format(100 * $abs_err[$i] / $jml[$i], 0);
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


			</div>
		</div>
	</div>
	<!-- /.container -->
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
