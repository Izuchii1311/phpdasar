<?php 
    $conn = mysqli_connect("localhost", "root", "", "phplatihan");

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    // 4. Memodifikasi function tambah supaya gambar diupload ke directory lalu diambil nama gambarnya, namanya yg kemudian di INSERT ke Database
    function tambah($data) {
        global $conn;
        $nama = htmlspecialchars($data["nama"]);
        $npm = htmlspecialchars($data["npm"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);

        // upload gambar
        $gambar = upload();
        if ( !$gambar ) {
            return false;
        }

        $query = "INSERT INTO mahasiswa VALUES('', '$nama', '$npm', '$email', '$jurusan', '$gambar')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    // 5. Menambahkan Function Upload
    function upload(){
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        // Melakukan pengecekan ada gambar yang diupload tidak
        // error 4 = tidak ada gambar yang diupload 
        if ( $error === 4){
            echo "<script>
                alert('Pilih Gambar Terlebih Dahulu!);
                </script>";
            return false;
        }

        // cek apakah yang diupload gambar atau bukan
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        // cek ekstensi gambar ada tidak di dalam $ekstensiGambarValid
        // Menghasilkan true jika ada dan false jika tidak ada
        if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
                alert('Yang anda upload bukan gambar!);
                </script>";
            return false;
        }

        // Cek jika ukuran gambar terlalu besar
        if ( $ukuranFile > 1000000) {
            echo "<script>
                alert('Ukuran gambar terlalu besar!);
                </script>";
            return false;
        }

        // Lolos pengecekan gambar siap diupload
        // generate nama baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
        return $namaFileBaru;
    }


    function hapus($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

        return mysqli_affected_rows($conn);
    }

    function update($data){
        global $conn;
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);    
        $npm = htmlspecialchars($data["npm"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);
        // 9. Memberikan variabel baru yang mengambil di Update -hidden
        $gambarLama = htmlspecialchars($data["gambarLama"]);

        // 10. Cek apakah user pilih gambar baru atau tidak
        if ( $_FILES['gambar']['error'] === 4) {
            // artinya tidak ada gambar baru maka diisi dengan gambar lama
            $gambar = $gambarLama;
        } else {
            $gambar = upload();
        }

        $query = "UPDATE mahasiswa SET npm= '$npm', nama= '$nama', email= '$email', jurusan= '$jurusan', gambar= '$gambar' WHERE id = $id";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);        
    }

    function search($keyword) {
        $query = "SELECT * FROM mahasiswa WHERE
                    nama LIKE '$keyword%' OR
                    npm LIKE '$keyword%' OR
                    email LIKE '$keyword%' OR
                    jurusan LIKE '$keyword%'
                    ";

        return query($query); 
    }
?>