<?php
include 'config/database.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM buku WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if(isset($_POST['update'])){
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $stok = $_POST['stok'];

    $stmt = $conn->prepare("UPDATE buku SET judul=?, pengarang=?, penerbit=?, tahun_terbit=?, stok=? WHERE id=?");
    $stmt->bind_param("sssiii", $judul, $pengarang, $penerbit, $tahun, $stok, $id);
    $stmt->execute();

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
<div class="card shadow">
<div class="card-body">

<h3 class="mb-4">Edit Buku</h3>

<form method="POST">

<div class="mb-3">
    <label>Judul</label>
    <input type="text" name="judul" class="form-control"
        value="<?= htmlspecialchars($data['judul']) ?>" required>
</div>

<div class="mb-3">
    <label>Pengarang</label>
    <input type="text" name="pengarang" class="form-control"
        value="<?= htmlspecialchars($data['pengarang']) ?>" required>
</div>

<div class="mb-3">
    <label>Penerbit</label>
    <input type="text" name="penerbit" class="form-control"
        value="<?= htmlspecialchars($data['penerbit']) ?>" required>
</div>

<div class="mb-3">
    <label>Tahun</label>
    <input type="number" name="tahun" class="form-control"
        value="<?= $data['tahun_terbit'] ?>" required>
</div>

<div class="mb-3">
    <label>Stok</label>
    <input type="number" name="stok" class="form-control"
        value="<?= $data['stok'] ?>">
</div>

<button type="submit" name="update" class="btn btn-warning">Update</button>
<a href="index.php" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>
</div>

</body>
</html>