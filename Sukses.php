<?php
session_start();
$transaksi = $_SESSION['transaksi'] ?? null;
if (!$transaksi) {
  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Transaksi Berhasil</title>
</head>
<body>
<div style="text-align:center;margin-top:80px;">
<h2>Transaksi Berhasil!</h2>
<p>Data transaksi Anda:</p>
<div style="margin:20px auto;max-width:400px;background:#f3f4f6;padding:20px;border-radius:10px;text-align:left;">
<p><b>Game:</b> <?= htmlspecialchars($transaksi['game']) ?></p>
<p><b>User ID:</b> <?= htmlspecialchars($transaksi['userid']) ?></p>
<p><b>Server:</b> <?= htmlspecialchars($transaksi['server']) ?></p>
<p><b>Paket:</b> <?= htmlspecialchars($transaksi['paket']) ?></p>
<p><b>Metode:</b> <?= htmlspecialchars($transaksi['metode']) ?></p>
<p><b>Tanggal:</b> <?= htmlspecialchars($transaksi['tanggal']) ?></p>
</div>
<a href="index.php">Kembali ke Beranda</a>
</div>
</body>
</html>