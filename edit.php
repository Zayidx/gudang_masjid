<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM barang_masjid WHERE id = $id");
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $kondisi = $_POST['kondisi'];

    $sql = "UPDATE barang_masjid SET 
            nama_barang = '$nama_barang', 
            jumlah = '$jumlah', 
            kondisi = '$kondisi' 
            WHERE id = $id";

    if ($conn->query($sql)) {
        header('Location: index.php');
    } else {
        echo "Gagal mengupdate data: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
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
        <h1 class="text-3xl font-bold text-white mb-6">Edit Barang</h1>
        <form method="POST" class="bg-white p-6 shadow rounded">
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Nama Barang:</label>
                <input type="text" name="nama_barang" value="<?= $data['nama_barang']; ?>" class="w-full border rounded p-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Jumlah:</label>
                <input type="number" name="jumlah" value="<?= $data['jumlah']; ?>" class="w-full border rounded p-2" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Kondisi:</label>
                <select name="kondisi" class="w-full border rounded p-2" required>
                    <option value="Baik" <?= $data['kondisi'] == 'Baik' ? 'selected' : ''; ?>>Baik</option>
                    <option value="Rusak" <?= $data['kondisi'] == 'Rusak' ? 'selected' : ''; ?>>Rusak</option>
                    <option value="Hilang" <?= $data['kondisi'] == 'Hilang' ? 'selected' : ''; ?>>Hilang</option>
                </select>
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
                <a href="index.php" class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
