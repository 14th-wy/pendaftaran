

<div class="container-fluid">

	<div class="row">

	<?php if($this->session->type == "admin"){ ?>
	    <div class="col-sm-4" style="margin-top: 30px; margin-bottom:0px;">

		<a href="<?php echo base_url(). 'kelas'; ?>" type="button" class="btn btn-primary btn-block shadow p-3 d-flex justify-content-center" style="height: 200px; background-color: #74b9ff; border: none;">
            <p class="" style="font-size: 50px; padding: 10%;">Kelas</p>
        </a>

	    </div>
	<?php } ?>

	<?php if($this->session->type == "admin"){ ?>
	    <div class="col-sm-4" style="margin-top: 30px; margin-bottom:0px;">

		<a href="<?php echo base_url(). 'siswa'; ?>" type="button" class="btn btn-primary btn-block shadow p-3 d-flex justify-content-center" style="height: 200px; background-color: #55efc4; border: none;">
            <p class="" style="font-size: 50px; padding: 10%;">Siswa</p>
        </a>

	    </div>
	<?php } ?>

	<?php if($this->session->type == "siswa"){ ?>
	    <div class="col-sm-4" style="margin-top: 30px; margin-bottom:0px;">

		<a href="<?php echo base_url(). 'konfirmasi'; ?>" type="button" class="btn btn-primary btn-block shadow p-3 d-flex justify-content-center" style="height: 200px; background-color: #6c5ce7; border: none;">
            <p class="" style="font-size: 50px;">Konfirmasi Pembayaran</p>
        </a>

	    </div>
	<?php } ?>

	<?php if($this->session->type == "admin"){ ?>
	    <div class="col-sm-4" style="margin-top: 30px; margin-bottom:0px;">

		<a href="<?php echo base_url(). 'jurusan'; ?>" type="button" class="btn btn-primary btn-block shadow p-3 d-flex justify-content-center" style="height: 200px; background-color: #e17055; border: none;">
            <p class="" style="font-size: 50px; padding: 10%;">Jurusan</p>
        </a>

	    </div>
	<?php } ?>

	<?php if($this->session->type == "siswa"){ ?>
	    <div class="col-sm-4" style="margin-top: 30px; margin-bottom:0px;">

		<a href="<?php echo base_url(). 'formpendaftaran'; ?>" type="button" class="btn btn-primary btn-block shadow p-3" style="height: 200px; background-color: #74b9ff; border: none;">
            <p style="font-size: 50px;">Form <br>Pendaftaran</p>
        </a>

	    </div>
	<?php } ?>

	<?php if($this->session->type == "siswa" || $this->session->type == "tu" || $this->session->type == "admin"){ ?>
	    <div class="col-sm-4" style="margin-top: 30px; margin-bottom:0px;">

		<a href="<?php echo base_url(). 'siswa/laporan'; ?>" type="button" class="btn btn-primary btn-block shadow p-3" style="height: 200px; background-color: #e17055; border: none;">
            <p style="font-size: 50px; padding: 10%;">Laporan</p>
        </a>

	    </div>
	<?php } ?>

	<?php if($this->session->type == "tu"){ ?>
	    <div class="col-sm-4" style="margin-top: 30px; margin-bottom:0px;">

		<a href="<?php echo base_url(). 'formpembayaran'; ?>" type="button" class="btn btn-primary btn-block shadow p-3 d-flex justify-content-center" style="height: 200px; background-color: #6c5ce7; border: none;">
            <p class="" style="font-size: 50px;">Form Pembayaran</p>
        </a>

	    </div>
	<?php } ?>


	</div>

</div>