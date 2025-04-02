<?php 
include('koneksi.php');

$id = $_GET['id'];

// Pastikan untuk menyaring input untuk mencegah SQL Injection
$id = intval($id); // Mengonversi ke integer

$query = "SELECT * FROM usaha WHERE id_usaha = $id LIMIT 1";
$result = mysqli_query($connection, $query);

if (!$result) {
    // Menampilkan pesan kesalahan
    die("Query failed: " . mysqli_error($connection));
}

// Mengambil data
$row = mysqli_fetch_array($result);

// Periksa apakah baris ditemukan
if (!$row) {
    die("Data tidak ditemukan!");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Usaha</title>
    
    <style>
        body {
            background-color: #f8f9fa; /* Warna latar belakang yang lebih terang */
            font-family: Arial, sans-serif; /* Mengatur font */
        }

        .card {
            border-radius: 10px; /* Sudut bulat pada card */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Bayangan untuk card */
        }

        .card-header {
            background-color: #007bff; /* Warna latar belakang header */
            color: white; /* Warna teks header */
            font-size: 1.5em; /* Ukuran font header */
            border-top-left-radius: 10px; /* Sudut bulat kiri atas */
            border-top-right-radius: 10px; /* Sudut bulat kanan atas */
        }

        .btn-success {
            background-color: #28a745; /* Warna latar belakang tombol update */
            border-color: #28a745; /* Warna border tombol update */
        }

        .btn-success:hover {
            background-color: #218838; /* Warna latar belakang saat hover */
            border-color: #1e7e34; /* Warna border saat hover */
        }

        .btn-warning {
            background-color: #ffc107; /* Warna latar belakang tombol reset */
            border-color: #ffc107; /* Warna border tombol reset */
        }

        .btn-warning:hover {
            background-color: #e0a800; /* Warna latar belakang saat hover */
            border-color: #d39e00; /* Warna border saat hover */
        }
    </style>
</head>

<body>

    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        EDIT USAHA
                    </div>
                    <div class="card-body">
                        <form action="update-usaha.php" method="POST">

                            <div class="form-group">
                                <label>Nama Usaha</label>
                                <input type="text" name="nama_usaha" value="<?php echo htmlspecialchars($row['nama_usaha']); ?>" placeholder="Masukkan Nama Usaha" class="form-control" required>
                                <input type="hidden" name="id_usaha" value="<?php echo htmlspecialchars($row['id_usaha']); ?>">
                            </div>

                            <div class="form-group">
                                <label>Alamat Usaha</label>
                                <input type="text" name="alamat_usaha" value="<?php echo htmlspecialchars($row['alamat_usaha']); ?>" placeholder="Masukkan Alamat Usaha" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label>Status Usaha</label>
                                <textarea class="form-control" name="status_usaha" placeholder="Masukkan Status Usaha" rows="4" required><?php echo htmlspecialchars($row['status_usaha']); ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-success">UPDATE</button>
                            <button type="reset" class="btn btn-warning">RESET</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
