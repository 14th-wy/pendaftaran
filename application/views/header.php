<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
	 <link rel="stylesheet" type="text/css" href="<?=base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css')?>">
   <link rel="stylesheet" type="text/css" href="<?=base_url('vendor/datatables/DataTables-1.10.22/css/dataTables.bootstrap4.min.css')?>">

   <!-- Font Awesome -->
   <link rel="stylesheet" type="text/css" href="<?=base_url('vendor/fontawesome/css/all.min.css')?>">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?=base_url('vendor/twbs/bootstrap/dist/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('vendor/twbs/bootstrap/dist/js/popper.min.js')?>"></script>
    <script src="<?=base_url('vendor/twbs/bootstrap/dist/js/bootstrap.min.js')?>"></script>

    <script src="<?=base_url('vendor/datatables/datatables.min.js')?>"></script>
    <script src="<?=base_url('vendor/datatables/DataTables-1.10.22/js/dataTables.bootstrap4.min.js')?>"></script>

    <title>Pendaftaran</title>
  </head>
  <body>

  <style>
    
  </style>

  	<!-- As a link -->
	<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">Sistem Informasi Pendaftaran</a>

    <div class="btn-group">
      <label type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $this->session->nama; ?>
      </label>
      <!-- <i style="padding: 10px;" class="fas fa-user-circle dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i> -->
      <div class="dropdown-menu dropdown-menu-right">
        <!-- <a class="dropdown-item" type="button">Ubah Password</a> -->
        <a href="<?php echo base_url(). 'logout'; ?>" class="dropdown-item" type="button">Keluar</a>
      </div>
    </div>

	</nav>