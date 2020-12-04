<div class="container-fluid">

	<?php

		$this->load->view("breadcrumb");

	?>


	<form target="_blank" method="GET" action="<?php echo base_url(). 'formpendaftaran/report'; ?>">

		<div class="row" style="margin-top: 10px">

			<div class="col-2" style="margin: 0; max-width: 160px;">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
			</div>
				
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
		                <th>Jurusan</th>
		                <th>No. Pendaftaran</th>
		                <th>Nama Calon Siswa</th>
		                <th>Untuk Pembayaran</th>
		                <th>Jumlah</th>
		                <th>Tgl Pembayaran</th>
		                <th>Keterangan</th>
		                <th>Bendahara</th>
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
			                <td><?=$u->JURUSAN?></td>
			                <td><?=$u->NO_PENDAFTARAN?></td>
			                <td><?=$u->NAMA_CALON_SISWA?></td>
			                <td><?=$u->UNTUK_PEMBAYARAN?></td>
			                <td><?=$u->JUMLAH?></td>
			                <td><?=$u->TANGGAL_PEMBAYARAN?></td>
			                <td><?=$u->KETERANGAN?></td>
			                <td><?=$u->BENDAHARA?></td>
			                <td>
			                	<a target="_blank" href="<?php echo base_url(). 'formpembayaran/faktur?no='.$u->NO_PEMBAYARAN; ?>" class="btn btn-link">Print</a>
			                	<a href="<?php echo base_url(). 'formpembayaran/?noPembayaran='.$u->NO_PEMBAYARAN; ?>" class="btn btn-link">Ubah</a>
			                	<button onclick="confirmDelete('<?=$u->NO_PEMBAYARAN?>')" class="btn btn-link" data-toggle="modal" data-target="#staticBackdrop">Hapus</button>
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

		if($this->input->get('noPembayaran') != ""){
			$titleModal = "Edit Data ".$this->input->get('noPembayaran');	

			$data = $this->MFormPembayaran->getSearch($this->input->get('noPembayaran'));
			$tglOriginal = $data[0]->TANGGAL_PEMBAYARAN;
			$data[0]->TANGGAL_PEMBAYARAN = date("Y-m-d\TH:i", strtotime($tglOriginal));


			// var_dump($data[0]); exit;
		}else{
			$data[0]->NO_PEMBAYARAN = "";
			$data[0]->JURUSAN = "";
			$data[0]->NO_PENDAFTARAN = "";
			$data[0]->NAMA_CALON_SISWA = "";
			$data[0]->UNTUK_PEMBAYARAN = "";
			$data[0]->JUMLAH = "";
			$data[0]->TANGGAL_PEMBAYARAN = "";
			$data[0]->KETERANGAN = "";
			$data[0]->BENDAHARA = "";
		}
	?>

	<!-- Modal Add -->
	<form action="<?php echo base_url(). 'formpembayaran/save'; ?>" method="post">
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

		      				<input type="hidden" name="modeEdit" value="<?=$this->input->get('noPembayaran')?>">
		      				
							<div class="form-group">
							    <label for="NO_PENDAFTARAN">No. Pendaftaran</label>
							    <select class="form-control" id="NO_PENDAFTARAN" name="NO_PENDAFTARAN">

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
							    <label for="NAMA_CALON_SISWA">Nama Calon Siswa</label>
							    <input type="text" class="form-control" id="NAMA_CALON_SISWA" readonly="" name="NAMA_CALON_SISWA" value="<?=$data[0]->NAMA_CALON_SISWA?>">
							</div>

						    <div class="form-group">
							    <label for="UNTUK_PEMBAYARAN">Untuk Pembayaran</label>
							    <select class="form-control" id="UNTUK_PEMBAYARAN" name="UNTUK_PEMBAYARAN">

							      <option value="">Pilih untuk pembayaran</option>
							      <option value="pembayaran uang masuk" 
							      	<?php if($data[0]->UNTUK_PEMBAYARAN == "pembayaran uang masuk"){
							      			echo 'selected=""';
							      		}
							      	?> >pembayaran uang masuk</option>
							      <option value="pembayaran daftar ulang" 
							      	<?php if($data[0]->UNTUK_PEMBAYARAN == "pembayaran daftar ulang"){
							      			echo 'selected=""';
							      		}
							      	?>
							      	>pembayaran daftar ulang</option>

							    </select>
						    </div>

							<div class="form-group">
							    <label for="JUMLAH">Jumlah</label>
							    <input type="text" class="form-control" id="JUMLAH" name="JUMLAH" value="<?=$data[0]->JUMLAH?>">
							</div>

		      			</div>

		      			<div class="col-sm">


			      			<div class="form-group">
							    <label for="NO_PEMBAYARAN">No. Pembayaran</label>
							    <input type="text" class="form-control" id="NO_PEMBAYARAN" name="NO_PEMBAYARAN" value="<?=$data[0]->NO_PEMBAYARAN?>">
							</div>

							<div class="form-group">
							    <label for="JURUSAN">Jurusan</label>
							    <select class="form-control" id="JURUSAN" name="JURUSAN">

							      <option value="">Pilih Jurusan</option>
							      	<?php 
										$no = 1;
										foreach($jurusans as $n){

											if($data[0]->JURUSAN == $n->KODE_PROGRAM_KEAHLIAN){
									?>
													<option selected="" value="<?=$n->KODE_PROGRAM_KEAHLIAN?>"><?=$n->PROGRAM_KEAHLIAN?></option>
									<?php
											}else{
												?>
													<option value="<?=$n->KODE_PROGRAM_KEAHLIAN?>"><?=$n->PROGRAM_KEAHLIAN?></option>
												<?php
											}
										}
									?>
							    </select>
						    </div>

							<div class="form-group">
							    <label for="TANGGAL_PEMBAYARAN">Tanggal Pembayaran</label>
							    <input type="datetime-local" class="form-control" id="TANGGAL_PEMBAYARAN" name="TANGGAL_PEMBAYARAN" value="<?=$data[0]->TANGGAL_PEMBAYARAN?>">
							</div>

							<div class="form-group">
							    <label for="KETERANGAN">Keterangan</label>
							    <input type="text" class="form-control" id="KETERANGAN" name="KETERANGAN" value="<?=$data[0]->KETERANGAN?>">
							</div>

							<div class="form-group">
							    <label for="BENDAHARA">Bendahara</label>
							    <input type="text" class="form-control" id="BENDAHARA" name="BENDAHARA" value="<?=$data[0]->BENDAHARA?>">
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

<form action="<?php echo base_url(). 'formpembayaran/delete'; ?>">
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
	      		<input type="hidden" name="noPembayaran" id="delete_noPendaftaran" value="">

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

	    $('#NO_PENDAFTARAN').on('change', function() {
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
						$("#NAMA_CALON_SISWA").val(data[i].NAMA_CALON_SISWA);
	            	}

	             }
	        });
		});

		// var output = 0;

		$('#JUMLAH').on('change', function() {
        	var input = this.value;
			var output=parseInt(input).toLocaleString(); 
		    $('#JUMLAH').val(output);
			console.log(output);

		});

		

	} );



	function addPeriod(nStr)
	{
	    nStr += '';
	    x = nStr.split('.');
	    x1 = x[0];
	    x2 = x.length > 1 ? '.' + x[1] : '';
	    var rgx = /(\d+)(\d{3})/;
	    while (rgx.test(x1)) {
	        x1 = x1.replace(rgx, '$1' + '.' + '$2');
	    }
	    return x1 + x2;
	}

	function confirmDelete(noPendaftaran){

		$("#title_noPendaftaran").text("Hapus data dengan No. Pembayaran "+noPendaftaran+" ?");
		$("#delete_noPendaftaran").val(noPendaftaran);

		console.log(noPendaftaran);
	}

</script>
