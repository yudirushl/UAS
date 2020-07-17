<?php
  session_start();
  if(!isset($_SESSION['id_user'])){
    header("Location: ./login.php");
    die();
  }

  include "config.php";
?>
<?php
    // Check apakah form telah di submit untuk update, setelah itu redirect ke index setelah update
    if(isset($_POST['submit']))
    {   
        $id = $_POST['id'];
        $restoran = $_POST['restoran'];
        $makanan = $_POST['makanan'];
        $harga = $_POST['harga'];
        $nama_lengkap = $_POST['nama_lengkap'];
        $hp = $_POST['hp'];
	$email = $_POST['email'];

        // Update data
        $result = mysqli_query($conn, "INSERT INTO restoran SET id='$id', restoran='$restoran', makanan='$makanan', harga='$harga', nama_lengkap='$nama_lengkap', hp='$hp', email='$email'");

        // Redirect ke homepage
        header("Location: index.php");
    }
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
      <h1>Input Data</h1><br>
      <form name="submit_user" action="input.php" method="post">
        <div class="form-group">
          <input type="hidden" name="id" value=""></input>
          <label>Restoran</label>
          <select name="restoran" class="form-control" style="width: 50%;">
            <option value="">Pilih Restoran</option>
            <option value="Warteg Kharisma">Warteg Kharisma</option>
            <option value="Restoran Padang Sederhana">Restoran Padang Sederhana</option>
            <option value="Soto Ayam Ndelik">Soto Ayam Ndelik</option>
       
          </select><br>
          <label>Makanan</label>
          <input type="text" name="makanan" class="form-control" placeholder="Makanan" style="width:50%;"></input><br>
          <label>Harga</label>
          <input type="text" name="harga" class="form-control" placeholder="Harga" style="width:50%;"></input><br>
		  <label>Nama_Lengkap</label>
          <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama_Lengkap" style="width:50%;"></input><br>
		  <label>HP</label>
          <input type="text" name="hp" class="form-control" placeholder="Hp" style="width:50%;"></input><br>
		  <label>Email</label>
          <input type="text" name="email" class="form-control" placeholder="Email" style="width:50%;"></input><br>
          <button type="submit" name="submit" class="btn btn-outline-primary">Input</button> <button type="reset" class="btn btn-outline-primary">Reset</button>
        </div>
      </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>