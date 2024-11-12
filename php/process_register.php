<?php

require 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $l_Name = $_POST['lastName'];
    $nim = $_POST['nim'];
    $noHp = $_POST['noHp'];
    $username = $_POST['username'];
    $jurusan = $_POST['jurusan'];
    $prodi = $_POST['prodi'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $ttd = $_POST['ttd'];

    // Validasi password
    if ($password !== $confirmPassword) {
        echo "Password tidak cocok!";
        exit;
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Cek apakah username sudah ada
    $checkUserQuery = $conn->prepare("SELECT id_user FROM tb_user WHERE username = ?");
    $checkUserQuery->bind_param("s", $username);
    $checkUserQuery->execute();
    $checkUserQuery->store_result();

    if ($checkUserQuery->num_rows > 0) {
        echo "Username sudah ada. Silakan gunakan username lain.";
        exit;
    }
    $checkUserQuery->close();

    /// Proses simpan tanda tangan
    $ttd = str_replace('data:image/png;base64,', '', $ttd);
    $ttd = str_replace(' ', '+', $ttd);
    $ttdData = base64_decode($ttd);

    // Tentukan path simpan file tanda tangan dengan nama sesuai nomor handphone
    $fileName = $nim . '.png'; // Nama file sesuai dengan nomor HP
    $filePath = 'uploads/signatures/' . $fileName;

    // Simpan file tanda tangan ke folder server
    if (!file_exists('uploads/signatures')) {
        mkdir('uploads/signatures', 0777, true);
    }

    file_put_contents($filePath, $ttdData);

     // SQL untuk memasukkan data ke dalam database
     $stmt = $conn->prepare("INSERT INTO tb_user (f_name, l_name, username, password, nim, prodi, jurusan, no_hp, ttd) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
     // Ubah string tipe data menjadi 'sssssssss'
     $stmt->bind_param("sssssssss", $firstName, $l_Name, $username, $hashedPassword, $nim, $prodi, $jurusan, $noHp, $filePath);
 
     if ($stmt->execute()) {
         echo "Registrasi berhasil!";
     } else {
         echo "Error: " . $stmt->error;
     }
    $stmt->close();
    $conn->close();
}

?>