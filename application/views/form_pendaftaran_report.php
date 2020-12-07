<!DOCTYPE html>
<html>
<head>
	<title>Report Form Pendaftaran</title>
</head>
<body>

	<style>
		th{
			font-size: 10px;
			color: #fff;
			background-color: #2d3436;
		}
		td{
			font-size: 10px;
		}
		table {
		  font-family: arial, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}

		td, th {
		  border: 1px solid #dddddd;
		  text-align: left;
		  padding: 8px;
		}

		tr:nth-child(even) {
		  background-color: #dddddd;
		}
	</style>

	<?php 

		$start = date("d M Y", strtotime($this->input->get('startDate')));
		$end = date("d M Y", strtotime($this->input->get('endDate')));

	?>

	<div style="font-size: 20px; "><center><b>Report Form Pendaftaran</b></center></div>
	<div style="font-size: 10px;" ><center><?=$start.' - '.$end?></center></div>

	<table style="width:100%; margin-top: 10px">
        <thead>
            <tr>
                <th>No</th>
                <th>No. Pendftaran</th>
                <th>Nama Calon Siswa</th>
                <th>Jns Kelamin</th>
                <th>Tmpt Lhr</th>
                <th>Tgl Lhr</th>
                <th>Agama</th>
                <th>Sklh Asal</th>
                <th>Thn Ijazah</th>
                <th>No Ijazah</th>
                <th>NISN</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>Nama Orang Tua</th>
                <th>Alamat Orang Tua</th>
                <th>Telepon</th>
                <th>Ijazah</th>
                <th>Kartu Keluarga</th>
                <th>SKHUN</th>
                <th>NISN</th>
                <th>Tgl Pdftrn</th>
            </tr>
        </thead>
        <tbody>

        	<?php 
				$no = 1;
				foreach($data as $u){ 
			?>

	            <tr>
	                <td><?=$no++?></td>
	                <td><?=$u->NO_PENDAFTARAN?></td>
	                <td><?=$u->NAMA_CALON_SISWA?></td>
	                <td><?=$u->JENIS_KELAMIN?></td>
	                <td><?=$u->TEMPAT?></td>
	                <td><?=$u->TANGGAL_LAHIR?></td>
	                <td><?=$u->AGAMA?></td>
	                <td><?=$u->SEKOLAH_ASAL?></td>
	                <td><?=$u->TAHUN_IJAZAH?></td>
	                <td><?=$u->NOMOR_IJAZAH?></td>
	                <td><?=$u->NISN?></td>
	                <td><?=$u->JURUSAN?></td>
	                <td><?=$u->ALAMAT?></td>
	                <td><?=$u->NAMA_ORANGTUA?></td>
	                <td><?=$u->ALAMAT_ORANGTUA?></td>
	                <td><?=$u->TELEPON?></td>
	                <td><?=$u->C_IJAZAH?></td>
	                <td><?=$u->C_KK?></td>
	                <td><?=$u->C_SKHUN?></td>
	                <td><?=$u->C_NISN?></td>
	                <td><?=$u->TANGGAL_PENDAFTARAN?></td>
	            </tr>

            <?php 
				}
			?>

        </tbody>
    </table>

</body>
</html>