<div class="row" style="margin-top: 10px">
	<div class="col-sm">
		<ol class="breadcrumb bg-transparent">
		    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>

		    <?php

		    	$currentPage = "";

		    	if($this->uri->segment(1) == "formpendaftaran"){
		    		$currentPage = "Form Pendaftran";
		    	}

		    	if($this->uri->segment(1) == "formpembayaran"){
		    		$currentPage = "Form Pembayaran";
		    	}

		    	if($this->uri->segment(1) == "jurusan"){
		    		$currentPage = "Jurusan";
		    	}

		    	if($this->uri->segment(1) == "kelas"){
		    		$currentPage = "Kelas";
		    	}

		    	if($this->uri->segment(1) == "siswa"){
		    		$currentPage = "Siswa";
		    	}

		    ?>

		    <li class="breadcrumb-item active" aria-current="page"><?=$currentPage;?></li>
		</ol>
	</div>
</div>