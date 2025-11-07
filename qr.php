<?php
session_start();

// Ambil data dari URL
$game   = $_GET['game'] ?? '';
$userid = $_GET['userid'] ?? '';
$server = $_GET['server'] ?? '';
$paket  = $_GET['paket'] ?? '';
$harga  = $_GET['harga'] ?? '';
$metode = $_GET['metode'] ?? '';

// Format harga ke IDR
function formatIDR($n) {
  return 'Rp ' . number_format($n, 0, ',', '.');
}

// Peta QR Code
$qrCodes = [
  "DANA"        => "images/kode_qr.png",
  "OVO"         => "images/kode_qr.png",
  "GoPay"       => "images/kode_qr.png",
  "ShopeePay"   => "images/kode_qr.png",
  "Bank Transfer" => "images/logo_bank.png"
];
$qrPath = $qrCodes[$metode] ?? "images/kode_qr.png";
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Konfirmasi Pembayaran | Kyouka Store</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<style>
body {
  font-family: 'Inter', sans-serif;
  background: linear-gradient(135deg, #3b82f6, #8b5cf6);
  color: #fff;
  text-align: center;
  padding: 50px 20px;
}
.container {
  max-width: 500px;
  margin: 0 auto;
  background: rgba(30,41,59,0.95);
  border-radius: 20px;
  padding: 35px 25px;
  box-shadow: 0 0 40px rgba(139,92,246,0.7);
}
h1 {
  font-size: 26px;
  margin-bottom: 15px;
}
p {
  color: #e2e8f0;
  margin: 6px 0;
  font-size: 15px;
}
img.qr {
  width: 240px;
  height: 240px;
  margin: 25px 0;
  border-radius: 14px;
  box-shadow: 0 0 25px rgba(255,255,255,0.5);
}
button {
  background: linear-gradient(90deg,#3b82f6,#8b5cf6);
  border: none;
  padding: 14px 20px;
  border-radius: 12px;
  font-weight: 700;
  color: #fff;
  cursor: pointer;
  box-shadow: 0 0 20px rgba(59,130,246,0.6);
  transition: .3s;
}
button:hover {
  box-shadow: 0 0 40px rgba(139,92,246,0.8);
}
</style>
</head>
<body>

<div class="container" id="confirmBox">
  <h1>Konfirmasi Pembayaran</h1>
  <p><b>Game:</b> <?= htmlspecialchars($game) ?></p>
  <p><b>User ID:</b> <?= htmlspecialchars($userid) ?></p>
  <p><b>Server:</b> <?= htmlspecialchars($server ?: '-') ?></p>
  <p><b>Paket:</b> <?= htmlspecialchars($paket) ?></p>
  <p><b>Harga:</b> <?= formatIDR($harga) ?></p>
  <p><b>Metode:</b> <?= htmlspecialchars($metode) ?></p>

  <img class="qr" src="<?= $qrPath ?>" alt="QR Pembayaran">
  <p>Silakan scan QR di atas untuk melakukan pembayaran.</p>
<form action="transaksi-berhasil.php" method="POST">
  <input type="hidden" name="game" value="<?= htmlspecialchars($_GET['game'] ?? '') ?>">
  <input type="hidden" name="userid" value="<?= htmlspecialchars($_GET['userid'] ?? '') ?>">
  <input type="hidden" name="server" value="<?= htmlspecialchars($_GET['server'] ?? '') ?>">
  <input type="hidden" name="paket" value="<?= htmlspecialchars($_GET['paket'] ?? '') ?>">
  <input type="hidden" name="metode" value="<?= htmlspecialchars($_GET['metode'] ?? '') ?>">
  <input type="hidden" name="harga" value="<?= htmlspecialchars($_GET['harga'] ?? '') ?>">

  <button type="submit" style="
    background: #6366f1;
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    margin-top: 20px;">
    Saya Sudah Bayar
  </button>
</form>
    </div>
</body>
</html>