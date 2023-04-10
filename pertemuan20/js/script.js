$(document).ready(function() {
    // hilangkan tombol cari
    $('#tombol-cari').hide();

    // Ajax versi jQuery
    // even ketika keyword ditulis
    $('#keyword').on('keyup', function(){
        // Munculkan Loader
        $('#loader').show();
        $('.loader').show();

        // $.get()
        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data){
            $('#content').html(data);
            $('.loader').hide();
        })

        // Ajax menggunakan load
        // $('#content').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());
    });

});