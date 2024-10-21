<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Sweet Alerts 2.0 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.4/dist/sweetalert2.min.css" rel="stylesheet">
  <title>Login</title>
</head>
<?php
include 'akses/koneksi.php';
$pesan = '';
$tipe = '';
$redirect = '';

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");
  $x1 = mysqli_num_rows($result);
  if ($x1 > 0) {
    $_SESSION['user'] = mysqli_fetch_array($result);
    $pesan = 'Selamat, anda berhasil login';
    $tipe = 'success';
    $redirect = 'data_karyawan.php';
  } else {
    $pesan = 'Maaf! username dan password salah';
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
?>

<body>

  <form action="" method="POST">
    <div class="form-floating mb-3">
      <label>Email</label>
      <input class="form-control" name="email" type="email" placeholder="masukan e-mail" />
    </div>
    <div class="form-floating mb-3">
      <label>Password</label>
      <input class="form-control" name="password" type="password" placeholder="masukan password" />
    </div>
    <div class="mt-4 mb-0">
      <div class="d-grid">
        <button type="submit" name="submit" value="submit" class="btn btn-block w-100 text-white btn-primary">Masuk</button>
      </div>
    </div>
  </form>

</body>

</html>