<?php
    // 3. Membuat file cetak.php dan sebelumnya mendownload composer > mPDF
    require_once __DIR__ . '/vendor/autoload.php';

    
    require "Functions.php";
    $mahasiswa = query ("SELECT * FROM mahasiswa");


    $mpdf = new \Mpdf\Mpdf();

    $html = 
    '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daftar Mahasiswa</title>
    </head>
    <body>

        <h1> Daftar Mahasiswa </h1>

        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Gambar</th>
            </tr>';

        foreach( $mahasiswa as $mhs ) {
            $html .= '<tr>
                <td>'. $i++ .'</td>
                <td><img src="img/'. $row["gambar"] .'" width="50"</td>
                <td>'. $row["npm"] .'"</td>
                <td>'. $row["nama"] .'"</td>
                <td>'. $row["email"] .'"</td>
                <td>'. $row["jurusan"] .'"</td>
            </tr>';
        }

$html .= '</table>

    </body>
    </html>';
    
    $mpdf->WriteHTML($html);
    $mpdf->Output('daftar-mahasiswa.pdf', 'I');
    
?>

