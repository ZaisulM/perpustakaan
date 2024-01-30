<!DOCTYPE html>
<html lang="en">

<?php
require("../../config/koneksi.php");
$koneksi->connect();

$id = $_GET["id"];
$sql = "SELECT * FROM tb_buku WHERE id_buku = '$id'";
$res = $koneksi->query($sql);
$koneksi->disconnect();
// var_dump($res); exit;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Libary || Home</title>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../../img/book.png" alt="" width="50" height="60" class="d-inline-block align-top">

            </a>

            <!-- Toggle button for small screens -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links and dropdown -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../../book/bookinfo.php">Show Book</a>
                    </li>
                    <!-- Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Info
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../member/member.php">Member</a></li>
                            <li><a class="dropdown-item" href="datapinjam.php">Booking</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
            <!-- button search -->
            <form class="d-flex ml-auto">
                <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-icon">
                <button class="btn btn-outline-success ms-2" type="button" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
    </nav> <!-- Login Button -->
    </form>
    </div>
    </nav>

    <div class="modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">LOGIN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Your beautiful login form goes here -->
                    <form class="container">
                        <div class="form-group mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter your username">
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter your password">
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                        <div class="position-static">
                            <p>Don't have account? <a href="regist.php">Sign UP</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <main class="col-md-9 col-lg-10 px-md-4 py-3 container">
        <h2>Pinjam Buku</h2>
        <div class="row">
            <div class="col-12 col-xl-12 mb-4 mb-lg-0">
                <div class="card">
                    <div class="card-header">Masukkan data untuk meminjam buku</div>
                    <form action="proses.php" method="post">
                        <div class="card-body">
                            <?php
                            if ($res ->num_rows > 0) {
                                $row = $res->fetch_assoc();
                            
                            ?>
                            <div class="row">
                                <div class="col-6">
                                    <label for="" class="form-label"> ID Transaksi</label>
                                    <input type="text" class="form-control" name="id_transaksi" required>
                                </div>
                                <div class="col-6">
                                    <label for="" class="form-label"> Nama Anggota</label>
                                    <input type="text" class="form-control" name="nama_anggota" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label for="" class="form-label"> Judul Buku</label>
                                    <input type="text" class="form-control" name="judul_buku" value="<?php echo $row['judul_buku'];?>">
                                </div>
                                <div class="col-6">
                                    <label for="" class="form-label"> Tanggal Peminjaman</label>
                                    <input type="date" class="form-control" name="tgl_peminjaman" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <label for="" class="form-label"> Tanggal Pengembalian</label>
                                    <input type="date" class="form-control" name="tgl_pengembalian" required>
                                </div>

                            </div>

                        </div>

                        <div class="card-footer">
                            <a href="../bookinfo.php" class="btn btn-primary">Cancel</a>
                            <button type="submit" name="tambah" class="btn btn-success">Submit</button>
                        </div>
                    <?php
                    }
                    ?>
                    </form>

                </div>
            </div>
        </div>
    </main>

</body>

</html>