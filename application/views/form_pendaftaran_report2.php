<?php
	// var_dump($this->input->get('no')); exit;

    $pdf = new Pdftc('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetTitle('Pendaftaran');
    $pdf->SetTopMargin(20);
    $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true);
    $pdf->SetAuthor('Author');
    $pdf->SetDisplayMode('real', 'default');

    // remove default header/footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    $pdf->AddPage();

    $image1 = base_url('assets/image/logo1.png');
    $image2 = base_url('assets/image/logo2.png');

    $html = '<table border="0">
    
    <tr>
        <td align="center" width="10%"><center><img width="100" src="'.$image1.'"></center></td>
        <td align="center" width="80%">LAPORAN PENDAFTARAN<br>
            <span style="font-size:10px;">SMK PGRI II JAKARTA</span><br>
            <span style="font-size:10px;">TEKNOLOGI DAN REKAYASA</span><br>
            <span style="font-size:10px;">BISNIS DAN MANJEMEN</span><br>
            <span style="font-size:10px;">Jln Borotan VI No. 17 Kel. Borotan, Kec. Cilincing, Jakarta Utara, 14140</span><br>
            <span style="font-size:10px;">Tlp/FAX : 021-44853000</span><br>
        </td>
        <td align="center" width="10%"><center><img width="100" src="'.$image2.'"></center></td>
    </tr>
    <tr>
        <td colspan="3"> <hr> </td>
    </tr>
    
    </table>
    
    <table style="border-collapse: collapse; padding: 10px;" >
        <tr>
            <th style="border: 1px solid #292828">No.</th>
            <th style="border: 1px solid #292828">Tgl Pendaftaran</th>
            <th style="border: 1px solid #292828">No. Pendaftaran</th>
            <th style="border: 1px solid #292828">Nama Calon Siswa</th>
            <th style="border: 1px solid #292828">Nama Orang tua</th>
            <th style="border: 1px solid #292828">Nama Sekolah Asal</th>
            <th style="border: 1px solid #292828">Jurusan</th>
        </tr>';

        $no = 1;
        foreach($data as $u){ 
            $html .= '
            <tr>
                <td style="border: 1px solid #292828">'.$no++.'</td>
                <td style="border: 1px solid #292828">'.$u->TANGGAL_PENDAFTARAN.'</td>
                <td style="border: 1px solid #292828">'.$u->NO_PENDAFTARAN.'</td>
                <td style="border: 1px solid #292828">'.$u->NAMA_CALON_SISWA.'</td>
                <td style="border: 1px solid #292828">'.$u->NAMA_ORANGTUA.'</td>
                <td style="border: 1px solid #292828">'.$u->SEKOLAH_ASAL.'</td>
                <td style="border: 1px solid #292828">'.$u->JURUSAN.'</td>
            </tr>
            ';   
        }

        $html .='
    </table>
    
    ';

    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->Output('pendaftaran.pdf', 'I');
?>