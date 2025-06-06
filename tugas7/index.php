<!DOCTYPE html>
<html>
<head>
  <title>Form Tambah Produk</title>
</head>
<body>
  <h2>Form Tambah Produk</h2>

  <?php
  // Inisialisasi variabel
  $nama = "";
  $harga = "";
  $deskripsi = "";
  $error = "";
  $sukses = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $nama = $_POST["nama"];
      $harga = $_POST["harga"];
      $deskripsi = $_POST["deskripsi"];

      // Validasi input tidak boleh kosong
      if (empty($nama) || empty($harga) || empty($deskripsi)) {
          $error = "Semua field wajib diisi!";
      } else {
          // Jika ingin disimpan ke database, tambahkan koneksi dan query di sini

          // Contoh output sebagai hasil pemrosesan
          $sukses = "Data produk berhasil disimpan:<br>";
          $sukses .= "Nama: $nama<br>";
          $sukses .= "Harga: Rp " . number_format($harga) . "<br>";
          $sukses .= "Deskripsi: $deskripsi";
      }
  }
  ?>

  <!-- Menampilkan error atau hasil -->
  <?php if ($error): ?>
    <p style="color: red;"><?php echo $error; ?></p>
  <?php endif; ?>
  <?php if ($sukses): ?>
    <p style="color: green;"><?php echo $sukses; ?></p>
  <?php endif; ?>

  <!-- Form input -->
  <form method="post">
    <label>Nama Produk:</label><br>
    <input type="text" name="nama" value="<?php echo htmlspecialchars($nama); ?>"><br><br>

    <label>Harga:</label><br>
    <input type="number" name="harga" value="<?php echo htmlspecialchars($harga); ?>"><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi"><?php echo htmlspecialchars($deskripsi); ?></textarea><br><br>

    <input type="submit" value="Simpan">
  </form>
</body>
</html>
