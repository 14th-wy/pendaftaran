<div class="container-fluid">

	<?php

		$this->load->view("breadcrumb");

	?>


	<form target="_blank" method="GET" action="<?php echo base_url(). 'siswa/report'; ?>">

		<div class="row" style="margin-top: 10px">

			<div class="col-2" style="margin: 0; max-width: 160px; padding-right:0;">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
			</div>
				<!-- 
				<div class="col-2" style="padding: 0">
					<input type="date" class="form-control" id="startDate" name="startDate" value="" required="">
				</div>
				<div class="col-1" style="padding: 0">
					<center>sampai</center>
				</div>
				<div class="col-2" style="padding: 0">
					<input type="date" class="form-control" id="endDate" name="endDate" value="" required="">
				</div> -->
				<div class="col-1" style="padding: 0;">
					<a type="submit" class="btn btn-info">Report</a>
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
		                <th>NISN</th>
		                <th>Nama Siswa</th>
		                <th>Tempat Lahir</th>
		                <th>Tanggal Lahir</th>
		                <th>Jenis Kelamin</th>
		                <th>Agama</th>
		                <th>Status Dalam Keluarga</th>
		                <th>Anak Ke </th>
		                <th>Alamat Siswa</th>
		                <th>No Telepon Siswa</th>
		                <th>Sekolah Asal</th>
		                <th>Diterima Di Kelas</th>
		                <th>Pada Tanggal</th>
		                <th>Nama Ayah</th>
		                <th>Nama Ibu</th>
		                <th>Alamat Orang Tua</th>
		                <th>No Telepon Orang Tua</th>
		                <th>Pekerjaan Ayah</th>
		                <th>Pekerjaan Ibu</th>
		                <th>Nama Wali Siswa</th>
		                <th>Alamat Wali Siswa</th>
		                <th>No Telepon Rumah</th>
		                <th>Pekerjaan Wali Siswa</th>
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
			                <td><?=$u->nisn?></td>
			                <td><?=$u->nama_siswa?></td>
			                <td><?=$u->tempat_lahir?></td>
			                <td><?=$u->tanggal_lahir?></td>
			                <td><?=$u->jenis_kelamin?></td>
			                <td><?=$u->agama?></td>
			                <td><?=$u->status_dalam_keluarga?></td>
			                <td><?=$u->anak_ke?></td>
			                <td><?=$u->alamat_siswa?></td>
			                <td><?=$u->no_telepon_siswa?></td>
			                <td><?=$u->sekolah_asal?></td>
			                <td><?=$u->diterima_dikelas?></td>
			                <td><?=$u->pada_tanggal?></td>
			                <td><?=$u->nama_ayah?></td>
			                <td><?=$u->nama_ibu?></td>
			                <td><?=$u->alamat_orangtua?></td>
			                <td><?=$u->no_telepon_orangtua?></td>
			                <td><?=$u->pekerjaan_ayah?></td>
			                <td><?=$u->pekerjaan_ibu?></td>
			                <td><?=$u->nama_walisiswa?></td>
			                <td><?=$u->alamat_walisiswa?></td>
			                <td><?=$u->no_telepon_rumah?></td>
			                <td><?=$u->pekerjaan_walisiswa?></td>
			                <td>
			                	<a href="<?php echo base_url(). 'siswa/?nisn='.$u->nisn; ?>" class="btn btn-link">Ubah</a>
			                	<button onclick="confirmDelete('<?=$u->nisn?>')" class="btn btn-link" data-toggle="modal" data-target="#staticBackdrop">Hapus</button>
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

		if($this->input->get('nisn') != ""){
			$titleModal = "Edit Data ".$this->input->get('nisn');

			$data = $this->MSiswa->getSearch($this->input->get('nisn'));

//			 var_dump($data); exit;
		}else{
			$data[0]->nisn = "";
			$data[0]->nama_siswa = "";
			$data[0]->tempat_lahir = "";
			$data[0]->tanggal_lahir = "";
			$data[0]->jenis_kelamin = "";
			$data[0]->agama = "";
			$data[0]->status_dalam_keluarga = "";
			$data[0]->anak_ke = "";
			$data[0]->alamat_siswa = "";
			$data[0]->no_telepon_siswa = "";
            $data[0]->sekolah_asal = "";
            $data[0]->diterima_dikelas = "";
            $data[0]->pada_tanggal = "";
            $data[0]->nama_ayah = "";
            $data[0]->nama_ibu = "";
            $data[0]->alamat_orangtua = "";
            $data[0]->pekerjaan_ayah = "";
            $data[0]->pekerjaa_ibu = "";
			$data[0]->nama_walisiswa   = "";
			$data[0]->alamat_walisiswa   = "";
			$data[0]->no_telepon_walisiswa   = "";
			$data[0]->pekerjaan_walisiswa   = "";
		}
	?>

	<!-- Modal Add -->
	<form action="<?php echo base_url(). 'siswa/save'; ?>" method="post">
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

		      				<input type="hidden" name="modeEdit" value="<?=$this->input->get('nisn')?>">

			      			<div class="form-group">
							    <label for="nisn">NISN</label>
							    <input type="text" class="form-control" id="nisn" name="nisn" value="<?=$data[0]->nisn?>">
							</div>

							<div class="form-group">
							    <label for="nama_siswa">Nama Siswa</label>
							    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?=$data[0]->nama_siswa?>">
							</div>
							<div class="form-group">
							    <label for="tempat_lahir">Tempat Lahir</label>
							    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?=$data[0]->tempat_lahir?>">
							</div>
							<div class="form-group">
							    <label for="tanggal_lahir">Tanggal Lahir</label>
							    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?=$data[0]->tanggal_lahir?>">
							</div>
							<div class="form-group">
							    <label for="jenis_kelamin">Jenis Kelamin</label>
							    <select class="form-control" name="jenis_kelamin">
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
							</div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <select class="form-control" name="agama">
                                    <option value="">Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Khonghucu">Khonghucu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katholik">Katholik</option>
                                </select>
                            </div>
                            <div class="form-group">
							    <label for="anak_ke">Anak Ke</label>
							    <input type="number" class="form-control" id="anak_ke" name="anak_ke" value="<?=$data[0]->anak_ke?>">
							</div>
							<div class="form-group">
							    <label for="alamat_siswa">Alamat Siswa</label>
                                <textarea class="form-control" name="alamat_siswa" id="" cols="30" rows="5" value="<?=$data[0]->alamat_siswa?>"></textarea>
							</div>
							<div class="form-group">
							    <label for="no_telepon_siswa">No Telepon Siswa</label>
							    <input type="number" class="form-control" id="no_telepon_siswa" name="no_telepon_siswa" value="<?=$data[0]->no_telepon_siswa?>">
							</div>
                            <div class="form-group">
                                <label for="status_dalam_keluarga">Status Dalam Keluarga</label>
                                <input type="text" class="form-control" id="status_dalam_keluarga" name="status_dalam_keluarga" value="<?=$data[0]->status_dalam_keluarga?>">
                            </div>
                            <div class="form-group">
                                <label for="sekolah_asal">Sekolah Asal</label>
                                <input type="text" class="form-control" id="sekolah_asal" name="sekolah_asal" value="<?=$data[0]->sekolah_asal?>">
                            </div>
                            <div class="form-group">
                                <label for="diterima_dikelas">Diterima Dikelas</label>
                                <input type="text" class="form-control" id="diterima_dikelas" name="diterima_dikelas" value="<?=$data[0]->diterima_dikelas?>">
                            </div>
                            <div class="form-group">
                                <label for="pada_tanggal">Pada Tanggal</label>
                                <input type="date" class="form-control" id="pada_tanggal" name="pada_tanggal" value="<?=$data[0]->pada_tanggal?>">
                            </div>
                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" value="<?=$data[0]->nama_ayah?>">
                            </div>
                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?=$data[0]->nama_ibu?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat_orangtua">Alamat Orang Tua</label>
                                <textarea class="form-control" id="alamat_orangtua" name="alamat_orangtua" rows="5" cols="30" value="<?=$data[0]->alamat_orangtua?>"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="no_telepon_ortu">No Telepon Orang Tua</label>
                                <input type="number" class="form-control" id="no_telepon_ortu" name="no_telepon_ortu" value="<?=$data[0]->no_telepon_orangtua?>">
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" value="<?=$data[0]->pekerjaan_ayah?>">
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" value="<?=$data[0]->pekerjaan_ibu?>">
                            </div>
                            <div class="form-group">
                                <label for="nama_walisiswa">Nama Wali Siswa</label>
                                <input type="text" class="form-control" id="nama_walisiswa" name="nama_walisiswa" value="<?=$data[0]->nama_walisiswa?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat_walisiswa">Alamat Wali Siswa</label>
                                <textarea class="form-control" id="alamat_walisiswa" name="alamat_walisiswa" rows="5" cols="30" value="<?=$data[0]->alamat_walisiswa?>"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="no_telepon_rumah">No Telepon Rumah</label>
                                <input type="number" class="form-control" id="no_telepon_rumah" name="no_telepon_rumah" value="<?=$data[0]->no_telepon_rumah?>">
                            </div>
                            <div class="form-group">
                                <label for="pekerjaan_walisiswa">Pekerjaan Wali Siswa</label>
                                <input type="text" class="form-control" id="pekerjaan_walisiswa" name="pekerjaan_walisiswa" value="<?=$data[0]->pekerjaan_walisiswa?>">
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

<form method="post" action="<?php echo base_url(). 'siswa/delete'; ?>">
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
	      		<input type="hidden" name="deleteId" id="delete_kodeKelas" value="">

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
				url: "<?=base_url(). 'siswa/getno'?>",
				data: "",
				dataType: 'json',
				success:function(data){
					console.log(data);
					$("#KODE_SISWA").val(data);
				}
			});
		}

	    console.log($("#exampleModalLabel").text());

        $('#KODE_KELAS').on('change', function() {
        	var noPendaftaran = this.value;
		  	$.ajax({
	            type: "get",
	            url: "<?=base_url(). 'kelas/getSearch'?>",
	            data: "noPendaftaran="+noPendaftaran,
	            dataType: 'json',
	            success:function(data){

	            	console.log(data);
	            	console.log(noPendaftaran);

	            	for(var i = 0; i < data.length; i++){
						$("#NAMA_JURUSAN").val(data[i].NAMA_JURUSAN);
	            	}

	             }
	        });
		});

		$('#NO_PEMBAYARAN').on('change', function() {
        	var noPendaftaran = this.value;
		  	$.ajax({
	            type: "get",
	            url: "<?=base_url(). 'formpembayaran/getSearch'?>",
	            data: "noPembayaran="+noPendaftaran,
	            dataType: 'json',
	            success:function(data){

	            	console.log(data);

	            	for(var i = 0; i < data.length; i++){
						// $("#KODE_SISWA").val(data[i].KODE_CALON_SISWA);
						$("#NAMA_SISWA").val(data[i].NAMA_CALON_SISWA);
	            	}

	             }
	        });
		});

	} );

	function confirmDelete(noPendaftaran){

		$("#title_noPendaftaran").text("Hapus data dengan Kode "+noPendaftaran+" ?");
		$("#delete_kodeKelas").val(noPendaftaran);

		console.log(noPendaftaran);
	}

</script>
