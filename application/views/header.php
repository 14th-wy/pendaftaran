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
	<!-- <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">Sistem Informasi Pendaftaran</a>
    <div class="btn-group">
      <label type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $this->session->nama; ?>
      </label>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="<?php echo base_url(). 'logout'; ?>" class="dropdown-item" type="button">Keluar</a>
      </div>
    </div>
	</nav> -->

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?php echo base_url(); ?>">Sistem Informasi Pendaftaran</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <!-- <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li> -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Master Data
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?php echo base_url(). 'kelas'; ?>">Kelas</a>
            <a class="dropdown-item" href="<?php echo base_url(). 'jurusan'; ?>">Jurusan</a>
            <a class="dropdown-item" href="<?php echo base_url(). 'matpel'; ?>">Mata Pelajaran</a>
            <a class="dropdown-item" href="<?php echo base_url(). 'siswa'; ?>">Siswa</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Laporan
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Kelas</a>
            <a class="dropdown-item" href="#">Jurusan</a>
            <a class="dropdown-item" href="#">Mata Pelajaran</a>
            <a class="dropdown-item" href="#">Siswa</a>
          </div>
        </li>
      </ul>
    </div>

    <div class="btn-group">
      <label type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $this->session->nama; ?>
      </label>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="<?php echo base_url(). 'logout'; ?>" class="dropdown-item" type="button">Keluar</a>
      </div>
    </div>
  </nav>