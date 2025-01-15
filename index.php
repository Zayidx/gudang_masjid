<?php
include 'db.php';
$result = $conn->query("SELECT * FROM barang_masjid");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Barang Masjid</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background-image: url(assets/img/masjid.png);
      background-size: cover;
    }
  </style>
</head>
<body class="bg-gray-100 text-gray-800 justify-center align-center justify-center"">
  <div class="p-20  ">
    <h1 class="text-5xl font-bold text-center text-white mb-10">Data Barang Masjid</h1>
    <div class="text-right mb-4">
  <a href="add.php" class="mr-[14rem] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah Barang</a>
  </div>
    <div class="overflow-x-auto">
    <table class="mx-auto bg-white shadow-md rounded-lg overflow-hidden">
    <thead class="bg-blue-600 text-white">
        <tr>
            <th class="py-3 px-4 text-left">No</th>
            <th class="py-3 px-4 text-left">Nama Barang</th>
            <th class="py-3 px-4 text-center">Jumlah</th>
            <th class="py-3 px-4 text-center">Kondisi</th>
            <th class="py-3 px-4 text-center">Tanggal Ditambahkan</th>
            <th class="py-3 px-4 text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-3 px-4"><?= $no++; ?></td>
                    <td class="py-3 px-4"><?= $row['nama_barang']; ?></td>
                    <td class="py-3 px-4 text-center"><?= $row['jumlah']; ?></td>
                    <td class="py-3 px-4 text-center"><?= $row['kondisi']; ?></td>
                    <td class="py-3 px-4 text-center"><?= $row['tanggal_ditambahkan']; ?></td>
                    <td class="py-3 px-4 text-center">
                        <a href="edit.php?id=<?= $row['id']; ?>" class="text-blue-600 hover:underline">Edit</a> | 
                        <a href="delete.php?id=<?= $row['id']; ?>" class="text-red-600 hover:underline" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" class="py-3 px-4 text-center">Tidak ada data</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

      
    </div>
  
  </div>
  
  
</body>
</html>
