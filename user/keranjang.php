<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: ../login.php ');
    exit;
}

$user = $_SESSION['username'];
$hasil = isset($_POST['hasil']) ? (int)$_POST['hasil'] : 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../vendor/fontawesome/fontawesome-free-6.4.2-web/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="./css/detail-style.css">
    <title>Document</title>
</head>

<body class="bg-body-secondary">
    <!-- Navbar -->
    <?php require "../partials/navbar-user.php" ?>
    <header aria-label="breadcrumb" class="mx-5 mt-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
        </ol>
    </header>
    <!-- Navbar end -->
    <!-- Hero section -->
    <section>
        <div class="container pt-2 pb-5 min-vh-100 position-relative">
            <div class="bg-white px-4 pt-3 d-flex justify-content-between mb-3">
                <p>Produk</p>
                <ul class="d-flex gap-5 list-unstyled">
                    <li class="mx-2 opacity-75 fw-medium">Harga Satuan</li>
                    <li class="mx-2 opacity-75 fw-medium">Kuantitas</li>
                    <li class="mx-2 opacity-75 fw-medium">Total Harga</li>
                    <li class="ms-2 opacity-75 fw-medium me-5">Aksi</li>
                </ul>
            </div>
            <?php
            require '../config/index.php';
            $idUser = $_SESSION['id_user'];
            $query = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_user = '$idUser'");
            while ($data = mysqli_fetch_assoc($query)) {
            ?>
                <form action="update-keranjang.php?id=<?= $data['id_product'] ?>&&jumlah=<?= $data['jumlah'] ?>" method="POST" class="d-flex flex-column gap-4">
                    <div class="bg-white px-4 py-2 d-flex justify-content-between w-100 align-items-center">
                        <div class="py-4 d-flex gap-4">
                            <input type="checkbox" name="checkbox<?= $data['id_product']?>" id="myCheckbox<?= $data['id_product']?>" onclick="getCheckboxValue()">
                            <img src="../upload/image/<?= $data['gambar'] ?>" alt="" width="100" height="100">
                            <p class="mt-2"><?= $data['nama_barang'] ?></p>
                        </div>
                        <div class="d-flex align-items-center justify-content-end my-auto ">
                            <p class="mx-5 my-auto">
                                <?= $data['harga'] ?>
                            </p>
                            <?php if ($data['jumlah'] < 1) {
                            ?>
                                <button class="px-2 py-1 btn btn-outline-secondary rounded-0" disabled>
                                <?php
                            } else {
                                ?>
                                    <button type="submit" name="kurang" class="px-2 py-1 btn btn-outline-secondary rounded-0">
                                    <?php
                                }
                                    ?>
                                    <i class="fa-solid fa-minus fa-xs py-1"></i>
                                    </button>
                                    <input type="text" name="hasil" value="<?= $data['jumlah'] ?>" class="text-center py-1 btn btn-outline-secondary rounded-0 border-end-0 border-start-0" style="width: 55px;" readonly>
                                    <button type="submit" name="tambah" class="btn btn-outline-secondary py-1 rounded-0">
                                        <i class="fa-solid fa-plus fa-xs py-1"></i>
                                    </button>
                                    <p class="mx-5 my-auto">
                                        Rp. <?= $data['harga'] * $data['jumlah'] ?>
                                    </p>
                                    <a href="" class="ms-3 me-5 my-auto text-decoration-none tombol-hapus">Hapus</a>
                        </div>
                    </div>
                </form>
            <?php
            }
            ?>
            <!-- Checkout -->
            <form action="checkout.php">
            <div class="bg-white py-3 d-flex justify-content-end mb-0 w-100 ">
                <div class="mx-3 d-flex gap-3">
                    <?php 
                    if(isset($_POST['checkbox'])){
                        echo "berhasil";
                    }
                    ?>
                    <p class="my-auto">Total(0 produk): <span class="text-danger">Rp. 0</span></p>
                    <button type="submit" class="btn btn-primary rounded-0 px-5">Checkout</button>
                </div>
            </div>
            </form>

        </div>

    </section>
    <!-- Hero Section end -->

    <!-- footer start -->
    <?php require '../partials/footer.php' ?>
    <!-- footer end -->

    <script>
        function getCheckboxValue() {
            // Mendapatkan elemen checkbox berdasarkan ID
            var checkbox = document.getElementById("myCheckbox");

            // Mendapatkan nilai checkbox (true jika dicentang, false jika tidak)
            var checkboxValue = checkbox.checked;

            // Menampilkan nilai checkbox
            console.log("Checkbox Value: " + checkboxValue);
        }
    </script>
    <!-- BEGIN: Vendor JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>