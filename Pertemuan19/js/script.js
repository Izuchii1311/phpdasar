// 4. Ambil element yang diberi ID
var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

// 5. Membuat Event ketika input diisi
// keyword.jalankan sesuatu ketika('keyword telah di lepas', dan jalankan functionnya)
keyword.addEventListener('keyup', function() {
    
    // buat object AJAX
    var xhr = new XMLHttpRequest();

    // cek kesiapan AJAX
        // readyState 0 : inisialisasi
        // readyState 1 : membuka koneksi
        // ....

        // xhr.status 200 = sumber sudah ok
        // xhr.status 404 = sumber tidak ada
        // ....

    // apapun yang ada di dalam container simpan dan ganti dengan data yang dipanggil di responseText
    // responseText : berisi apapun dari sumbernya coba.txt
    xhr.onreadystatechange = function() {
        if (xhr.readyState = 4 && xhr.status == 200){
            container.innerHTML = xhr.responseText;
        }
    }

    // eksekusi ajax
    // .open(parameter1 GET/POST, parameter2 sumber dari mana, parameter3 synchronous(false)/asynchronous(true))
    // xhr.send untuk menjalankan AJAX
    // mengambil data dari mahasiswa.php dan mengirim data
    xhr.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
    xhr.send();

    //6. Membuat folder ajax dan file mahasiswa.php
});