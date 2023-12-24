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
            <div class="container-fluid pt-4 px-4">
            <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Form</h6>
                            <?php
                            $id = $_GET['id'];
                            
                            $query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id_mahasiswa = $id");
                            $d = mysqli_fetch_assoc($query);
                            ?>
                            <form action="proses.php" method="post" enctype="multipart/form-data" >

                            <input type="text" name="id"  value="<?= $d['id_mahasiswa'] ?>" hidden class="form-control" placeholder="Masukan Nama" >
                            <input type="text" name="fotoLama"  value="<?= $d['gambar'] ?>" hidden class="form-control" placeholder="Masukan Nama" >


                                <div class="mb-3">
                                    <label for="" class="form-label">Nama</label>
                                    <input type="text" value="<?= $d['nama'] ?>"  name="nama" class="form-control" placeholder="Masukan Nama" >
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Nim</label>
                                    <input type="text" name="nim" value="<?= $d['nim'] ?>" class="form-control" placeholder="Masukan Nim" >
                                </div>

                                <div class="mb-3">
                                <label for="">Matakuliah</label>
                                <select class="form-select" name="matkul" id="floatingSelect"aria-label="Floating label select example">
                                <?php 
                                    $sql2 = mysqli_query($conn , "SELECT * FROM matakuliah");
                                    while($data = mysqli_fetch_assoc($sql2)){
                                    $selected = ($data['id_matakuliah'] == $d['matakuliah']) ? "selected" : "";
                                    ?>
                                    <option value="<?= $data['id_matakuliah'] ?>" <?= $selected ?> > <?= $data['nama_matakuliah'] ?> </option> 
                                <?php } ?>
                                </select>
                                </div>


                                <div class="mb-3">
                                <label for="">Jurusan</label>
                                <select class="form-select" name="jurusan" id="floatingSelect"aria-label="Floating label select example">
                                <?php 
                                    $sql2 = mysqli_query($conn , "SELECT * FROM jurusan");
                                    while($data = mysqli_fetch_assoc($sql2)){
                                    $selected = ($data['id_jurusan'] == $d['jurusan']) ? "selected" : "";
                                    ?>
                                    <option value="<?= $data['id_jurusan'] ?>" <?= $selected ?> > <?= $data['nama_jurusan'] ?> </option> 
                                <?php } ?>
                                </select>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Alamat</label>
                                    <input type="text" name="alamat" value="<?= $d['alamat'] ?>" class="form-control" placeholder="Masukan Alamat" >
                                </div>

                                <div class="mb-3">
                                <label for="">Semester</label>
                                <select class="form-select" name="semester" id="floatingSelect"aria-label="Floating label select example">
                                <?php 
                                    $sql2 = mysqli_query($conn , "SELECT * FROM semester");
                                    while($data = mysqli_fetch_assoc($sql2)){
                                    $selected = ($data['id_semester'] == $d['semester']) ? "selected" : "";
                                    ?>
                                    <option value="<?= $data['id_semester'] ?>" <?= $selected ?> > <?= $data['nama_semester'] ?> </option> 
                                <?php } ?>
                                </select>
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password" name="password" value="<?= $d['password'] ?>" class="form-control" placeholder="Masukan Password" >
                                </div>

                                <div class="mb-3">
                                    <label for="" class="form-label">Gambar</label>
                                    <input type="file" name="gambar" value="<?= $d['gambar'] ?>" class="form-control" placeholder="Masukan Nama" >
                                </div>

                                

                                <button type="submit" class="btn btn-primary" name="edit" >Edit</button>
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