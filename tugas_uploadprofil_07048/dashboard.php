<?php
include 'koneksi.php';
$result = $conn->query("SELECT * FROM foto_profil ORDER BY uploaded_at DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Foto Profil</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f0fdf4;
      padding: 20px;
      color: #155724;
    }

    h2 {
      color: #1e4620;
    }

    .card {
      background: #ffffff;
      padding: 20px;
      margin-bottom: 15px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 128, 0, 0.1);
      display: flex;
      align-items: center;
      gap: 20px;
    }

    img {
      width: 120px;
      height: auto;
      border-radius: 8px;
      border: 2px solid #28a745;
    }

    .info {
      font-size: 15px;
    }
  </style>
</head>
<body>
  <h2>Daftar Foto Profil</h2>

  <?php while($row = $result->fetch_assoc()): ?>
    <div class="card">
      <img src="<?= $row['lokasi_file'] ?>" alt="Foto Profil">
      <div class="info">
        <strong>ID Pengguna:</strong> <?= $row['id_pengguna'] ?><br>
        <strong>Nama File:</strong> <?= $row['nama_file'] ?><br>
        <strong>Diupload pada:</strong> <?= $row['uploaded_at'] ?>
      </div>
    </div>
  <?php endwhile; ?>

</body>
</html>