// Ambil Element Element yang dibutuhkan

var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');


// Tambahkan Even ketika keywordnya ditulis
keyword.addEventListener('keyup', function() {
    

    // AJAX
    // Buat object AJAX
    var xhr = new XMLHttpRequest();

    // cek kesiapan AJAX
    xhr.onreadystatechange = function() {
        if ( xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    // Eksekusi AJAX
    xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
    xhr.send();

});