<?php
include 'config/database.php';

if(isset($_POST['submit'])){
    $stmt = $conn->prepare("INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, stok) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssii", $_POST['judul'], $_POST['pengarang'], $_POST['penerbit'], $_POST['tahun'], $_POST['stok']);
    $stmt->execute();

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
<div class="card shadow">
<div class="card-body">

<h3>Tambah Buku</h3>

<form method="POST">
<div class="mb-3">
    <label>Judul</label>
    <input type="text" name="judul" class="form-control" required>
</div>

<div class="mb-3">
    <label>Pengarang</label>
    <input type="text" name="pengarang" class="form-control" required>
</div>

<div class="mb-3">
    <label>Penerbit</label>
    <input type="text" name="penerbit" class="form-control" required>
</div>

<div class="mb-3">
    <label>Tahun</label>
    <input type="number" name="tahun" class="form-control" required>
</div>

<div class="mb-3">
    <label>Stok</label>
    <input type="number" name="stok" class="form-control">
</div>

<button class="btn btn-success" name="submit">Simpan</button>
<a href="index.php" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>
</div>

</body>
</html>