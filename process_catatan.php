<?php
include 'config/db.php';

// Tambah Transaksi
if (isset($_POST['create'])) {
  $jenis = $_POST['jenis'];
  $jumlah = $_POST['jumlah'];
  $keterangan = $_POST['keterangan'];
  $tanggal = $_POST['tanggal'];

  $stmt = $mysqli->prepare("INSERT INTO transaksi (jenis, jumlah, keterangan, tanggal) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("siss", $jenis, $jumlah, $keterangan, $tanggal);

  if (!$stmt->execute()) {
    die("Query Error: " . $stmt->error);
  }

  header("Location: index.php");
}


// Update Transaksi
if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $jenis = $_POST['jenis'];
  $jumlah = $_POST['jumlah'];
  $keterangan = $_POST['keterangan'];
  $tanggal = $_POST['tanggal'];

  $mysqli->query("UPDATE transaksi SET jenis='$jenis', jumlah='$jumlah', keterangan='$keterangan', tanggal='$tanggal' WHERE id=$id");
  header("Location: index.php");
}

// Hapus Transaksi
if (isset($_GET['delete'])) {
  $id = (int) $_GET['delete'];
  if (!$mysqli->query("DELETE FROM transaksi WHERE id=$id")) {
    die("Query Error: " . $mysqli->error);
  }

  header("Location: index.php");
}

