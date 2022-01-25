<?php   
    // session_start();
    // $page = "admin";
    include "../koneksi.php";
    $tabel1 = "t_dosen";
	$tabel2 = "t_user";
    $tabel3 = "t_pengajuan_jad";

    $sql_dosen = "SELECT nama_dsn, kd_dsn FROM $tabel1 order by nama_dsn asc";
	$res_dosen = mysqli_query($koneksi, $sql_dosen);

    $sql_pengajuan = "SELECT * FROM $tabel3 order by nama_dsn asc";
	$res_pengajuan = mysqli_query($koneksi, $sql_pengajuan);

    // print_r ($res_dosen);
    // die();
	
    if(!empty($_POST['simpan'])){
        $nama_dsn       = $_POST['nama_dsn'];
        $usulan_j       = $_POST['usulan_j'];
        $status_usulan  = $_POST['status_usulan'];
		
		$kd_d = explode('_', $nama_dsn);
		$nama_dsn = $kd_d[0];
		$kd_dsn = $kd_d[1];

		// print_r ($_POST);
        // die();
        // Query Insert Data

		$sql = "INSERT INTO $tabel3 VALUES ( '','$kd_dsn', '$usulan_j', '$status_usulan')";
        $qr = mysqli_query($koneksi, $sql) or die (mysqli_error($koneksi));

        if($qr){
			$message = "success";
		} else {
			$message = "failed";
		}

		// $level = '2';
		// $pass = preg_replace("/[-]+/", "",$tgl_lahir);

		// $sqlu = "INSERT INTO $table2 (username, password, level) VALUES ('$nip', md5($pass), '$level')";
		// $qru = mysqli_query ($koneksi, $sqlu);
		}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>SDM Teknik Informatika</title>

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
	<link rel="stylesheet" type="text/css" href="../src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../src/plugins/datatables/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/style.css">

    <!-- switchery css -->
	<link rel="stylesheet" type="text/css" href="../src/plugins/switchery/switchery.min.css">
	<!-- bootstrap-tagsinput css -->
	<link rel="stylesheet" type="text/css" href="../src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">
	<!-- bootstrap-touchspin css -->
	<link rel="stylesheet" type="text/css" href="../src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/style.css">

</head>
<body>
    <?php include('../includes/header.php') ?>

	<?php include('../includes/left-bar.php') ?>

	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Data Dosen</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Tambah Data Dosen</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
                <!-- Default Basic Forms Start -->
				<div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Form Pengajuan JAD</h4>
						</div>
					</div>
					<form method="post" action="">
                    <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Nama Dosen</label>
							<div class="col-sm-12 col-md-10">
								<select name ="nama_dsn" id="nama_dsn" class="custom-select2 form-control" data-style="btn-outline-primary" data-size="5">
                                <optgroup label="Pilih Nama Dosen" data-max-option="2">
                                <?php while ($data_dosen = mysqli_fetch_array($res_dosen)) { ?>
                                    <option value = "<?php echo $data_dosen['nama_dsn'].'_'.$data_dosen['kd_dsn']; ?>"> <?php echo $data_dosen['nama_dsn'].' - '.$data_dosen['kd_dsn']; ?></option>
                                    <?php } ?>
                                    </optgroup>
                                </select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Usulan JaFung</label>
							<div class="col-sm-12 col-md-10">
								<select name ="usulan_j" id="usulan_j" class="custom-select2 form-control" data-style="btn-outline-primary" data-size="5">
                                    <optgroup label="Jabatan Akademik Dosen" data-max-option="2">
                                    <option>Asisten Ahli (150 AK)</option>
                                    <option>Lektor (200 AK)</option>
                                    <option>Lektor (300 AK)</option>
                                    <option>Lektor Kepala (400 AK)</option>
                                    <option>Lektor Kepala (550 AK)</option>
                                    <option>Lektor Kepala (700 AK)</option>
                                    <option>Guru Besar (850 AK)</option>
                                    <option>Guru Besar (1050 AK)</option>
                                    </optgroup>
                                </select>
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Status Pengajuan</label>
							<div class="col-sm-12 col-md-10">
								<select name ="status_usulan" id="status_usulan" class="custom-select2 form-control" data-style="btn-outline-primary" data-size="5">
                                    <optgroup label="Proses Pengajuan" data-max-option="2">
                                    <option>Proses di Prodi</option>
                                    <option>Proses di Fakultas</option>
                                    <option>Upload ke Sistem</option>
                                    <option>Selesai</option>
                                    </optgroup>
                                </select>
							</div>
						</div>
                        <div class="row">
                            <div class= "col-md-2">
                            <!-- <input class="btn btn-outline-primary btn-lg btn-block" type="submit" name="simpan" value="Simpan"> -->
                            </div>
                            <div class= "col-md-2">
                            <input class="btn btn-outline-primary btn-lg btn-block" type="submit" name="simpan" value="Simpan">
                            </div>
                            <div class= "col-md-2">
                            <a class="btn btn-outline-danger btn-lg btn-block" href="dosen-list.php"> Batal </a>
                            </div>
                        </div>
					</form>
				</div>
			</div>
			<?php include('../includes/footer.php') ?>
		</div>
	</div>
	<?php include('../includes/scripts.php') ?>

	<!-- custom javascript -->
	<script type="text/javascript">
        $(document).ready(function() {
            <?php if(isset($message) && $message == "failed") {  ?>
			swal("Gagal", "Data Gagal Tersimpan", "error");
            window.setTimeout(function(){window.location = "pengajuan-jad-add.php"}, 2000);
            <?php }?>

            $("#success").hide();
            <?php if(isset($message) && $message == "success") {  ?>
				swal("Berhasil", "Data Berhasil Tersimpan", "success");
            window.setTimeout(function(){window.location = "pengajuan-jad-list.php"}, 2000);
            <?php }?>
        });
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
            return true;
        }
    </script>
</html>