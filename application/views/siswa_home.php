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
		                <th>No. Pembayaran</th>
		                <th>Kode Siswa</th>
		                <th>Nama Siswa</th>
		                <th>Kode Kelas</th>
		                <th>Nama Jurusan</th>
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
			                <td><?=$u->NO_PEMBAYARAN?></td>
			                <td><?=$u->KODE_SISWA?></td>
			                <td><?=$u->NAMA_SISWA?></td>
			                <td><?=$u->KODE_KELAS?></td>
			                <td><?=$u->NAMA_JURUSAN?></td>
			                <td>
			                	<a href="<?php echo base_url(). 'siswa/?key='.$u->KODE_SISWA; ?>" class="btn btn-link">Ubah</a>
			                	<button onclick="confirmDelete('<?=$u->KODE_SISWA?>')" class="btn btn-link" data-toggle="modal" data-target="#staticBackdrop">Hapus</button>
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

		if($this->input->get('key') != ""){
			$titleModal = "Edit Data ".$this->input->get('key');	

			$data = $this->MSiswa->getSearch($this->input->get('key'));

			// var_dump($data[0]);
		}else{
			$data[0]->NO_PEMBAYARAN = "";
			$data[0]->KODE_SISWA = "";
			$data[0]->NAMA_SISWA = "";
			$data[0]->KODE_KELAS = "";
			$data[0]->NAMA_JURUSAN = "";
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

		      				<input type="hidden" name="modeEdit" value="<?=$this->input->get('key')?>">

		      				<div class="form-group">
							    <label for="NO_PEMBAYARAN">No. Pembayaran</label>
							    <select class="form-control" id="NO_PEMBAYARAN" name="NO_PEMBAYARAN">

							      <option value="">Pilih No. Pembayaran</option>
							      	<?php 
										$no = 1;
										foreach($noPembayaran as $n){

											if($data[0]->NO_PEMBAYARAN == $n->NO_PEMBAYARAN){
									?>
													<option selected="" value="<?=$n->NO_PEMBAYARAN?>"><?=$n->NO_PEMBAYARAN?></option>
									<?php
											}else{
												?>
													<option value="<?=$n->NO_PEMBAYARAN?>"><?=$n->NO_PEMBAYARAN?></option>
												<?php
											}
										}
									?>
							    </select>
						    </div>
		      				
			      			<div class="form-group">
							    <label for="KODE_SISWA">Kode Siswa</label>
							    <input readonly="" type="text" class="form-control" id="KODE_SISWA" name="KODE_SISWA" value="<?=$data[0]->KODE_SISWA?>">
							</div>

							<div class="form-group">
							    <label for="NAMA_SISWA">Nama Siswa</label>
							    <input readonly="" type="text" class="form-control" id="NAMA_SISWA" name="NAMA_SISWA" value="<?=$data[0]->NAMA_SISWA?>">
							</div>

							<div class="form-group">
							    <label for="KODE_KELAS">Kode Kelas</label>
							    <select class="form-control" id="KODE_KELAS" name="KODE_KELAS">

							      <option value="">Pilih Kode Program Keahlian</option>
							      	<?php 
										$no = 1;
										foreach($kodeKelas as $n){

											if($data[0]->KODE_KELAS == $n->KODE_KELAS){
									?>
													<option selected="" value="<?=$n->KODE_KELAS?>"><?=$n->KODE_KELAS?></option>
									<?php
											}else{
												?>
													<option value="<?=$n->KODE_KELAS?>"><?=$n->KODE_KELAS?></option>
												<?php
											}
										}
									?>
							    </select>
						    </div>

							<div class="form-group">
							    <label for="NAMA_JURUSAN">Nama Jurusan</label>
							    <input readonly="" type="text" class="form-control" id="NAMA_JURUSAN" name="NAMA_JURUSAN" value="<?=$data[0]->NAMA_JURUSAN?>">
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
