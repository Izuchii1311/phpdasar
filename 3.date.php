<?php
// Date - Untuk menampilkan tanggal dengan format tertentu
// echo date("l , d D M Y");                             //Memanggil Function

// Unix timestamp / EPOCH time
// Detik yang telah berlalu sejak 1 January 1970 - sekarang
// echo date("l", time() + 60 * 60 * 24 * 100);

// mktime
// membuat detik sendiri
// jam, menit, detik, bulan, tanggal, tahun
// echo date('l', mktime(0, 0, 0, 11, 13, 2002));

// strtotime
echo date('l, d-M-y', strtotime("13 Nov 2002"));
