<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Live Search Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

  <div class="container">
    <h2 class="text-success mb-4">Live Search Mahasiswa (AJAX + PHP + Bootstrap)</h2>

    <!-- Input Pencarian -->
    <input type="text" id="search" class="form-control mb-3" placeholder="Ketik NIM atau Nama...">

    <!-- Spinner -->
    <div id="loading" class="text-center text-success" style="display: none;">
      <div class="spinner-border text-success" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
      <p>Mencari...</p>
    </div>

    <!-- Hasil -->
    <table class="table table-bordered table-striped">
      <thead class="table-success">
        <tr>
          <th>NIM</th>
          <th>Nama</th>
          <th>Jurusan</th>
        </tr>
      </thead>
      <tbody id="result">
        <tr><td colspan="3" class="text-center">Silakan ketik untuk mencari data...</td></tr>
      </tbody>
    </table>
  </div>

  <!-- Script AJAX -->
  <script>
    const searchBox = document.getElementById("search");
    const result = document.getElementById("result");
    const loading = document.getElementById("loading");

    searchBox.addEventListener("keyup", function () {
      const keyword = searchBox.value.trim();

      if (keyword.length === 0) {
        result.innerHTML = "<tr><td colspan='3' class='text-center'>Silakan ketik untuk mencari data...</td></tr>";
        return;
      }

      loading.style.display = "block";
      fetch("search.php?keyword=" + encodeURIComponent(keyword))
        .then(res => res.json())
        .then(data => {
          loading.style.display = "none";
          result.innerHTML = "";

          if (data.length === 0) {
            result.innerHTML = "<tr><td colspan='3' class='text-center text-muted'>Data tidak ditemukan.</td></tr>";
          } else {
            data.forEach(row => {
              result.innerHTML += `<tr class="fadein">
                <td>${row.nim}</td>
                <td>${row.nama}</td>
                <td>${row.jurusan}</td>
              </tr>`;
            });
          }
        });
    });
  </script>
</body>
</html>