<?php 

require '../../koneksi.php';

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];
    $jurusan = $_POST['jurusan'];
    $matkul = $_POST['matkul'];
    $semester = $_POST['semester'];
    $password = $_POST['password'];

    $gambar = upload();

    $query = mysqli_query($conn, "INSERT INTO mahasiswa SET
    nama = '$nama',
    nim = '$nim',
    alamat = '$alamat',
    jurusan = '$jurusan',
    matakuliah = '$matkul',
    semester = '$semester',
    password = '$password',
    gambar = '$gambar'
    " );

    if ($query) {
        echo "
        <script>
        alert ('Berhasil Tambah Data')
        location = '../../mahasiswa.php'
        </script>
        ";
    }else {
        echo "
        <script>
        alert ('Gagal Tambah Data')
        location = '../../mahasiswa.php'
        </script>
        ";
    }
}

if(isset($_POST["edit"])) {
    
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];
    $jurusan = $_POST['jurusan'];
    $matkul = $_POST['matkul'];
    $semester = $_POST['semester'];
    $password = $_POST['password'];
    $fotoLama = $_POST['fotoLama'];

    //Pengecekan kondisi user menekan tombol gambar atau tidak
    if($_FILES['gambar']['error'] == 4){
        $gambar = $fotoLama;
    } else{
        $gambar = upload();
    }

    $query = mysqli_query($conn, "UPDATE mahasiswa SET
    nama = '$nama',
    nim = '$nim',
    alamat = '$alamat',
    jurusan = '$jurusan',
    matakuliah = '$matkul',
    semester = '$semester',
    password = '$password',
    gambar = '$gambar'

    WHERE

    id_mahasiswa = $id
    " );

    if ($query) {
        echo "
        <script>
        alert ('Berhasil Edit Data')
        location = '../../mahasiswa.php'
        </script>
        ";
    }else {
        echo "
        <script>
        alert ('Gagal Edit Data')
        location = '../../mahasiswa.php'
        </script>
        ";
    }

}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFIle = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah ada gambar yg di upload
    if( $error === 4 ) {
        echo "<script>
            alert('pilih gambar terlrbih dahulu');
            </>";

        return false;
    }

    // cek apakah yg di upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    // if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
    //     echo "<script>
    //         alert('bukan gambar yang anda uoload');
    //         </script>";

    //     return false;
    // }

    //cek ukuran file jika besar

    //lolos pengecekan, gambar siap upload
    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.'; 
    $namaFileBaru .= $ekstensiGambar; 

    move_uploaded_file($tmpName, '../../assets/image/' . $namaFileBaru);

    return $namaFileBaru;
}