<?php
session_start();
include "login_syn.php";
include "functions.php";

  if(!isset($_SESSION["login"])){
      header("location: halamanawal.php");
      exit;
  }
$result = mysqli_query($connect,"SELECT * FROM admin");

$id = $_SESSION["id"];
$username = $_SESSION["username"];

$id2 = $_GET['id'];
$result2 = mysqli_query($connect,"SELECT * FROM data where id = '$id2' ");

if(isset($_POST["submit"])) {
    if(ubah2($_POST) > 0){
      echo "<script>alert('data berhasil di ubah');
      document.location.href = 'tables.php';     
      </script>";
    }
    else{
      echo "<script>alert('data gagal di ubah');     
      </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/logo_iadel.png">
    <title></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/6.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class=""></i>
                </div>
                <div class="sidebar-brand-text mx-3">ADMIN<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
          

          

            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link" href="tambahuser.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Tambah User</span></a>
            </li>
             <li class="nav-item active">
                <a class="nav-link" href="datauser.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data User</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="tambahalumni.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Tambah Alumni</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Alumni</span></a>
            </li>
             <li class="nav-item active">
                <a class="nav-link" href="tambahadmin.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Admin</span></a>
            </li>
             <li class="nav-item active">
                <a class="nav-link" href="logout.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Logout</span></a>
            </li>
          

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                      
                        <?php 
                        $query = $connect->query("SELECT * From admin where id = '$id' ");
                        $i=1;
                        foreach ($query as $key => $value) {
                        ?>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $value['username']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/<?= $value['gambar']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                        <?php }  ?>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="main-block">
                        <center>
                          <?php 
                        $query1 = $connect->query("SELECT * FROM data where id = '$id2' ");
                        $i=1;
                        foreach ($query1 as $key => $value1) {
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                           
                            <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                    <form  method="POST" >
                                    <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $value1['id']; ?>">
                                    <label for="exampleFormControlInput1"></label>
                                    <input type="text" class="form-control" name="nama" id="exampleFormControlInput1" value="<?php echo $value1['Nama']; ?> ">
                                    <label for="exampleFormControlInput1"></label>
                                    <input type="text" class="form-control" name="pekerjaan" id="exampleFormControlInput1" value="<?php echo $value1['Pekerjaan']; ?> ">
                                    <label for="exampleFormControlInput1"></label>
                                    <input type="text" class="form-control" name="alamat" id="exampleFormControlInput2" value="<?php echo $value1['Alamat']; ?> ">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlSelect1"></label>
                                    <select class="form-control" name="angkatan" id="exampleFormControlSelect1">
                                      <option>--Tahun Angkatan--</option>
                                      <option>2001</option>
                                      <option>2002</option>
                                      <option>2003</option>
                                      <option>2004</option>
                                      <option>2005</option>
                                      <option>2006</option>
                                      <option>2007</option>
                                      <option>2008</option>
                                      <option>2009</option>
                                      <option>2010</option>
                                      <option>2011</option>
                                      <option>2012</option>
                                      <option>2013</option>
                                      <option>2014</option>
                                      <option>2015</option>
                                      <option>2016</option>
                                      <option>2017</option>
                                      <option>2018</option>
                                      <option>2019</option>
                                      <option>2020</option>
                                    </select>
                                    <label for="exampleFormControlSelect1"></label>
                                    <select class="form-control" name="jk" id="exampleFormControlSelect1">
                                      <option>--Jenis Kelamin--</option>
                                      <option>Laki-laki</option>
                                      <option>Perempuan</option>
                                     
                                    </select>
                                     <label for="exampleFormControlSelect1"></label>
                                    <select class="form-control" name="prodi" id="exampleFormControlSelect1">
                                      <option>--Prodi Saat Masih Aktif--</option>
                                      <option>D3 Teknologi Komputer</option>
                                      <option>D3 Teknologi Informasi</option>
                                      <option>D4 Teknologi Rekayasa Perangkat Lunak</option>
                                      <option>S1 Sistem Informasi</option>
                                      <option>S1 Teknik Informatika</option>
                                      <option>S1 Bioproses</option>
                                      <option>S1 Manajemen Rekayasa</option>
                                    </select>

                                  </div>
                            <button type="submit" name="submit">Submit</button>
                          </form>
                          <!-- <form action="" method="POST" enctype="multipart/form-data">
                            <h1>Tambahkan Alumni : </h1>
                            <div class="info">
                               <input type="hidden" name="id" value="<?php echo $value1['id']; ?>">
                              <input class="fname" type="text" name="nama" value="<?php echo $value1['Nama']; ?>">
                              <input type="text" name="jk" value="<?php echo $value1['Jk']; ?>">
                              <input type="text" name="prodi" value="<?php echo $value1['Prodi']; ?>">
                              <input type="text" name="nim" value="<?php echo $value1['Pekerjaan']; ?>">
                              <input type="text" name="angkatan" value="<?php echo $value1['Angkatan']; ?>">
                              <input type="text" name="alamat" value="<?php echo $value1['Alamat']; ?>">
                             
                            </div>
                            <button type="submit" name="submit">Submit</button>
                          </form> -->
                           <?php }  ?>
                        </center>
                        </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Keluar</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah anda yakin ingin keluar?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>

</body>

</html>
