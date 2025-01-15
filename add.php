<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $kondisi = $_POST['kondisi'];
    $tanggal_ditambahkan = date('Y-m-d');

    $sql = "INSERT INTO barang_masjid (nama_barang, jumlah, kondisi, tanggal_ditambahkan) 
            VALUES ('$nama_barang', '$jumlah', '$kondisi', '$tanggal_ditambahkan')";

    if ($conn->query($sql)) {
        header('Location: index.php');
    } else {
        echo "Gagal menambah data: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    body {
      background-image: url(assets/img/masjid.png);
      background-size: cover;
    }
  </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-[20rem] py-20">
        <h1 class="text-3xl font-bold text-white mb-6">Tambah Barang</h1>
        <form method="POST" class="bg-white p-6 shadow rounded">
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Nama Barang:</label>
                <input type="text" name="nama_barang" class="w-full border rounded p-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Jumlah:</label>
                <input type="number" name="jumlah" class="w-full border rounded p-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Kondisi:</label>
                <select name="kondisi" class="w-full border rounded p-2" required>
                    <option value="Baik">Baik</option>
                    <option value="Rusak">Rusak</option>
                    <option value="Hilang">Hilang</option>
                </select>
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
                <a href="index.php" class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
