<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Data Usaha</title>
    
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
        background-color: #28a745; /* Warna latar belakang tombol tambah */
        border-color: #28a745; /* Warna border tombol tambah */
      }

      .btn-success:hover {
        background-color: #218838; /* Warna latar belakang saat hover */
        border-color: #1e7e34; /* Warna border saat hover */
      }

      .table {
        margin-top: 20px; /* Jarak atas tabel */
        border-radius: 10px; /* Sudut bulat pada tabel */
        overflow: hidden; /* Mencegah border tabel keluar dari sudut bulat */
      }

      .table th {
        background-color: #343a40; /* Warna latar belakang header tabel */
        color: white; /* Warna teks header tabel */
      }

      .table tr:hover {
        background-color: #e9ecef; /* Warna latar belakang baris saat hover */
      }

      .text-center a {
        margin: 0 5px; /* Jarak antar tombol edit dan hapus */
      }
    </style>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              DATA USAHA
            </div>
            <div class="card-body">
              <a href="tambah-usaha.php" class="btn btn-md btn-success" style="margin-bottom: 10px">TAMBAH DATA</a>
              <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">ID USAHA</th>
                    <th scope="col">NAMA USAHA</th>
                    <th scope="col">ALAMAT USAHA</th>
                    <th scope="col">STATUS</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    include('koneksi.php');
                    $no = 1;
                    $query = mysqli_query($connection, "SELECT * FROM usaha");

                    // Periksa jika query berhasil dijalankan
                    if (!$query) {
                        die("Query failed: " . mysqli_error($connection)); // Menampilkan pesan error jika query gagal
                    }

                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                    
                  <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $row['id_usaha'] ?></td>
                      <td><?php echo $row['nama_usaha'] ?></td>
                      <td><?php echo $row['alamat_usaha'] ?></td>
                      <td><?php echo $row['status_usaha'] ?></td>
                      <td class="text-center">
                        <a href="edit-usaha.php?id=<?php echo $row['id_usaha'] ?>" class="btn btn-sm btn-primary">EDIT</a>
                        <a href="hapus-usaha.php?id=<?php echo $row['id_usaha'] ?>" class="btn btn-sm btn-danger">HAPUS</a>
                      </td>
                  </tr>

                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
  </body>
</html>
