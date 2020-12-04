<?php
$pdf = new Pdftc('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle('Kelas');
$pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true);
$pdf->SetAuthor('Author');
$pdf->SetDisplayMode('real', 'default');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();
$html='<h2 style="text-align:center;">Laporan Data Kelas</h2><br>';
$html.='<table border="1" cellpadding="4" style="width:100%">';

$html .= '<tr>
        <th style="background-color:#4CAF50; text-align:center; color:white;">Kode Kelas</th>
        <th style="background-color:#4CAF50; text-align:center; color:white;">Nama Kelas</th>
        <th style="background-color:#4CAF50; text-align:center; color:white;">Kode Jurusan</th>
        <th style="background-color:#4CAF50; text-align:center; color:white;">Nama Jurusan</th>
</tr>';
foreach($data as $u){
    $html .='<tr>
    <td style="text-align:center;">'.$u->kode_kelas.'</td>
    <td style="text-align:center;">'.$u->nama_kelas.'</td>
    <td style="text-align:center;">'.$u->kode_jurusan.'</td>
    <td style="text-align:left;">'.$u->nama_jurusan.'</td>
    </tr>';
}

$html .= "</table>";

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('Kelas.pdf', 'I');