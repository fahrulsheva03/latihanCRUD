<?php 

require '../../koneksi.php';

$id = $_GET['id'];

$sql = mysqli_query($conn , "DELETE FROM mahasiswa WHERE id_mahasiswa = $id");

if ($sql) {
echo"
<script>
alert('Berhasil Hapus Data')
location = '../../mahasiswa.php'
</script>
";
} 
else {
}