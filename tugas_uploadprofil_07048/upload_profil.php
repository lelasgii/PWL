<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Upload Foto Profil</title>
  <style>
    body {
      background-color: #e6f2e6;
      font-family: 'Segoe UI', sans-serif;
      color: #1e4d2b;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .upload-form {
      background: #ffffff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0,128,0,0.2);
    }

    input[type="file"],
    input[type="number"],
    input[type="submit"] {
      display: block;
      width: 100%;
      margin-top: 15px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    input[type="submit"] {
      background-color: #28a745;
      color: white;
      border: none;
      font-weight: bold;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #218838;
    }

    h2 {
      text-align: center;
      color: #155724;
    }
  </style>
</head>
<body>
  <form class="upload-form" action="upload_profil.php" method="POST" enctype="multipart/form-data">
    <h2>Upload Foto Profil</h2>
    <label>ID Pengguna:</label>
    <input type="number" name="id_pengguna" required>
    <label>Pilih Foto:</label>
    <input type="file" name="foto" accept="image/*" required>
    <input type="submit" name="upload" value="Upload">
    <footer style="text-align: center; margin-top: 20px; font-size: 14px; color: #666;">
  © 2025 | Dibuat oleh (A12.2023.07053) Laela Sugi Nurfatekhah
</footer>
  </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'koneksi.php';

    $id_pengguna = $_POST['id_pengguna'];
    $file = $_FILES['foto'];

    $file_name = $id_pengguna . "_" . time() . "." . pathinfo($file['name'], PATHINFO_EXTENSION);
    $target_dir = "profile_pics/";
    $target_file = $target_dir . basename($file_name);

    // Cek dan buat folder jika belum ada
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        $stmt = $conn->prepare("INSERT INTO foto_profil (id_pengguna, nama_file, lokasi_file) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $id_pengguna, $file_name, $target_file);
        $stmt->execute();

        echo "<script>alert('Upload berhasil!'); window.location='dashboard.php';</script>";
    } else {
        echo "<script>alert('Upload gagal!');</script>";
    }

    $conn->close();
}
?>