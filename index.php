<?php
  session_start();
  if(!isset($_SESSION['id_user'])){
    header("Location: ./login.php");
    die();
  }

  include "config.php";
?>
<!DOCTYPE HTML>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style>
      body{
        background-color: #f5f5f5;
      }
      .table th {
        text-align: center;
      }
      .table td {
        text-align: center;
      }
    </style>

    <title>Home</title>
  </head>
  <body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">06007</h5>
        <nav class="my-2 my-md-0 mr-md-3">
          <a class="p-2 text-dark" href="index.php">Home</a>
          <a class="p-2 text-dark" href="input.php">Insert Pesanan</a>
          <a class="p-2 text-dark" href="pesanan.php">Pesanan</a>
        </nav>
        <a class="btn btn-outline-primary" href="logout.php">Log Out</a>
    </div>

    <div class="container">
      <?php
        //skrip untuk menampilkan data dari database
        $sql = mysqli_query($conn, "SELECT * FROM restoran"); //script query untuk mengambil semua data dari table transaksi
        if(mysqli_num_rows($sql) > 0) { //mengecek apakah ada data di dalam table transaksi atau tidak, jika ada maka query akan di jalankan
          while($row = mysqli_fetch_array($sql)) {
      ?>
      <center><h3>Data Pemesanan Makanan <?php echo $row['restoran']; ?> <br>
      <?php $dt = new DateTime('now', new DateTimezone('Asia/Jakarta')); ?>
      Per <?php echo $dt->format("d F Y H:i:s"); ?> <br>
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Restoran</th>
            <th scope="col">Makanan</th>
            <th scope="col">Harga</th>
			<th scope="col">Nama Lengkap</th>
			<th scope="col">Hp</th>
			<th scope="col">Email</th>
            <th scope="col">Option</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="padding-top: 10px;"><?php echo $row['id']; ?></td>
            <td style="padding-top: 10px;"><?php echo $row['restoran']; ?></td>
            <td style="padding-top: 10px;"><?php echo $row['makanan']; ?></td>
            <td style="padding-top: 10px;"><?php echo $row['harga']; ?></td>
			<td style="padding-top: 10px;"><?php echo $row['nama_lengkap']; ?></td>
			<td style="padding-top: 10px;"><?php echo $row['hp']; ?></td>
			<td style="padding-top: 10px;"><?php echo $row['email']; ?></td>
            <script type="text/javascript" language="JavaScript">
              function konfirmasi(){
                tanya = confirm("Hapus ?");
                if (tanya == true) return true;
                else return false;
              }
            </script>
            <td><a href="<?php echo "edit.php?id=$row[id]"; ?>" class="btn btn-primary btn-s">Edit</a>  <a href="<?php echo "delete.php?id=$row[id]"; ?>" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a></td>
          </tr>
        </tbody>
      </table>
      <?php } }  ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>