<div class="container-fluid">

	<?php

		$this->load->view("breadcrumb");

	?>


	<form action="<?php echo base_url(). 'konfirmasi/upload'; ?>" method="post" enctype="multipart/form-data">

		<div class="row" style="margin-top: 0px">
			<div class="col-6">
				<div class="form-group">
					<label for="noPendaftaran">No. Pendaftaran</label>
					<select class="form-control" id="noPendaftaran" name="noPendaftaran">

						<option value="">Pilih No. Pendaftaran</option>

						<?php 						
							foreach($data as $no){
								?>
									<option value="<?=$no->NO_PENDAFTARAN?>"><?=$no->NO_PENDAFTARAN?></option>
								<?php
							}
						?>

					</select>
				</div>	
			</div>
			<div class="col-6 form-group">
				<label for="exampleFormControlFile1">Upload bukti pembayaran</label>
				<input type="file" class="form-control-file" id="exampleFormControlFile1" name="berkas">
			</div>
			<div class="col-10">
				<button type="submit" class="btn btn-info">Upload</a>		
			</div>
		</div>

	</form>	

</div>


<script>

</script>
