<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$Nimd			= $_POST['Nimd'];
			$Nama_Dsn			= $_POST['Nama_Dsn'];
			$Jenis_Kelamind	= $_POST['Jenis_Kelamind'];
			$Program_Studid		= $_POST['Program_Studid'];

			$cek = mysqli_query($koneksi, "SELECT * FROM dosen WHERE Nimd='$Nimd'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO dosen(Nimd, Nama_Dsn, Jenis_Kelamind, Program_Studid) VALUES('$Nimd', '$Nama_Dsn', '$Jenis_Kelamind', '$Program_Studid')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="main.php?page=tampil_dsn";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, NIM sudah terdaftar.</div>';
			}
		}
		?>

		<form action="main.php?page=tambah_dsn" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nim</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="Nimd" class="form-control" size="4" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Mahasiswa</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Dsn" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamind" value="Laki-Laki" required>Laki-Laki
						</label>
						<label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamind" value="Perempuan" required>Perempuan
						</label>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Program Studi</label>
				<div class="col-md-6 col-sm-6">
					<select name="Program_Studid" class="form-control" required>
						<option value="">Pilih Program Studi</option>
						<option value="Teknik Informatika">Teknik Informatika</option>
						<option value="Teknik SipilL">Teknik Sipil</option>
						<option value="Teknik Kimia">Teknik Kimia</option>
						<option value="Teknik Elektro">Teknik Elektro</option>
						<option value="Akuntansi">Akuntansi</option>
						<option value="Manajemen">Manajemen</option>
						<option value="Farmasi">Farmasi</option>
						<option value="Hukum">Hukum</option>
						<option value="Kedokteran">Kedokteran</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
