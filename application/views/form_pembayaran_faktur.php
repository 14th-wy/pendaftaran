<?php
	// var_dump($this->input->get('no')); exit;

    $pdf = new Pdftc('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetTitle('Pembayaran');
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
        <td align="center" width="80%">LAPORAN HARIAN PEMBAYARAN<br>
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
            <td style="border: 1px solid #292828">No Pembayaran: '.$this->input->get('no').' </td>
            <td style="border: 1px solid #292828">No Pendaftaran: </td>
        </tr>
        <tr>
            <td style="border: 1px solid #292828">Jurusan: '.$data[0]->JURUSAN.'</td>
            <td style="border: 1px solid #292828">Tgl Pembayaran: '.$data[0]->TANGGAL_PEMBAYARAN.'</td>
        </tr>
        <tr>
            <td style="border: 1px solid #292828">Nama Calon Siswa: '.$data[0]->NAMA_CALON_SISWA.'</td>
            <td style="border: 1px solid #292828" rowspan="3">Bendahara: '.$data[0]->BENDAHARA.'</td>
        </tr>
        <tr>
            <td style="border: 1px solid #292828">Jumlah: Rp.'.$data[0]->JUMLAH.'</td>
        </tr>
        <tr>
            <td style="border: 1px solid #292828">Untuk Pembayaran: '.$data[0]->UNTUK_PEMBAYARAN.'</td>
        </tr>
    </table>
    
    ';

    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->Output('pendaftaran.pdf', 'I');
?>