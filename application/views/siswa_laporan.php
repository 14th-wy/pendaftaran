<?php
$pdf = new Pdftc('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Data Siswa');
$pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();
$img1=base_url('assets/image/logo1.png');
$img2=base_url('assets/image/logo2.png');

$html ='<table style="border-collapse:collapse;">
    
<tr>
    <td align="center" width="10%" style="padding-top:5px;"><center><img width="100" src="'.$img1.'"></center></td>
    <td align="center" width="80%">LAPORAN KELAS<br>
        <span style="font-size:10px;">SMK PGRI II JAKARTA</span><br>
        <span style="font-size:10px;">_________________________________</span><br>
        <span style="font-size:10px;">_______________________________</span><br>
        <span style="font-size:10px;">_____________________________</span><br>
        <span style="font-size:10px;">___________________________</span><br>
    </td>
    <td align="center" width="10%"><center><img width="100" src="'.$img2.'"></center></td>
</tr>
</table>
<table style="border-collapse: collapse; padding: 10px;" class="table1">
        <tr class="tr1" style="">
            <td style="border: 1px solid #292828;">Kode Jurusan</td>
            <td style="border: 1px solid #292828;">Nama Jurusan</td>
        </tr>';

foreach($data as $u){
    $html .='<tr>
    <td style="border: 1px solid #292828">'.$u->kode_jurusan.'</td>
    <td style="border: 1px solid #292828">'.$u->nama_jurusan.'</td>
    </tr>';
}

$html .= '</table>';

// echo $html;

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('Jurusan.pdf', 'I');