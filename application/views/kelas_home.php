<div class="container-fluid">

	<?php

		$this->load->view("breadcrumb");

	?>


	<form target="_blank" method="GET" action="<?php echo base_url(). 'formpendaftaran/report'; ?>">

		<div class="row" style="margin-top: 10px">

			<div class="col-2" style="margin: 0; max-width: 160px;">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
				<a type="button" href="<?php echo base_url(). 'kelas/laporan'; ?>" class="btn btn-primary">Laporan</a>
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
				</div>
				<div class="col-1">
					<button type="submit" class="btn btn-info">Report</a>	
				</div> -->

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
		                <th>Kode Kelas</th>
		                <th>Nama Kelas</th>
		                <th>Kode Jurusan</th>
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
			                <td><?=$u->kode_kelas?></td>
			                <td><?=$u->nama_kelas?></td>
			                <td><?=$u->kode_jurusan?></td>
			                <td><?=$u->nama_jurusan?></td>
			                <td>
			                	<a href="<?php echo base_url(). 'kelas/?kodeKelas='.$u->kode_kelas; ?>" class="btn btn-link">Ubah</a>
			                	<button onclick="confirmDelete('<?=$u->kode_kelas?>')" class="btn btn-link" data-toggle="modal" data-target="#staticBackdrop">Hapus</button>
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

		if($this->input->get('kodeKelas') != ""){
			$titleModal = "Edit Data ".$this->input->get('kodeKelas');	

			$data = $this->MKelas->getSearch($this->input->get('kodeKelas'));

			//var_dump($data[0]);
		}else{
			$data[0]->kode_kelas = "";
			$data[0]->nama_kelas = "";
			$data[0]->kode_jurusan = "";
			$data[0]->nama_jurusan = "";
		}
	?>

	<!-- Modal Add -->
	<form action="<?php echo base_url(). 'kelas/save'; ?>" method="post">
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

		      				<input type="hidden" name="modeEdit" value="<?=$this->input->get('kodeKelas')?>">
		      				
			      			<div class="form-group">
							    <label for="kode_kelas">Kode Kelas</label>
							    <input type="text" class="form-control" id="kode_kelas" name="kode_kelas" value="<?=$data[0]->kode_kelas?>">
							</div>

							<div class="form-group">
							    <label for="nama_kelas">Nama Kelas</label>
							    <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="<?=$data[0]->nama_kelas?>">
							</div>

							<div class="form-group">
							    <label for="kode_jurusan">Kode Jurusan</label>
							    <select class="form-control" id="kode_jurusan" name="kode_jurusan">

								  <option value="">Kode Jurusan</option>
							      	<?php 
										$no = 1;
										foreach($kodeProgramKeahlian as $n){

											if($data[0]->kode_jurusan == $n->kode_jurusan){
									?>
													<option selected="" value="<?=$n->kode_jurusan?>"><?=$n->kode_jurusan?></option>
									<?php
											}else{
												?>
													<option value="<?=$n->kode_jurusan?>"><?=$n->kode_jurusan?></option>
												<?php
											}
										}
									?>
							    </select>
						    </div>

							<div class="form-group">
							    <label for="nama_jurusan">Nama Jurusan</label>
							    <input readonly="" type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" value="<?=$data[0]->nama_jurusan?>">
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

<form method="post" action="<?php echo base_url(). 'kelas/delete'; ?>">
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
	      		<input type="hidden" name="delete_kodeKelas" id="delete_kodeKelas" value="">

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-light" data-dismiss="modal">Batal ah</button>
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

        $('#kode_jurusan').on('change', function() {
        	var q = this.value;
		  	$.ajax({
	            type: "get",
	            url: "<?=base_url(). 'jurusan/getNamaByNo'?>",
	            data: "q="+q,
	            dataType: 'json',
	            success:function(data){

	            	console.log(data);
	            	console.log(q);

	            	for(var i = 0; i < data.length; i++){
						$("#nama_jurusan").val(data[i].nama_jurusan);
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
