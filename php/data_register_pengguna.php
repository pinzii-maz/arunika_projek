<?php
require 'functions.php';

$query = "SELECT id_user, f_name, l_name, username, nim, prodi, jurusan, no_hp, ttd FROM tb_user";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="register.css">
    <title>Document</title>
</head>
<body>
    <div>
        <h2>Data Registrasi Mahasiswa</h2>
        <table>
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b">Id User</th>
                    <th class="px-6 py-3 border-b">Nama Depan</th>
                    <th class="px-6 py-3 border-b">Nama Belakang</th>
                    <th class="px-6 py-3 border-b">Username</th>
                    <th class="px-6 py-3 border-b">Nim</th>
                    <th class="px-6 py-3 border-b">Program Studi</th>
                    <th class="px-6 py-3 border-b">Jurusan</th>
                    <th class="px-6 py-3 border-b">No. Hp</th>
                    <th class="px-6 py-3 border-b">Tanda Tangan</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) {?>
                    <tr class="zigzag-row">
                    <td class="px-6 py-4 border-b"><?php echo $row['id_user']; ?></td>
                        <td class="px-6 py-4 border-b"><?php echo $row['f_name']; ?></td>
                        <td class="px-6 py-4 border-b"><?php echo $row['l_name']; ?></td>
                        <td class="px-6 py-4 border-b"><?php echo $row['username']; ?></td>
                        <td class="px-6 py-4 border-b"><?php echo $row['nim']; ?></td>
                        <td class="px-6 py-4 border-b"><?php echo $row['prodi']; ?></td>
                        <td class="px-6 py-4 border-b"><?php echo $row['jurusan']; ?></td>
                        <td class="px-6 py-4 border-b"><?php echo $row['no_hp']; ?></td>
                        <td class="px-6 py-4 border-b">
                        <?php
                            $filePath = 'uploads/signatures/' . $row['nim'] . '.png'; // Path ke file gambar
                            if (file_exists($filePath)) {
                            echo '<img src="' . $filePath . '" alt="Tanda Tangan" width="100">';
                                } else {
                                    echo 'Tidak Ada Tanda Tangan';
                                }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>