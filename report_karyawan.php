<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Cetak data Karyawan</title>
</head>

<body>

  <div class="container">
    <center style="font-family:Arial, sans-serif;">
      <h2>Laporan Data Karyawan</h2>
      <p></p>
    </center>
    <table class="table-responsive">
      <thead>
        <tr>
          <th>
            <center>No.</center>
          </th>
          <th>Nama Karyawan</th>
          <th>Tanggal Lahir</th>
          <th>Gaji</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include 'akses/koneksi.php';
        $result = mysqli_query($conn, "SELECT * FROM karyawan");
        while ($data = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?= htmlspecialchars($data['nama']); ?></td>
            <td><?= htmlspecialchars($data['tgl_lahir']); ?></td>
            <td>Rp. <?= htmlspecialchars(number_format($data['gaji'])); ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
  
  <script>
    window.print();
    setTimeout(function() {
      window.close();
    }, 100);
  </script>
</body>

</html>