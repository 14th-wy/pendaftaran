<div class="container-fluid">

	<?php

		$this->load->view("breadcrumb");

	?>


	<form target="_blank" method="GET" action="<?php echo base_url(). 'jurusan/report'; ?>">

		<div class="row" style="margin-top: 10px">

			<div class="col-2" style="margin: 0; max-width: 160px; padding-right: 0;">
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
				</div>  -->
				<div class="col-1" style="padding: 0">
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
		                <th>Kode Program Keahlian</th>
		                <th>No. Pendaftaran</th>
		                <th>Nama Calon Siswa</th>
		                <th>Program Keahlian</th>
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
			                <td><?=$u->KODE_PROGRAM_KEAHLIAN?></td>
			                <td><?=$u->NO_PENDAFTARAN?></td>
			                <td><?=$u->NAMA_CALON_SISWA?></td>
			                <td><?=$u->PROGRAM_KEAHLIAN?></td>
			                <td>
			                	<a href="<?php echo base_url(). 'jurusan/?kodeProgram='.$u->KODE_PROGRAM_KEAHLIAN; ?>" class="btn btn-link">Ubah</a>
			                	<button onclick="confirmDelete('<?=$u->KODE_PROGRAM_KEAHLIAN?>')" class="btn btn-link" data-toggle="modal" data-target="#staticBackdrop">Hapus</button>
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

		if($this->input->get('kodeProgram') != ""){
			$titleModal = "Edit Data ".$this->input->get('kodeProgram');	

			$data = $this->MJurusan->getSearch($this->input->get('kodeProgram'));

			// var_dump($data[0]);
		}else{
			$data[0]->KODE_PROGRAM_KEAHLIAN = "";
			$data[0]->NO_PENDAFTARAN = "";
			$data[0]->NAMA_CALON_SISWA = "";
			$data[0]->PROGRAM_KEAHLIAN = "";
		}
	?>

	<!-- Modal Add -->
	<form action="<?php echo base_url(). 'jurusan/save'; ?>" method="post">
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

		      				<input type="hidden" name="modeEdit" value="<?=$this->input->get('kodeProgram')?>">
		      				
			      			<div class="form-group">
							    <label for="kodeProgramKeahlian">Kode Program Keahlian</label>
							    <input readOnly="" type="text" class="form-control" id="kodeProgramKeahlian" name="kodeProgramKeahlian" value="<?=$data[0]->KODE_PROGRAM_KEAHLIAN?>">
							</div>

							<div class="form-group">
							    <label for="noPendaftaran">No. Pendaftaran</label>
							    <select class="form-control" id="noPendaftaran" name="noPendaftaran">

							      <option value="">Pilih No. Pendaftaran</option>
							      	<?php 
										$no = 1;
										foreach($noPendaftaran as $n){

											if($data[0]->NO_PENDAFTARAN == $n->NO_PENDAFTARAN){
									?>
													<option selected="" value="<?=$n->NO_PENDAFTARAN?>"><?=$n->NO_PENDAFTARAN?></option>
									<?php
											}else{
												?>
													<option value="<?=$n->NO_PENDAFTARAN?>"><?=$n->NO_PENDAFTARAN?></option>
												<?php
											}
										}
									?>
							    </select>
						    </div>

							<div class="form-group">
							    <label for="namaCalonSiswa">Nama Calon Siswa</label>
							    <input type="text" class="form-control" readonly="" id="namaCalonSiswa" name="namaCalonSiswa" value="<?=$data[0]->NAMA_CALON_SISWA?>">
							</div>

							<div class="form-group">
							    <label for="programKeahlian">Program Keahlian</label>
							    <input readOnly="" type="text" class="form-control" id="programKeahlian" name="programKeahlian" value="<?=$data[0]->PROGRAM_KEAHLIAN?>">
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

<form action="<?php echo base_url(). 'jurusan/delete'; ?>">
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
	      		<input type="hidden" name="kodeProgramKeahlian" id="delete_noPendaftaran" value="">

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
				url: "<?=base_url(). 'jurusan/getno'?>",
				data: "",
				dataType: 'json',
				success:function(data){
					console.log(data);
					$("#kodeProgramKeahlian").val(data);
				}
			});
		}

	    console.log($("#exampleModalLabel").text());

	 //    $.ajax({
  //           type: "post",
  //           url: "<?=base_url(). 'formpendaftaran/getDistinctNoPendaftaran'?>",
  //           data: "",
  //           dataType: 'json',
  //           success:function(data){

  //           	console.log(data);

  //           	for(var i = 0; i < data.length; i++){
  //           		var o = new Option(data[i].NO_PENDAFTARAN, data[i].NO_PENDAFTARAN);
		// 			$("#noPendaftaran").append(o);
  //           	}

  //            }
  //       });

        $('#noPendaftaran').on('change', function() {
        	var noPendaftaran = this.value;
		  	$.ajax({
	            type: "get",
	            url: "<?=base_url(). 'formpendaftaran/getNamaByNo'?>",
	            data: "noPendaftaran="+noPendaftaran,
	            dataType: 'json',
	            success:function(data){

	            	console.log(data);
	            	console.log(noPendaftaran);

	            	for(var i = 0; i < data.length; i++){
						$("#namaCalonSiswa").val(data[i].NAMA_CALON_SISWA);
						$("#programKeahlian").val(data[i].JURUSAN);
	            	}

	             }
	        });
		});

	} );

	function confirmDelete(noPendaftaran){

		$("#title_noPendaftaran").text("Hapus data dengan Kode "+noPendaftaran+" ?");
		$("#delete_noPendaftaran").val(noPendaftaran);

		console.log(noPendaftaran);
	}

</script>
