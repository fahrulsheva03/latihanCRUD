<!DOCTYPE html>
<html lang="en">

<?php 
include 'koneksi.php';
include 'components/header.php';
?>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?php 
        include 'components/sidebar.php';
        ?>

        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
        <?php 
        include 'components/navbar.php';
        ?>
            <!-- Navbar End -->

            


            <!-- Content Start -->
            <div class="container-fluid pt-4 px-4">
            <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Tabel Mahasiswa</h6>
                            <a href="tabel/mahasiswa/tambah.php">
                                <button type="button" class="btn btn-outline-primary m-2">Tambah</button>
                            </a>

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nim</th>
                                        <th scope="col">Matakuliah</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Semester</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <!-- Query / Perintah PHP -->

                                    <?php 
                                    $query = mysqli_query($conn, "SELECT * FROM mahasiswa
                                    JOIN
                                    jurusan
                                    ON
                                    mahasiswa.jurusan = jurusan.id_jurusan
                                    JOIN
                                    semester
                                    ON
                                    mahasiswa.semester = semester.id_semester
                                    JOIN
                                    matakuliah
                                    ON
                                    mahasiswa.matakuliah = matakuliah.id_matakuliah

                                    " );

                                    while($d = mysqli_fetch_array($query)){                
                                    ?>

                                    <!-- END QUERY -->
                                    <tr>
                                        <td><?= $d['nama'] ?></td>
                                        <td><?= $d['nim'] ?></td>
                                        <td><?= $d['nama_matakuliah'] ?></td>
                                        <td><?= $d['nama_jurusan'] ?></td>
                                        <td><?= $d['alamat'] ?></td>
                                        <td><?= $d['nama_semester'] ?></td>
                                        <td><img src="assets/image/<?= $d['gambar'] ?>" width="50" height="50"  alt=""></td>
                                        <td><?= $d['password'] ?></td>
                                        <td>
                                             
                                            <a href="tabel/mahasiswa/update.php?id=<?= $d['id_mahasiswa'] ?> ">
                                                <button type="button" class="btn btn-outline-warning m-2">Update</button>
                                            </a>
                                <a href="tabel/mahasiswa/hapus.php?id=<?= $d['id_mahasiswa'] ?> ">
                                    <button type="button" class="btn btn-outline-danger m-2">Hapus</button>
                                </a>
                                        
                                        </td>
                                    </tr>
                                  
                                    <?php } ?>
                                </tbody>
                                
                            </table>
                        </div>
            </div>
            </div>  
            <!-- Content End -->


        <?php 
        include 'components/footer.php';
        ?>
</body>

</html>