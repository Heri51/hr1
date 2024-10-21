<?php
include 'akses/koneksi.php';
// $pesan = '';
// $tipe = '';
// $redirect = '';

$id = $_GET['id'];

$result = mysqli_query($conn, "DELETE FROM karyawan WHERE id='$id'");

if ($result) {
	echo "<script>alert('Selamat, data karyawan anda berhasil dihapus');
    document.location.href='data_karyawan.php';
    </script>";
  // $pesan = 'Selamat, data karyawan anda berhasil dihapus';
  // $tipe = 'success';
  // $redirect = 'data_karyawan.php';
} else {
  echo "<script>alert('Maaf, data gagal dihapus')</script>";
  // $pesan = 'Maaf! data karyawan anda gagal dihapus';
  // $tipe = 'error';
  // $redirect = '';
  
//   // Output JavaScript dari SweetAlert2
//   echo "<script>
//     document.addEventListener('DOMContentLoaded', function() {
//         Swal.fire({
//             title: '" . ($tipe === 'success' ? 'Success' : 'Error') . "',
//             text: '" . $pesan . "',
//             icon: '" . $tipe . "',
//             showCancelButton: true,
//     confirmButtonText: 'OKE',
//     cancelButtonText: 'Batal',
//     customClass: {
//     confirmButton: 'custom-confirm-button'
//     }
//         }).then((result) => {
//             if (" . ($redirect ? "result.isConfirmed" : "false") . ") {
//                 window.location.href = '" . $redirect . "';
//             }
//         });
//     });
// </script>";
}
?>