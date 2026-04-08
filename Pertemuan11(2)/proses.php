<?php
// ----------------
// Contoh proses form post
// ----------------
$nama = '';
$email = '';
$pesan = '';
$postErrors = [];
$postSuccess = false; // Memperbaiki typo 'Sucess' -> 'Success'

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pesan = trim($_POST['pesan'] ?? '');

    // Validasi sederhana - Menghapus karakter % yang salah
    if ($nama === '') {
        $postErrors[] = 'Nama wajib diisi';
    }
    
    if ($email === '') {
        $postErrors[] = 'Email wajib diisi';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $postErrors[] = 'Format email tidak valid'; // Perbaikan pesan error
    }
    
    if ($pesan === '') {
        $postErrors[] = 'Pesan wajib diisi';
    }
    
    if (empty($postErrors)) {
        $postSuccess = true;
    }    
}
?> <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil POST</title>
    <style>
        .error { color: red; border: 1px solid red; padding: 10px; margin-bottom: 10px; }
        .success { color: green; border: 1px solid green; padding: 10px; margin-bottom: 10px; }
        .result { background: #f4f4f4; padding: 10px; margin-top: 10px; }
    </style>
</head>
<body>
    <h2>Contoh Hasil Form POST</h2>

    <?php if (!empty($postErrors)): ?>
        <div class="error">
            <strong>Validasi gagal:</strong>
            <ul>
                <?php foreach ($postErrors as $error): ?>
                    <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if ($postSuccess): ?>
        <div class="success">Data berhasil dikirim dengan method POST.</div>
        <div class="result">
            <strong>Hasil Post:</strong><br>
            Nama: <?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?><br>
            Email: <?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?><br>
            Pesan: <?= nl2br(htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8')) ?>
        </div>
    <?php endif; ?>

    <br>
    <a href="index2.php">Kembali ke Form</a>
</body>
</html>