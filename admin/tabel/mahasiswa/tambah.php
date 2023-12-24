<!DOCTYPE html>
<html lang="en">

<?php 
include '../../koneksi.php';
include '../header.php';
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
        include '../sidebar.php';
        ?>

        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
        <?php 
        include '../navbar.php';
        ?>
            <!-- Navbar End -->

            <!-- Content Start -->
            <div class="container-fluid pt-4 px-12">
            <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Form Tambah</h6>

                            <form action="proses.php" method="post" enctype="multipart/form-data" >

                                <div class="mb-3">
                                    <label for="" class="form-label">Nama</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" >
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Nim</label>
                                    <input type="text" name="nim" class="form-control" placeholder="Masukan Nim" >
                                </div>

                                <div class="mb-3">
                                
                                <?php  
                                $query = mysqli_query($conn, "SELECT * FROM matakuliah");
                                ?>

                                <label for="" class="form-label">Matakuliah</label>
                                <select class="form-select" name="matkul" id="floatingSelect"aria-label="Floating label select example">
                                
                                <option> -- Pilih Matkul --</option>
                                
                                <?php 
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                
                                <option value="<?= $row['id_matakuliah'] ?>" ><?= $row['nama_matakuliah'] ?></option>
                                
                                <?php 
                                }
                                ?>

                                </select>
                                </div>


                                <div class="mb-3">
                                <?php  
                                $query = mysqli_query($conn, "SELECT * FROM jurusan");
                                ?>

                                <label for="" class="form-label">Jurusan</label>
                                <select class="form-select" name="jurusan" id="floatingSelect"aria-label="Floating label select example">
                                
                                <option> -- Pilih Jurusan --</option>
                                
                                <?php 
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                
                                <option value="<?= $row['id_jurusan'] ?>" ><?= $row['nama_jurusan'] ?></option>
                                
                                <?php 
                                }
                                ?>

                                </select>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat" >
                                </div>

                                <div class="mb-3">
                                
                                <?php  
                                $query = mysqli_query($conn, "SELECT * FROM semester");
                                ?>

                                <label for="" class="form-label">Semester</label>
                                <select class="form-select" name="semester" id="floatingSelect"aria-label="Floating label select example">
                                
                                <option> -- Pilih Semester --</option>
                                
                                <?php 
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                
                                <option value="<?= $row['id_semester'] ?>" ><?= $row['nama_semester'] ?></option>
                                
                                <?php 
                                }
                                ?>

                                </select>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Masukan Password" >
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Gambar</label>
                                    <input type="file" name="gambar" class="form-control" placeholder="Masukan Nama" >
                                </div>

                                

                                <button type="submit" class="btn btn-primary" name="tambah" >Tambah</button>
                            </form>
                        </div>
                    </div>
            </div>  
            <!-- Content End -->


        <?php 
        include '../footer.php';
        ?>
</body>

</html>