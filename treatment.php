<?php
require 'function.php';
// require 'cek.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <h1 class="navbar-brand ps-3"> Kiki Salon</h1>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Pelanggan
                            </a>
                            <a class="nav-link" href="akunlogin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                account
                            </a>
                            <a class="nav-link" href="treatment.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Treatment
                            </a>
                            <a class="nav-link" href="booking.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Booking
                            </a>
                            <a class="nav-link" href="konfirmasi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Konfirmasi
                            </a>
                            <a class="nav-link" href="pembatalan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Pembatalan
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                        <h1 class="mt-4">Treatment</h1>
                        <div class="card mb-4">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTreatmentModal">
                                Tambah Treatment Baru
                            </button>
                        </div>
                        <!-- The Modal for Adding New Treatment -->
                        <div class="modal fade" id="addTreatmentModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Tambah Treatment Baru</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <form method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    Jenis Treatment:
                                    <input type="text" name="jenis_treatment" placeholder="Jenis Treatment" class="form-control" required>
                                    <br>
                                    Gambar:
                                    <input type="file" name="gambar" class="form-control" required>
                                    <br>
                                    Keterangan:
                                    <input type="text" name="keterangan" placeholder="Keterangan" class="form-control" required>
                                    <br>
                                    Harga:
                                    <input type="number" name="harga" placeholder="Harga" class="form-control" required>
                                    <br>
                                    <button type="submit" class="btn btn-primary" name="addtreatment">Submit</button>
                                </div>
                                </form>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>

                                </div>
                            </div>
                        </div>


                            <!-- <div class="card-header">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Tambah Barang Baru
                            </button>
                            </div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="datatablesSimple">
                                        <thead>
                                            <tr>
                                                <th>Id Treatment</th>
                                                <th>Jenis Treatment</th>
                                                <th>Gambar</th>
                                                <th>Keterangan</th>
                                                <th>Harga</th>    
                                                <th>Aksi</th>                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ambilsemuadatapelanggan = mysqli_query($conn, "SELECT * FROM treatment");

                                            while ($data = mysqli_fetch_array($ambilsemuadatapelanggan)) {
                                                $idtreatment = $data['ID_Treatment'];
                                                $jenistreatment = $data['Jenis_Treatment'];
                                                $gambar= $data['Gambar'];
                                                $keterangan = $data['Keterangan'];
                                                $harga = $data['Harga'];                                                
                                            ?>
                                            <tr>
                                                <td><?= $idtreatment; ?></td>
                                                <td><?= $jenistreatment; ?></td>
                                                <td><img src="<?= $gambar; ?>" alt="Treatment Image" style="width: 100px; height: auto;"></td>

                                                <td><?= $keterangan; ?></td>
                                                <td><?= $harga; ?></td>                            
                                                <td>
                                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['ID_Treatment']; ?>">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $data['ID_Treatment']; ?>">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="editModal<?= $data['ID_Treatment']; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Treatment</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post" enctype="multipart/form-data">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="editId" value="<?= $data['ID_Treatment']; ?>">
                                                                Jenis Treatment:
                                                                <input type="text" name="editJenisTreatment" value="<?= $jenistreatment; ?>" class="form-control" required>
                                                                <br>
                                                                <img src="<?= $gambar; ?>" alt="Treatment Image" style="width: 100px; height: auto;">
                                                                <br>
                                                                Ubah Gambar (optional):
                                                                <input type="file" name="editgambar" class="form-control">
                                                                <input type="hidden" name="existingImage" value="<?= $gambar; ?>">
                                                                <br>
                                                                Keterangan:
                                                                <input type="text" name="editKeterangan" value="<?= $keterangan; ?>" class="form-control" required>
                                                                <br>
                                                                Harga:
                                                                <input type="number" name="editharga" value="<?= $harga; ?>" class="form-control" required>
                                                                <br>
                                                                <button type="submit" class="btn btn-primary" name="edittreatment">Submit</button>
                                                            </div>
                                                        </form>


                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModal<?= $data['ID_Treatment']; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">hapus data</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="deleteId" value="<?= $data['ID_Treatment']; ?>">
                                                                <p>apakah anda yakin untuk menghapus <?=$jenistreatment?>?</p>
                                                                <button type="submit" class="btn btn-danger" name="deletetreatment">Delete</button>
                                                            </div>
                                                        </form>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Lotter Mart 2023</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

         <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">Tambah Barang Baru</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">
            <input type="text" name="Nama Produk" placeholder="Nama Produk" class="form-control" required>
            <br>
            <input type="text" name="Kategori" placeholder="Kategori" class="form-control" required>
            <br>
            <input type="number" name="Harga Barang" placeholder="Harga Barang" class="form-control" required>
            <br>
            <input type="number" name="Stock" placeholder="Stock" class="form-control" required>
            <br>
            <button type="submit" class="btn btn-primary" name="addbarang">Submit</button>
        </div>
        </form>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>

        </div>
    </div>
    </div> 
</html>
