<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM barang_masjid WHERE id = $id";

if ($conn->query($sql)) {
    header('Location: index.php');
} else {
    echo "Gagal menghapus data: " . $conn->error;
}
?>
