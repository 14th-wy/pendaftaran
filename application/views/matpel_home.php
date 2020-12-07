<div class="container-fluid">

	<?php

		$this->load->view("breadcrumb");

	?>


	<form target="_blank" method="GET" action="<?php echo base_url(). 'formpendaftaran/report'; ?>">

		<div class="row" style="margin-top: 10px">

			<div class="col-2" style="margin: 0; max-width: 160px;">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
		</div>
	</form>

	</form>
	
	<div class="row" style="margin-top: 10px">
		
		<div class="col-sm">

			<table id="example" class="table table-striped table-bordered" style="width:100%; margin-top: 10px">
		        <thead>
		            <tr>
						<th>No. </th>
		                <th>Kode Mata Pelajaran</th>
		                <th>Nama Mata Pelajaran</th>
		                <th>KB</th>

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
			                <td><?=$u->kode_matpel?></td>
			                <td><?=$u->nama_matpel?></td>
			                <td><?=$u->kb?></td>
			                <td>
			                	<a href="<?php echo base_url(). 'formpendaftaran/?noPendaftaran='.$u->kode_matpel; ?>" class="btn btn-link">Ubah</a>
			                	<button onclick="confirmDelete('<?=$u->kode_matpel?>')" class="btn btn-link" data-toggle="modal" data-target="#staticBackdrop">Hapus</button>
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


			// var_dump($data[0]);
		}else{
			$data[0]->kode_matpel = "";
			$data[0]->nama_matpel = "";
			$data[0]->kb = "";
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

		      				<input type="hidden" name="modeEdit" value="<?=$this->input->get('kode_matpel')?>">
		      				
			      			<div class="form-group">
							    <label for="kode_matpel">Kode Mata Pelajaran</label>
							    <input type="text" class="form-control" id="kode_matpel" name="kode_matpel" value="<?=$data[0]->kode_matpel?>">
							</div>

							<div class="form-group">
							    <label for="nama_matpel">Nama Mata Pelajaran</label>
							    <input type="text" class="form-control" id="nama_matpel" name="nama_matpel" value="<?=$data[0]->nama_matpel?>">
							</div>

							<div class="form-group">
							    <label for="kb">KB</label>
							    <input type="text" class="form-control" id="kb" name="kb" value="<?=$data[0]->kb?>">
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
	    }

	    console.log($("#exampleModalLabel").text());

	} );

	function confirmDelete(noPendaftaran){

		$("#title_noPendaftaran").text("Hapus data dengan No. Pendaftaran "+noPendaftaran+" ?");
		$("#delete_noPendaftaran").val(noPendaftaran);

		console.log(noPendaftaran);
	}

</script>
