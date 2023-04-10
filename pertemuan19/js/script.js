// ambil element menggunakan penelusuran DOM
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var content = document.getElementById('content');

// trigger / aksi / even 

// lakukan sesuatu ketika ada even yang dijalankan 
// tambahkan event ketika keyword ditulis
keyword.addEventListener("keyup", function() {
    
    // object ajax
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange =  function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            content.innerHTML = xhr.responseText;
        }
    }
    
    // eksekusi ajax
    // data dikirimkan ke mahasiswa.php menggunakan GET
    xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value , true);
    xhr.send();
});