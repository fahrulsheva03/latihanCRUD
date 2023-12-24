<!DOCTYPE html>
<html lang="en">

<?php 
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
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-6">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Welcome</p>
                                <h6 class="mb-0">Admin</h6>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Content End -->


        <?php 
        include 'components/footer.php';
        ?>
</body>

</html>