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

    function tambah($data) {
        global $conn;
        $nama = htmlspecialchars($data["nama"]);
        $npm = htmlspecialchars($data["npm"]);
        $email = htmlspecialchars($data["email"]);
        $jurusan = htmlspecialchars($data["jurusan"]);

        $gambar = upload();
        if ( !$gambar ) {
            return false;
        }

        $query = "INSERT INTO mahasiswa VALUES('', '$nama', '$npm', '$email', '$jurusan', '$gambar')";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function upload(){
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        if ( $error === 4){
            echo "<script>
                alert('Pilih Gambar Terlebih Dahulu!);
                </script>";
            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
                alert('Yang anda upload bukan gambar!);
                </script>";
            return false;
        }

        if ( $ukuranFile > 1000000) {
            echo "<script>
                alert('Ukuran gambar terlalu besar!);
                </script>";
            return false;
        }

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
        $gambarLama = htmlspecialchars($data["gambarLama"]);

        if ( $_FILES['gambar']['error'] === 4) {
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


    // 5. Function Registrasi
    function registrasi($data) { //Function ini menerima inputan data yang dikirim dari $_POST yang ditangkap disini
        global $conn;

        // datanya disimpan kedalam variabel
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]); //untuk memungkinkan user memasukkan password ada tanda kutip
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);

        // 9. Cek username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
        
        // jika menghasilkan nilai true maka sudah ada datanya di database dan ga boleh
        if (mysqli_fetch_assoc($result)){
            echo "<script>
                alert ('Username Sudah Terdaftar!');
                </script";
            return false;
        }

        // 6. Cek Konfirmasi Password
        if ($password !== $password2) {
            echo "<script>
                alert ('Konfirmasi Password Tidak Sesuai');
                </script";
                return false;
        } 
        
        // 7. Enkripsi Password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // 8. Tambahkan user baru ke database
        mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

        return mysqli_affected_rows($conn);
        // Menghasilkan angka 1 jika berhasil dan 0 jika gagal

    }
?>