<?php   
    // session_start();
    $page = "admin";
    include "../koneksi.php";
    $tabel1 = "t_dosen";
	$tabel2 = "t_user";
	
    if(!empty($_POST['simpan'])){
        $nidn           = $_POST['nidn'];
        $kd_dsn         = $_POST['kd_dsn'];
        $nama_dsn       = $_POST['nama_dsn'];
        $jk_dsn         = $_POST['jk_dsn'];
        $tmp_lahir      = $_POST['tmp_lahir'];
        $tgl_lahir      = date('Y-m-d', strtotime($_POST['tgl_lahir']));
        $gelar_dpn      = isset($_POST['gelar_depan'])?$_POST['gelar_depan']:"";
        $gelar_blkng    = $_POST['gelar_blkng'];
        $bidang_keahlian = $_POST['bidang_keahlian'];
		$jad            = $_POST['jad'];
		$ps           	= $_POST['ps'];
		$status_dsn     = $_POST['status_dsn'];
		
		
        // Query Insert Data

		$sql = "INSERT INTO $tabel1 (nidn, kd_dsn, nama_dsn, jk_dsn, tmp_lahir, tgl_lahir, gelar_dpn, gelar_blkng, bidang_keahlian, jad, status_dsn, ps) 
		VALUES ('$nidn', '$kd_dsn', '$nama_dsn', '$jk_dsn', '$tmp_lahir', '$tgl_lahir', '$gelar_dpn', '$gelar_blkng', '$bidang_keahlian', '$jad', '$status_dsn', '$ps')";
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
							<h4 class="text-blue h4">Form Tambah Dosen</h4>
						</div>
					</div>
					<form method="post" action="">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Nama Lengkap</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" id="nama_dsn" name="nama_dsn" placeholder="Masukkan Nama Lengkap" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Gelar Depan</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" id="gelar_depan" name="gelar_depan" placeholder="Gelar Depan" type="text">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Gelar Belakang</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" id="gelar_blkng" name="gelar_blkng" placeholder="Gelar Belakang" type="text">
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">NIDN</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" id="nidn" name="nidn" onkeydown="return isNumberKey(this, event);" placeholder="Masukkan NIDN">
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Kode Dosen</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" id="kd_dsn" name="kd_dsn" onkeydown="return isNumberKey(this, event);" placeholder="Masukkan Kode Dosen">
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Tempat Lahir</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" id="tmp_lahir" name="tmp_lahir" placeholder="Masukkan Tempat Lahir">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Tanggal Lahir</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control date-picker" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" type="text">
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Jenis Kelamin</label>
							<div class="col-sm-12 col-md-2">
                                <input type="radio" name="jk_dsn" id="jk_l" value="L" autocomplete="off" checked> L
                            </div>
                            <div class="col-sm-12 col-md-2">
                                <input type="radio" name="jk_dsn" id="jk_p" autocomplete="off" value="P" > P
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Jabatan Akademik</label>
							<div class="col-sm-12 col-md-10">
								<select name ="jad" id="jad" class="custom-select2 form-control" data-style="btn-outline-primary" data-size="5">
                                    <optgroup label="Jabatan Akademik Dosen" data-max-option="2">
                                    <option>Tenaga Pengajar</option>
                                    <option>Asisten Ahli</option>
                                    <option>Lektor</option>
                                    <option>Lektor Kepala</option>
                                    <option>Guru Besar</option>
                                    </optgroup>
                                </select>
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Bidang Keahlian</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" id="bidang_keahlian" name="bidang_keahlian" placeholder="Masukkan Bidang Keahlian">
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Status Dosen</label>
							<div class="col-sm-12 col-md-2">
                                <input type="radio" name="status_dsn" id="status_a" autocomplete="off" value="aktif" checked> Aktif
                            </div>
                            <div class="col-sm-12 col-md-2">
                                <input type="radio" name="status_dsn" id="status_n" autocomplete="off" value="non_aktif" > Non Aktif
							</div>
						</div>
                        <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Kesesuaian PS</label>
							<div class="col-sm-12 col-md-2">
                                <input type="radio" name="ps" id="sesuai_p" autocomplete="off" value="ps" checked> Sesuai PS
                            </div>
                            <div class="col-sm-12 col-md-2">
                                <input type="radio" name="ps" id="non_ps" autocomplete="off" value="non_ps"> Non PS
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
            window.setTimeout(function(){window.location = "dosen-add.php"}, 2000);
            <?php }?>

            $("#success").hide();
            <?php if(isset($message) && $message == "success") {  ?>
				swal("Berhasil", "Data Berhasil Tersimpan", "success");
            window.setTimeout(function(){window.location = "dosen-list.php"}, 2000);
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