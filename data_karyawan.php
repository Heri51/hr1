
<?php
include 'akses/koneksi.php';
if (!isset($_SESSION['users'])) {
	echo "<script>document.location.href='login.php'</script>";
}
?>
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

  <title>Data Karyawan</title>
</head>
<body>
  <div class="card-body">
    <a href="add_karyawan.php" class="btn text-white btn-primary"><i class="fas fa-plus"></i> Tambah</a>
    <a href="report_karyawan.php" class="btn text-white btn-success"><i class="fas fa-plus"></i> Cetak</a>
    <p></p>
    <table class="table-responsive table-hover" id="datatablesSimple">
      <thead>
        <tr>
          <th>No.</th>
          <th>Nama</th>
          <th>Tanggal Lahir</th>
          <th>Gaji</th>
          <th>
            Aksi
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'akses/koneksi.php';
        $i = 1;
        $query = mysqli_query($conn, "SELECT * FROM karyawan");
        while ($data = mysqli_fetch_assoc($query)) {
        ?>
          <tr>
            <td><?= $i++; ?>.</td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['tgl_lahir']; ?></td>
            <td>Rp. <?= htmlspecialchars(number_format($data['gaji'])); ?></td>
            <td>
              <a href="edit_karyawan.php?id=<?= $data['id']; ?>">Edit</a>
              <a href="hapus_karyawan.php?id=<?= $data['id']; ?>">Hapus</a>
            </td>
          </tr>
        <?php
        } ?>
      </tbody>
    </table>
  </div>
  <p></p>
  <a href="logout.php">Logout</a>

</body>

</html>
