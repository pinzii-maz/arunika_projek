

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen flex items-center justify-center bg-gray-900">
    <div class="absolute top-8 left-8">
        <a href="../index.php" class="flex items-center bg-gray-300 text-gray-800 py-2 px-4 rounded-full shadow-lg hover:bg-gray-400 transition duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H3m0 0l5 5m-5-5l5-5" />
            </svg>
            Kembali
        </a>
    </div>

    <div class="relative w-full max-w-6xl h-5/6 flex bg-white bg-opacity-40 backdrop-blur-lg rounded-lg overflow-hidden shadow-lg">
        <div class="w-1/2 flex flex-col justify-center items-center bg-gray-200 bg-opacity-50 p-8">
            <div class="flex flex-col justify-between bg-gray-800 bg-opacity-50 p-8 h-3/4">
                <div class="flex flex-col justify-start items-start">
                    <h1 class="text-5xl font-bold mb-4">
                        <span class="gradient-text">Buat akun untuk bergabung bersama kami di</span>
                        <span class="text-black">Rujak.</span>
                    </h1>
                </div>
                <p class="text-sm text-gray-300 italic mt-2">*keamanan data kami pastikan akan terprivasi dengan aman</p>
            </div>
        </div>
        <div class="w-1/2 flex flex-col justify-center bg-gray-800 p-8">
            <div class="flex items-center justify-center bg-white rounded-2xl h-12 w-12 mb-6">
                <span class="text-2xl font-bold text-gray-800">L</span>
            </div>
            <h2 class="text-2xl font-semibold text-white mb-2 text-left">Halo, salam kenal</h2>
            <p class="text-sm text-gray-400 mb-2 italic text-left">
                Silahkan lengkapi data berikut untuk membuat akun
            </p>
            <form id="registrationForm" class="w-full max-w-lg" method="POST" action="process_register.php" onsubmit="getSignature()">
                <!-- Step 1 -->
                <div id="step1" class="step">
                    <div class="space-y-4">
                        
                        <input type="text" name="firstName" placeholder="Nama Depan" class="w-full px-4 py-2 rounded-lg border border-gray-500 bg-gray-700 text-white focus:outline-none focus:border-blue-500" required>

                        <input type="text" name="lastName" placeholder="Nama Belakang" class="w-full px-4 py-2 rounded-lg border border-gray-500 bg-gray-700 text-white focus:outline-none focus:border-blue-500" required>

                        <input type="text" name="nim" placeholder="NIM" class="w-full px-4 py-2 rounded-lg border border-gray-500 bg-gray-700 text-white focus:outline-none focus:border-blue-500" required>

                        <input type="text" name="noHp" placeholder="Nomor Handphone" class="w-full px-4 py-2 rounded-lg border border-gray-500 bg-gray-700 text-white focus:outline-none focus:border-blue-500" required>
                    </div>
                    <button type="button" onclick="nextStep()" class="w-full py-2 mt-4 mb-2 rounded-lg bg-gradient-to-r from-gray-300 to-white text-gray-800 font-semibold hover:from-gray-400 hover:to-gray-200 transition duration-200">Selanjutnya</button>
                </div>

                <!-- Step 2 -->
                <div id="step2" class="step hidden">
                    <div class="space-y-4">
                        <input type="text" name="username" placeholder="Username" class="w-full px-4 py-2 rounded-lg border border-gray-500 bg-gray-700 text-white focus:outline-none focus:border-blue-500" required>
                        <input type="text" name="jurusan" placeholder="Jurusan" class="w-full px-4 py-2 rounded-lg border border-gray-500 bg-gray-700 text-white focus:outline-none focus:border-blue-500" required>
                        <input type="text" name="prodi" placeholder="Program Studi" class="w-full px-4 py-2 rounded-lg border border-gray-500 bg-gray-700 text-white focus:outline-none focus:border-blue-500" required>
                        <input type="password" name="password" placeholder="Password" class="w-full px-4 py-2 rounded-lg border border-gray-500 bg-gray-700 text-white focus:outline-none focus:border-blue-500" required>
                        <input type="password" name="confirmPassword" placeholder="Konfirmasi Password" class="w-full px-4 py-2 rounded-lg border border-gray-500 bg-gray-700 text-white focus:outline-none focus:border-blue-500" required>
                    </div>
                    <button type="button" onclick="previousStep()" class="w-full py-2 mt-4 rounded-lg bg-gradient-to-r from-gray-300 to-white text-gray-800 font-semibold hover:from-gray-400 hover:to-gray-200 transition duration-200">Sebelumnya</button>
                    <button type="button" onclick="nextStep()" class="w-full py-2 mt-4 mb-2 rounded-lg bg-gradient-to-r from-gray-300 to-white text-gray-800 font-semibold hover:from-gray-400 hover:to-gray-200 transition duration-200">Selanjutnya</button>
                </div>

                <!-- Step 3 -->
                <div id="step3" class="step hidden">
                    <h2 class="text-gray-400 mb-4">Tanda tangan dibawah ini:</h2>
                    <div class="flex flex-col items-center space-y-4">
                        <canvas id="signatureCanvas" width="500" height="200" class="border border-gray-500"></canvas>
                    </div>
                    <input type="hidden" name="ttd" id="signatureData">
                    <button type="button" onclick="clearCanvas()" class="w-full py-2 mt-4 rounded-lg bg-gradient-to-r from-gray-300 to-white text-gray-800 font-semibold hover:from-gray-400 hover:to-gray-200 transition duration-200">Hapus</button>
                    
                    <button type="button" onclick="previousStep()" class="w-full py-2 mt-4 rounded-lg bg-gradient-to-r from-gray-300 to-white text-gray-800 font-semibold hover:from-gray-400 hover:to-gray-200 transition duration-200">Sebelumnya</button>

                    <button type="submit" class="w-full py-2 mt-4 mb-2 rounded-lg bg-gradient-to-r from-gray-300 to-white text-gray-800 font-semibold hover:from-gray-400 hover:to-gray-200 transition duration-200">Daftar</button>
                </div>
            </form>

            <p class="text-gray-400 text-center">
                Sudah punya akun?
                <a href="login.php" class="text-blue-500 hover:underline">Masuk</a>
            </p>
        </div>
    </div>
    <script src="../js/register.js"></script>
</body>

</html>