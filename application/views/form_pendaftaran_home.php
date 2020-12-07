<div class="container-fluid">

	<?php

		$this->load->view("breadcrumb");

	?>


	<form target="_blank" method="GET" action="<?php echo base_url(). 'formpendaftaran/report2'; ?>">

		<div class="row" style="margin-top: 10px">

			<div class="col-2" style="margin: 0; max-width: 160px;">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
			</div>
				
				<!-- <div class="col-2" style="padding: 0">
					<input type="date" class="form-control" id="startDate" name="startDate" value="" required="">
				</div>
				<div class="col-1" style="padding: 0">
					<center>sampai</center>
				</div>
				<div class="col-2" style="padding: 0">
					<input type="date" class="form-control" id="endDate" name="endDate" value="" required="">
				</div> -->
				<div class="col-1" style="padding: 0;">
					<button type="submit" class="btn btn-info">Report</a>	
				</div>

			<div class="col-sm-9"></div>

			</form>
		</div>

	</form>
	
	<div class="row" style="margin-top: 10px">
		
		<div class="col-sm">

			<table id="example" class="table table-striped table-bordered" style="width:100%; margin-top: 10px">
		        <thead>
		            <tr>
		                <th>No</th>
		                <th>No. Pendaftaran</th>
		                <th>Nama Calon Siswa</th>
		                <th>Jenis Kelamin</th>
		                <th>Tempat Lahir</th>
		                <th>Tanggal Lahir</th>
		                <th>Agama</th>
		                <th>Sekolah Asal</th>
		                <th>Tahun Ijazah</th>
		                <th>No Ijazah</th>
		                <th>NISN</th>
		                <th>Jurusan</th>
		                <th>Alamat</th>
		                <th>Nama Orang Tua</th>
		                <th>Alamat Orang Tua</th>
		                <th>Telepon</th>
		                <th>Ijazah</th>
		                <th>Kartu Keluarga</th>
		                <th>SKHUN</th>
		                <th>NISN</th>
		                <th>Tanggal Pendaftaran</th>
		                <th></th>
		            </tr>
		        </thead>
		        <tbody>

		        	<?php 
						$no = 1;
						foreach($data as $u){ 
					?>

			            <tr>
			                <td><?=$no++?></td>
			                <td><?=$u->NO_PENDAFTARAN?></td>
			                <td><?=$u->NAMA_CALON_SISWA?></td>
			                <td><?=$u->JENIS_KELAMIN?></td>
			                <td><?=$u->TEMPAT?></td>
			                <td><?=$u->TANGGAL_LAHIR?></td>
			                <td><?=$u->AGAMA?></td>
			                <td><?=$u->SEKOLAH_ASAL?></td>
			                <td><?=$u->TAHUN_IJAZAH?></td>
			                <td><?=$u->NOMOR_IJAZAH?></td>
			                <td><?=$u->NISN?></td>
			                <td><?=$u->JURUSAN?></td>
			                <td><?=$u->ALAMAT?></td>
			                <td><?=$u->NAMA_ORANGTUA?></td>
			                <td><?=$u->ALAMAT_ORANGTUA?></td>
			                <td><?=$u->TELEPON?></td>
			                <td><?=$u->C_IJAZAH?></td>
			                <td><?=$u->C_KK?></td>
			                <td><?=$u->C_SKHUN?></td>
			                <td><?=$u->C_NISN?></td>
			                <td><?=$u->TANGGAL_PENDAFTARAN?></td>
			                <td>
			                	<a href="<?php echo base_url(). 'formpendaftaran/?noPendaftaran='.$u->NO_PENDAFTARAN; ?>" class="btn btn-link">Ubah</a>
			                	<button onclick="confirmDelete('<?=$u->NO_PENDAFTARAN?>')" class="btn btn-link" data-toggle="modal" data-target="#staticBackdrop">Hapus</button>
			                </td>
			            </tr>

		            <?php 
						}
					?>

		        </tbody>
		    </table>
		</div>

	</div>

	<?php
		$titleModal = "Tambah Data";

		if($this->input->get('noPendaftaran') != ""){
			$titleModal = "Edit Data ".$this->input->get('noPendaftaran');	

			$data = $this->MFormPendaftaran->getSearch($this->input->get('noPendaftaran'));
			$tglLahirOrginal = $data[0]->TANGGAL_LAHIR;
			$tglPendaftaranOriginal = $data[0]->TANGGAL_PENDAFTARAN;
			$data[0]->TANGGAL_LAHIR = date("Y-m-d", strtotime($tglLahirOrginal));
			$data[0]->TANGGAL_PENDAFTARAN = date("Y-m-d", strtotime($tglPendaftaranOriginal));


			// var_dump($data[0]);
		}else{
			$data[0]->NO_PENDAFTARAN = "";
			$data[0]->NAMA_CALON_SISWA = "";
			$data[0]->JENIS_KELAMIN = "";
			$data[0]->TEMPAT = "";
			$data[0]->TANGGAL_LAHIR = "";
			$data[0]->AGAMA = "";
			$data[0]->SEKOLAH_ASAL = "";
			$data[0]->TAHUN_IJAZAH = "";
			$data[0]->NOMOR_IJAZAH = "";
			$data[0]->NISN = "";
			$data[0]->JURUSAN = "";
			$data[0]->ALAMAT = "";
			$data[0]->NAMA_ORANGTUA = "";
			$data[0]->ALAMAT_ORANGTUA = "";
			$data[0]->TELEPON = "";
			$data[0]->C_IJAZAH = "";
			$data[0]->C_KK = "";
			$data[0]->C_SKHUN = "";
			$data[0]->C_NISN = "";
			$data[0]->TANGGAL_PENDAFTARAN = "";
		}
	?>

	<!-- Modal Add -->
	<form action="<?php echo base_url(). 'formpendaftaran/save'; ?>" method="post">
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-scrollable modal-xl">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel"><?=$titleModal?></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      		
		      		<div class="row">
		      			
		      			<div class="col-sm">

		      				<input type="hidden" name="modeEdit" value="<?=$this->input->get('noPendaftaran')?>">
		      				
			      			<div class="form-group">
							    <label for="noPendaftaran">No. Pendaftaran</label>
							    <input readOnly="" type="text" class="form-control" id="noPendaftaran" name="noPendaftaran" value="<?=$data[0]->NO_PENDAFTARAN?>">
							</div>

							<div class="form-group">
							    <label for="namaCalonSiswa">Nama Calon Siswa</label>
							    <input type="text" class="form-control" id="namaCalonSiswa" name="namaCalonSiswa" value="<?=$data[0]->NAMA_CALON_SISWA?>">
							</div>

							<div class="form-group">
							    <label for="jenisKelamin">Jenis Kelamin</label>
								<select class="form-control" id="jenisKelamin" name="jenisKelamin">
									<option value="Laki-Laki" <?php if($data[0]->JENIS_KELAMIN == "Laki-Laki"){ echo "selected"; } ?> >Laki-Laki</option>
									<option value="Perempuan" <?php if($data[0]->JENIS_KELAMIN == "Perempuan"){ echo "selected"; } ?>>Perempuan</option>
								</select>
							</div>

							<div class="form-group">
							    <label for="tempatLahir">Tempat Lahir</label>
							    <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" value="<?=$data[0]->TEMPAT?>">
							</div>

							<div class="form-group">
							    <label for="tanggalLahir">Tanggal Lahir</label>
							    <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" value="<?=$data[0]->TANGGAL_LAHIR?>">
							</div>

							<div class="form-group">
							    <label for="agama">Agama</label>
								<select class="form-control" name="agama" id="agama">
									<option value="Islam" <?php if($data[0]->AGAMA == "Islam"){ echo "selected"; } ?>>Islam</option>
									<option value="Protestan" <?php if($data[0]->AGAMA == "Protestan"){ echo "selected"; } ?>>Protestan</option>
									<option value="Katolik" <?php if($data[0]->AGAMA == "Katolik"){ echo "selected"; } ?>>Katolik</option>
									<option value="Hindu" <?php if($data[0]->AGAMA == "Hindu"){ echo "selected"; } ?>>Hindu</option>
									<option value="Buddha" <?php if($data[0]->AGAMA == "Buddha"){ echo "selected"; } ?>>Buddha</option>
									<option value="Konghucu" <?php if($data[0]->AGAMA == "Konghucu"){ echo "selected"; } ?>>Konghucu</option>
								</select>
							</div>

							<div class="form-group">
							    <label for="sekolahAsal">Sekolah Asal</label>
							    <input type="text" class="form-control" id="sekolahAsal" name="sekolahAsal" value="<?=$data[0]->SEKOLAH_ASAL?>">
							</div>

							<div class="form-group">
							    <label for="tahunIjazah">Tahun Ijazah</label>
							    <input type="text" class="form-control" id="tahunIjazah" name="tahunIjazah" value="<?=$data[0]->TAHUN_IJAZAH?>">
							</div>

							<div class="form-group">
							    <label for="noIjazah">No Ijazah</label>
							    <input type="text" class="form-control" id="noIjazah" name="noIjazah" value="<?=$data[0]->NOMOR_IJAZAH?>">
							</div>

		      			</div>

		      			<div class="col-sm">

							<div class="form-group">
							    <label for="nisn">NISN</label>
							    <input type="text" class="form-control" id="nisn" name="nisn" value="<?=$data[0]->NISN?>">
							</div>

							<div class="form-group">
							    <label for="jurusan">Jurusan</label>
								<select class="form-control" id="jurusan" name="jurusan">
									<option value="Teknik Permesinan" <?php if($data[0]->JURUSAN == "Teknik Permesinan"){ echo "selected"; } ?> >Teknik Permesinan</option>
									<option value="Teknik instalasi tenaga listrik" <?php if($data[0]->JURUSAN == "Teknik instalasi tenaga listrik"){ echo "selected"; } ?>>Teknik instalasi tenaga listrik</option>
									<option value="Teknik kendaraan ringan" <?php if($data[0]->JURUSAN == "Teknik kendaraan ringan"){ echo "selected"; } ?>>Teknik kendaraan ringan</option>
									<option value="Administrasi perkantoran" <?php if($data[0]->JURUSAN == "Administrasi perkantoran"){ echo "selected"; } ?>>Administrasi perkantoran</option>
									<option value="Akuntansi" <?php if($data[0]->JURUSAN == "Akuntansi"){ echo "selected"; } ?>>Akuntansi</option>
								</select>
							</div>

							<div class="form-group">
							    <label for="alamat">Alamat</label>
							    <input type="text" class="form-control" id="alamat" name="alamat" value="<?=$data[0]->ALAMAT?>">
							</div>

							<div class="form-group">
							    <label for="namaOrangTua">Nama Orang Tua</label>
							    <input type="text" class="form-control" id="namaOrangTua" name="namaOrangTua" value="<?=$data[0]->NAMA_ORANGTUA?>">
							</div>

							<div class="form-group">
							    <label for="alamatOrangTua">Alamat Orang Tua</label>
							    <input type="text" class="form-control" id="alamatOrangTua" name="alamatOrangTua" value="<?=$data[0]->ALAMAT_ORANGTUA?>">
							</div>

							<div class="form-group">
							    <label for="telepon">Telepon</label>
							    <input type="text" class="form-control" id="telepon" name="telepon" value="<?=$data[0]->TELEPON?>">
							</div>

							<div class="row">
								<div class="col-sm">
									<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="X" id="ijazah" name="ijazah" <?php if($data[0]->C_IJAZAH == "X") echo 'checked="checked"'; ?> >
									  <label class="form-check-label" for="ijazah">
									    Ijazah
									  </label>
									</div>

									<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="X" id="kartuKeluarga" name="kartuKeluarga" <?php if($data[0]->C_KK == "X") echo 'checked="checked"'; ?> >
									  <label class="form-check-label" for="kartuKeluarga">
									    Kartu Keluarga
									  </label>
									</div>
								</div>
								<div class="col-sm">
									<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="X" id="skhun" name="skhun" <?php if($data[0]->C_SKHUN == "X") echo 'checked="checked"'; ?> >
									  <label class="form-check-label" for="skhun">
									    SKHUN
									  </label>
									</div>

									<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="X" id="cnisn" name="cnisn" <?php if($data[0]->C_NISN == "X") echo 'checked="checked"'; ?> >
									  <label class="form-check-label" for="cnisn">
									    NISN
									  </label>
									</div>
								</div>
							</div>

							<div class="form-group">
							    <label for="tanggalPendaftaran">Tanggal Pendaftaran</label>
							    <input type="date" class="form-control" id="tanggalPendaftaran" name="tanggalPendaftaran" value="<?=$data[0]->TANGGAL_PENDAFTARAN?>">
							</div>

		      			</div>

		      		</div>

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
		        <button type="submit" class="btn btn-success">Simpan</button>
		      </div>
		    </div>
		  </div>
		</div>

	</form>

</div>

<!-- Modal delete -->

<form action="<?php echo base_url(). 'formpendaftaran/delete'; ?>">
	<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="staticBackdropLabel">Hapus</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">

	      		<center id="title_noPendaftaran" ></center>
	      		<input type="hidden" name="noPendaftaran" id="delete_noPendaftaran" value="">

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
	        <button type="submit" class="btn btn-danger">Hapus</button>
	      </div>
	    </div>
	  </div>
	</div>
</form>

<script>
	$(document).ready(function() {
	    $('#example').DataTable( {
	        "scrollX": true
	    } );

	    if($("#exampleModalLabel").text().indexOf("Edit Data") != -1){
	    	console.log("mode edit");
	    	$('#exampleModal').modal('show');
	    }else{
			$.ajax({
				type: "get",
				url: "<?=base_url(). 'formpendaftaran/getno'?>",
				data: "",
				dataType: 'json',
				success:function(data){
					console.log(data);
					$("#noPendaftaran").val(data);
				}
			});
		}

	    console.log($("#exampleModalLabel").text());

		

	} );

	function confirmDelete(noPendaftaran){

		$("#title_noPendaftaran").text("Hapus data dengan No. Pendaftaran "+noPendaftaran+" ?");
		$("#delete_noPendaftaran").val(noPendaftaran);

		console.log(noPendaftaran);
	}

</script>
