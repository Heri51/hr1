<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Sweet Alerts 2.0 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css" rel="stylesheet">

  <title>Edit Data Karyawan</title>
</head>
<?php
include 'akses/koneksi.php';
$pesan = '';
$tipe = '';
$redirect = '';

$id = $_GET['id'];
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $gaji = $_POST['gaji'];

  $result = mysqli_query($conn, "UPDATE karyawan SET nama='$nama',tgl_lahir='$tgl_lahir',gaji='$gaji' WHERE id='$id'");

  if ($result) {
    $pesan = 'Selamat, data karyawan anda berhasil diperbarui';
    $tipe = 'success';
    $redirect = 'data_karyawan.php';
  } else {
    $pesan = 'Maaf! data karyawan anda gagal diperbarui';
    $tipe = 'error';
    $redirect = '';
  }

  // Output JavaScript dari SweetAlert2
  echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: '" . ($tipe === 'success' ? 'Success' : 'Error') . "',
                    text: '" . $pesan . "',
                    icon: '" . $tipe . "',
                    showCancelButton: true,
  					confirmButtonText: 'OKE',
  					cancelButtonText: 'Batal',
  					customClass: {
    				confirmButton: 'custom-confirm-button'
  					}
                }).then((result) => {
                    if (" . ($redirect ? "result.isConfirmed" : "false") . ") {
                        window.location.href = '" . $redirect . "';
                    }
                });
            });
        </script>";
}
$result = mysqli_query($conn, "SELECT * FROM karyawan WHERE id='$id'");
$data = mysqli_fetch_assoc($result);
?>

<body>
  <div class="row">
    <div class="card col-md-6">
      <form action="" method="POST">
        <div class="row col-md-12 mb-3">
          <div class="container">
            <label>Nama Karyawan</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama']; ?>" required>
          </div>
        </div>
        <div class="row col-md-12 mb-4">
          <div class="container">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" value="<?= $data['tgl_lahir']; ?>" required>
          </div>
        </div>
        <div class="row col-md-12 mb-4">
          <div class="container">
            <label>Gaji</label>
            <input type="number" name="gaji" class="form-control" value="<?= $data['gaji']; ?>" required>
          </div>
        </div>
        <div class="row">
          <div class="container">
            <button type="submit" class="btn text-white" name="submit" value="submit" style="background-color: #1b5fae;">Simpan</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
        </div>
      </form>
    </div>
  </div>

</body>

</html>