<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['Nimd'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$Nimd = $_GET['Nimd'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM dosen WHERE Nimd='$Nimd'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$Nama_Dsn			  = $_POST['Nama_Dsn'];
			$Jenis_Kelamind	= $_POST['Jenis_Kelamind'];
			$Program_Studid	= $_POST['Program_Studid'];

			$sql = mysqli_query($koneksi, "UPDATE dosen SET Nama_Dsn='$Nama_Dsn', Jenis_Kelamind='$Jenis_Kelamind', Program_Studid='$Program_Studid' WHERE Nimd='$Nimd'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="main.php?page=tampil_dsn";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="main.php?page=edit_dsn&Nimd=<?php echo $Nimd; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nim</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nimd" class="form-control" size="4" value="<?php echo $data['Nimd']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Mahasiswa</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="Nama_Dsn" class="form-control" value="<?php echo $data['Nama_Dsn']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamind" value="Laki-Laki" <?php if($data['Jenis_Kelamind'] == 'Laki-Laki'){ echo 'checked'; } ?> required>Laki-Laki
						</label>
						<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="Jenis_Kelamind" value="Perempuan" <?php if($data['Jenis_Kelamind'] == 'Perempuan'){ echo 'checked'; } ?> required>Perempuan
						</label>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Program Studi</label>
				<div class="col-md-6 col-sm-6">
					<select name="Program_Studid" class="form-control" required>
						<option value="">Pilih Program Studi</option>
						<option value="Teknik Informatika" <?php if($data['Program_Studid'] == 'Teknik Informatika'){ echo 'selected'; } ?>>Teknik Informatika</option>
						<option value="Teknik Sipil" <?php if($data['Program_Studid'] == 'Teknik Sipil'){ echo 'selected'; } ?>>Teknik Sipil</option>
						<option value="Teknik Kimia" <?php if($data['Program_Studid'] == 'Teknik Kimia'){ echo 'selected'; } ?>>Teknik Kimia</option>
						<option value="Teknik Elektro" <?php if($data['Program_Studid'] == 'Teknik Elektro'){ echo 'selected'; } ?>>Teknik Elektro</option>
						<option value="Akuntansi" <?php if($data['Program_Studid'] == 'Akuntansi'){ echo 'selected'; } ?>>Akuntansi</option>
						<option value="Manajemen" <?php if($data['Program_Studid'] == 'Manajemen'){ echo 'selected'; } ?>>Manajemen</option>
						<option value="Farmasi" <?php if($data['Program_Studid'] == 'Farmasi'){ echo 'selected'; } ?>>Farmasi</option>
						<option value="Hukum" <?php if($data['Program_Studid'] == 'Hukum'){ echo 'selected'; } ?>>Hukum</option>
						<option value="Kedokteran" <?php if($data['Program_Studid'] == 'Kedokteran'){ echo 'selected'; } ?>>Kedokteran</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="main.php?page=tampil_dsn" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
