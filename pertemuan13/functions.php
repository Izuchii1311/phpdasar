<?php
    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    // parameter $data menerima inputan dari form untuk memberitakuhan ini didapatkan dari post
    function tambah($data) {
        global $conn;

        $nama = htmlspecialchars($data["nama"]);
        $npm = htmlspecialchars($data["npm"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);

        // Upload gambar
        // jika berhasil akan diisi nama gambar
        $gambar = upload();
        if ( !$gambar ) {
            return false;
        }

        // query insert data
        $query = "INSERT INTO mahasiswa VALUES ('', '$nama', '$npm', '$email', '$jurusan', '$gambar')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    // function untuk upload gambar
    function upload(){
        
        // $_FILES['gambar']; return die;
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        // pengecekan ada gambar yang diupload tidak?
        if ( $error === 4 ){
            echo "
                <script>
                    alert('Pilih Gambar Terlebih Dahulu!');
                    document.location.href = 'index.php';
                </script>        
            ";
            return false;
        }

        // cek apakah yang diupload bertipe gambar atau bukan / ekstensi file
        $ekstensiGambarValid = ['jpeg', 'jpg', 'png'];
        // ambil ekstensi file dari yang di upload
        // nama file adalah gabungan 'nama' '.' 'ekstensi file'
        // ambil ekstensi gambar nya

        // eksplode untuk memecah sebuah fungsi menjadi array
        $ekstensiGambar = explode('.',$namaFile);

        // setelah di eksplode ambil dulu yang terakhir dan rubah semua ekstensi filenya menjadi hruf kecil semua
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        // Kalo tidak ada di dalam ekstensi yang valid maka err 
        // in_array(jarum,jerami) untuk mengecek ada tidak sebuah string di dalam array
        if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
            echo "
            <script>
                alert('File yang anda upload Harus gambar!');
                document.location.href = 'index.php';
            </script>";
        return false;
        }

        // membatasi ukuran gambar
        if ( $ukuranFile > 3000000 ){
            echo "
            <script>
                alert('Ukuran Gambar terlalu besar!');
                document.location.href = 'index.php';
            </script>";
        return false;
        }

        // lolos pengecekan gambar siap diupload 
        // Generate nama gambar
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        // memindahkan gambar yang disimpan secara sementara di tmp ke img/ . beserta nama file
        move_uploaded_file("$tmpName", "img/" . $namaFileBaru);

        // jika gambar berhasil diupload maka gambar akan berhasil disimpan di img/
        // dan nama file disimpan ke function tambah / database
        return $namaFileBaru;
    }

    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    function ubah($data) {
        global $conn;

        // Panggil id untuk melakukan perubahan query berdasarkan id
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $npm = htmlspecialchars($data["npm"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        
        // gambar lama
        $gambarLama = $data["gambarLama"];
        
        // cek apakah user pilih gambar baru atau tidak
        // jika user tidak menguploadkan gambar baru maka diisi dengan gambar lama
        if( $_FILES['gambar']['error'] === 4) {
            $gambar = $gambarLama;
        } else {
            // jika ada gambar baru maka jalankan fungsi upload
            $gambar = upload();
        }


        // query update data - ambil data dan timpa dengan data baru
        $query = "UPDATE mahasiswa SET 
                    nama = '$nama',
                    npm = '$npm',
                    email = '$email',
                    jurusan = '$jurusan',
                    gambar = '$gambar'
                    WHERE id = '$id'
                    ";
        mysqli_query($conn, $query);

        // Kembalikan Nilai Bool Jika Ada data yang di update
        return mysqli_affected_rows($conn);
    }

    // data keyword diambil
    function cari($keyword){
        // lalu buat query untuk menimpa data sebelumnya
        $query = "SELECT * FROM mahasiswa WHERE 
            nama LIKE '%$keyword%' OR
            npm LIKE '%$keyword%' OR
            email LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
            ";

        // Panggil function query untuk merapihkan data, dengan memasukan data $query di function cari
        return query($query);
    }
?>