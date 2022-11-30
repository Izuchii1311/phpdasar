// Catatan : 
// Dalam penggunaan script dari java script simpan di bawah sebelum tutup body
// Tapi jika menggunakan jQuery bisa disimpan diatas

// $(document) atau jQuery(document) = memanggil document jquerynya
// Lalu jika sudah siap maka jalankan fungsi berikut

$(document).ready(function() {

    // 2. Hilangkan Tombol Cari
    $('#tombol-cari').hide();


    // 1. AJAX - even ketika keyword ditulis
    $('#keyword').on('keyup', function() {
        // 5. Munculkan Icon Loading
        $('.loader').show();


        // Ajax Menggunakan Load
        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());
        
        // Ajax menggunakan GET
        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {
            $('#container').html(data);
            // 6. Sembunyikan Loader jika data sudah ditemukan
            $('.loader').hide();
        });
    });

});


// Cara Baca :

// 1. Membuat Ajax Menggunakan Load
// > Menggunakan document.ready 
//     Agar ketika file scriptnya disimpan di bawah maka tidak akan ngaruh

// > jQuery Tolong carikan saya element #keyword (input)
//     lalu on(ketika di keyup, lakukan fungsi berikut ini
        
//         jQuery tolong carikan saya sebuah element #container
//         lalu .load atau ubah isinya dengan data yg kita ambil dari sumber ajax/mahasiswa.php 
//         lalu kirimkan data keywordnya  ?keyword= diisi dengan apapun yg diketikan oleh usernya $('#keyword')
//         .val() atau value
//         )


// keyup itu sendiri memiliki fungsi untuk mendeteksi sebuah aksi jika apabila user menekan tombol pada keyboard lalu jika di tekan akan langsung menjalankan perintah atau sintak selanjutnya
// fungsi load memiliki keterbatasan karena hanya GET tidak dapat menggunakan POST


// 2. Menghilangkan Tombol Cari
// jQuery tolong carikan saya element dengan id tombol-cari lalu hide / tidak ditampilkan


// 5. Memunculkan Icon Loading
// > jQuery Tolong carikan saya element #keyword (input)
//     lalu on(ketika di keyup, lakukan fungsi berikut ini

//      jQuery ketika user melakukan inputan maka tampilkan loadernya

// NOTE: jika ajax menggunakan load maka akan gif akan ditampilkan terus menerus bahkan jika user telah menghapus inputannya maka diganti dengan $.get

//      $.get / dapatkan data dari ('ajax/mahasiswa.php?keyword=' + $('#keyword').val()
//      jika di dapat maka lakukan sesuatu sambil mengirimkan hasilnya 
//      function(data) --> parameter data

//          Ketika sudah diambil, isi dari container html tampilkan datanya apa


// 6. Menyembukan Loader jika data telah ditemukan