// 2. Hapus dan ganti dengan script yang baru

// jQuery tolong ambilkan saya documen, lalu ketika document tersebut siap maka jalankan function berikut
$(document).ready(function(){

    // 3. Menghilangkan tombol cari
    $('#tombol-cari').hide();

    // event ketika keyword ditulis
    // jQuery tolong carikan saya id keyword yang ketika di keyup jalankan function berikut
    $('#keyword').on('keyup', function(){
        // 5. Memunculkan loader ketika user mengetikkan sesuatu
        $('.loader').show();
        // ilanglagi ketika datanya ketemu dan ganti jangan menggunakan loa d
        


        // jQuery tolong carikan saya id container dan load datanya dari mahasiswa.php lalu kirimkan data keywordnya
        // ? keyword = diisi dengan apapun dengan yang diketikkan oleh usernya
        // jQuery jika keyword diisikan dengan value maka load datanya dari mahasiswa.php
        // fungsi load memiliki keterbatasan yaitu hanya dapat menggunakan $_GET

        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

        // Ajax cara lain menggunakan get
        // dapatkan data dari keyword mahasiswa ketika datanya sudah didapat sambil lakukan data hasilnya
        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data){
            // jika berhasil di dapatkan datanya, masukkan nama parameter untuk function
            // dan sekarang fungsinya sudah sama dengan yang menggunakan.load
            $('#container').html(data);

            // jika datanya sudah ditemukan, sembunyikan kembali loadernya
            $('.loader').hide();
            

        });
    });

});