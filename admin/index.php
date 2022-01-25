<?php  
	session_start();
	include('../koneksi.php');
	$count = "SELECT count(*) FROM t_dosen";
	$database_count = mysqli_query($koneksi, $count);
	$DuetiesDesc = array();
	$database_count=mysqli_fetch_assoc($database_count) or die(mysqli_error());
	// echo $database_count['count(*)']; die();

	$count2 = "SELECT count(*) FROM t_dosen where jad = 'Asisten Ahli'";
	$database_count2 = mysqli_query($koneksi, $count2);
	$DuetiesDesc2 = array();
	$database_count2 = mysqli_fetch_assoc($database_count2) or die(mysqli_error());


	$tabel1 = "t_dosen";
	
	$sql = "SELECT * FROM $tabel1 order by nama_dsn asc";
	$res = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Admin</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="../vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/style.css">

</head>
<body>
	<?php include('../includes/header.php') ?>

	<?php include('../includes/left-bar.php') ?>

	<div class="mobile-menu-overlay"></div>
	
	<div class="main-container">
		<div class="pd-ltr-20">
			<div class="card-box pd-20 height-100-p mb-30">
				<div class="row align-items-center">
					<div class="col-md-4">
						<img src="../vendors/images/banner-sdm.png" alt="">
					</div>
					<div class="col-md-8">
						<h4 class="font-20 weight-500 mb-10 text-capitalize">
							<div class="weight-600 font-30 text-blue">Bidang Sumber Daya Manusia Teknik Informatika</div>
						</h4>
						<p class="font-18 max-width-600"></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo $database_count['count(*)']; ?></div>
								<div class="weight-600 font-14">Total Dosen</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart2"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0"><?php echo $database_count2['count(*)']; ?></div>
								<div class="weight-600 font-14">JAD Asisten Ahli</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart3"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">350</div>
								<div class="weight-600 font-14">Campaign</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 mb-30">
					<div class="card-box height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart4"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">$6060</div>
								<div class="weight-600 font-14">Worth</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xl-8 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Activity</h2>
						<div id="chart5"></div>
					</div>
				</div>
				<div class="col-xl-4 mb-30">
					<div class="card-box height-100-p pd-20">
						<h2 class="h4 mb-20">Lead Target</h2>
						<div id="chart6"></div>
					</div>
				</div>
			</div>
			<div class="card-box mb-30">
				<h2 class="h4 pd-20">cari Dosen</h2>
				<table class="data-table table nowrap">
					<thead>
						<tr>
							
							<th class="table-plus datatable-nosort">No</th>
							<th>Nama Dosen</th>
							<th>NIDN</th>
							<th>KODE DOSEN</th>
							<th>JABATAN AKADEMIK</th>
							<th class="datatable-nosort">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
							$no = 1;
							while($data = mysqli_fetch_array ($res)){ 
							?>
						<tr>
							<td><?php echo $no++;?></td>
							<td><?php echo $data['nama_dsn'];?></td>
							<td><?php echo $data['nidn'];?></td>
							<td><?php echo $data['kd_dsn'];?></td>
							<td><?php echo $data['jad'];?></td>
							<td>
							<div class="dropdown">
												<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
													<i class="dw dw-more"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
													<a class="dropdown-item" href="dosen-profile.php?id=<?php echo $data['nidn']; ?>"><i class="dw dw-eye"></i> View</a>
													<!-- <a class="dropdown-item" href="dosen-edit.php?id=<?php echo $data['nidn']; ?>"><i class="dw dw-edit2"></i> Edit</a>
													<a class="dropdown-item" data-id="<?php echo $data['nidn'];?>" delete href="#" data-href="dosen-del.php?id=<?php echo $data['nidn'];?>"><i class="dw dw-delete-3"></i> Delete</a> -->
												</div>
							</div>
							</td>
						</tr>
						<?php }
						?>
					</tbody>
				</table>
			</div>
			<?php include('../includes/footer.php') ?>
		</div>
	</div>
	<!-- js -->
	<?php include('../includes/scripts.php') ?>
	<script>
		var options = {
			series: [<?php echo $database_count['count(*)'];?>],
			grid: {
				padding: {
					top: 0,
					right: 0,
					bottom: 0,
					left: 0
				},
			},
			chart: {
				height: 100,
				width: 70,
				type: 'radialBar',
			},	
			plotOptions: {
				radialBar: {
					hollow: {
						size: '50%',
					},
					dataLabels: {
						name: {
							show: false,
							color: '#fff'
						},
						value: {
							show: true,
							color: '#333',
							offsetY: 5,
							fontSize: '15px'
						}
					}
				}
			},
			colors: ['#ecf0f4'],
			fill: {
				type: 'gradient',
				gradient: {
					shade: 'dark',
					type: 'diagonal1',
					shadeIntensity: 0.8,
					gradientToColors: ['#1b00ff'],
					inverseColors: false,
					opacityFrom: [1, 0.2],
					opacityTo: 1,
					stops: [0, 100],
				}
			},
			states: {
				normal: {
					filter: {
						type: 'none',
						value: 0,
					}
				},
				hover: {
					filter: {
						type: 'none',
						value: 0,
					}
				},
				active: {
					filter: {
						type: 'none',
						value: 0,
					}
				},
			}
		};
		var chart = new ApexCharts(document.querySelector("#chart"), options);
		chart.render();
	</script>

	<script>
		var options2 = {
		series: [<?php echo $database_count['count(*)'];?>],
		grid: {
			padding: {
				top: 0,
				right: 0,
				bottom: 0,
				left: 0
			},
		},
		chart: {
			height: 100,
			width: 70,
			type: 'radialBar',
		},	
		plotOptions: {
			radialBar: {
				hollow: {
					size: '50%',
				},
				dataLabels: {
					name: {
						show: false,
						color: '#fff'
					},
					value: {
						show: true,
						color: '#333',
						offsetY: 5,
						fontSize: '15px'
					}
				}
			}
		},
		colors: ['#ecf0f4'],
		fill: {
			type: 'gradient',
			gradient: {
				shade: 'dark',
				type: 'diagonal1',
				shadeIntensity: 1,
				gradientToColors: ['#009688'],
				inverseColors: false,
				opacityFrom: [1, 0.2],
				opacityTo: 1,
				stops: [0, 100],
			}
		},
		states: {
			normal: {
				filter: {
					type: 'none',
					value: 0,
				}
			},
			hover: {
				filter: {
					type: 'none',
					value: 0,
				}
			},
			active: {
				filter: {
					type: 'none',
					value: 0,
				}
			},
		}
	};
	var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);
	chart2.render();
	</script>
	<!-- <script src="../vendors/scripts/dashboard.js"></script> -->
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
</body>
</html>