<div class="container-fluid">

	<?php

		$this->load->view("breadcrumb");

	?>


	<form target="_blank" method="post" action="<?php echo base_url(). 'siswa/cetaklaporan'; ?>">

		<div class="row" style="margin-top: 10px">

			<div class="col-sm-4" style="margin: 0; max-width: 460px; padding-right : 0;">
				
                <div class="form-group">
                    <label for="laporan">Pilih Laporan</label>
                    <select class="form-control" id="laporan" name="laporan">

                        <option value="">Pilih Laporan</option>
                        <?php
                        
                        if($this->session->type == "tu"){
                            ?>
                                <option value="Laporan Pembayaran TU">Laporan Pembayaran</option>
                            <?php
                        }

                        if($this->session->type == "admin"){
                            ?>
                                <option value="Laporan Kelas">Laporan Kelas</option>
                                <option value="Laporan Siswa">Laporan Siswa</option>
                                <option value="Laporan Jurusan">Laporan Jurusan</option>
                            <?php
                        }
                        
                        ?>

                        <?php
                        
                        if($this->session->type == "siswa"){
                            ?>
                                <option value="Laporan Kelas">Laporan Kelas</option>
                                <option value="Laporan Pembayaran">Laporan Pembayaran</option>
                                <option value="Laporan Siswa">Laporan Siswa</option>
                                <option value="Laporan Pendaftaran">Laporan Pendaftaran</option>
                                <option value="Laporan Jurusan">Laporan Jurusan</option>
                            <?php
                        }
                        
                        ?>
                    </select>
                </div>


                <button type="submit" class="btn btn-info">Cetak</a>	

			</div>
			
			<div class="col"></div>

			</form>
		</div>

	</form>
	

<script>

</script>
