<?php
// Inisialisasi variabel untuk menyimpan data form dan pesan error/sukses
$nama = $email = $tanggal_kunjungan = $tujuan_kunjungan = $komentar = "";
$namaErr = $emailErr = $tanggalErr = $tujuanErr = "";
$pesan_sukses = "";

// Cek jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi Nama
    if (empty($_POST["nama"])) {
        $namaErr = "Nama wajib diisi";
    } else {
        $nama = test_input($_POST["nama"]);
        // Cek jika nama hanya mengandung huruf dan spasi
        if (!preg_match("/^[a-zA-Z-' ]*$/", $nama)) {
            $namaErr = "Hanya huruf dan spasi yang diperbolehkan";
        }
    }

    // Validasi Email
    if (empty($_POST["email"])) {
        $emailErr = "Email wajib diisi";
    } else {
        $email = test_input($_POST["email"]);
        // Cek format email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format email tidak valid";
        }
    }

    // Validasi Tanggal Kunjungan
    if (empty($_POST["tanggal_kunjungan"])) {
        $tanggalErr = "Tanggal kunjungan wajib diisi";
    } else {
        $tanggal_kunjungan = test_input($_POST["tanggal_kunjungan"]);
    }

    // Validasi Tujuan Kunjungan
    if (empty($_POST["tujuan_kunjungan"])) {
        $tujuanErr = "Tujuan kunjungan wajib dipilih";
    } else {
        $tujuan_kunjungan = test_input($_POST["tujuan_kunjungan"]);
    }

    // Komentar (opsional)
    $komentar = test_input($_POST["komentar"]);

    // Jika tidak ada error, proses data (misalnya simpan ke database atau kirim email)
    if (empty($namaErr) && empty($emailErr) && empty($tanggalErr) && empty($tujuanErr)) {
        // Di sini Anda bisa menambahkan logika untuk menyimpan data
        // Contoh: menyimpan ke file teks (sangat sederhana, tidak direkomendasikan untuk produksi)
        // $data_pengunjung = "Nama: $nama\nEmail: $email\nTanggal: $tanggal_kunjungan\nTujuan: $tujuan_kunjungan\nKomentar: $komentar\n-----------------\n";
        // file_put_contents("data_pengunjung.txt", $data_pengunjung, FILE_APPEND);

        $pesan_sukses = "Terima kasih! Data kunjungan Anda telah berhasil dikirim.";
        // Kosongkan field setelah submit berhasil
        $nama = $email = $tanggal_kunjungan = $tujuan_kunjungan = $komentar = "";
    }
}

// Fungsi untuk membersihkan input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pengunjung Perpustakaan</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Link ke Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #EAF2F8; /* Warna latar belakang cream-blue */
            padding-top: 20px;
            padding-bottom: 40px;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            max-width: 700px; /* Batasi lebar container */
        }
        .btn-home {
            margin-bottom: 20px;
        }
        .page-header {
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 10px;
            margin-bottom: 30px;
        }
        .page-header h1 span {
            color: #0d6efd;
        }
        .form-label {
            font-weight: 500;
        }
        .form-control:focus, .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        .error-message {
            color: #dc3545; /* Warna danger Bootstrap */
            font-size: 0.875em;
        }
        .success-message {
            color: #198754; /* Warna success Bootstrap */
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-start mb-4">
            <a href="../index.html" class="btn btn-outline-primary btn-home d-flex align-items-center">
                <i data-feather="arrow-left-circle" class="me-2"></i>
                Kembali ke Home
            </a>
        </div>

        <div class="page-header text-center">
            <h1 class="display-5 fw-bold">Formulir <span>Pengunjung</span></h1>
            <p class="lead">Silakan isi data kunjungan Anda di bawah ini.</p>
        </div>

        <?php if (!empty($pesan_sukses)): ?>
            <div class="alert alert-success text-center" role="alert">
                <?php echo $pesan_sukses; ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control <?php echo (!empty($namaErr)) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?php echo $nama; ?>" required>
                <?php if (!empty($namaErr)): ?>
                    <div class="invalid-feedback error-message"><?php echo $namaErr; ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" class="form-control <?php echo (!empty($emailErr)) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?php echo $email; ?>" required>
                 <?php if (!empty($emailErr)): ?>
                    <div class="invalid-feedback error-message"><?php echo $emailErr; ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan</label>
                <input type="date" class="form-control <?php echo (!empty($tanggalErr)) ? 'is-invalid' : ''; ?>" id="tanggal_kunjungan" name="tanggal_kunjungan" value="<?php echo $tanggal_kunjungan; ?>" required>
                <?php if (!empty($tanggalErr)): ?>
                    <div class="invalid-feedback error-message"><?php echo $tanggalErr; ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="tujuan_kunjungan" class="form-label">Tujuan Kunjungan</label>
                <select class="form-select <?php echo (!empty($tujuanErr)) ? 'is-invalid' : ''; ?>" id="tujuan_kunjungan" name="tujuan_kunjungan" required>
                    <option value="" <?php if (empty($tujuan_kunjungan)) echo "selected"; ?>>-- Pilih Tujuan --</option>
                    <option value="Membaca di Tempat" <?php if ($tujuan_kunjungan == "Membaca di Tempat") echo "selected"; ?>>Membaca di Tempat</option>
                    <option value="Meminjam Buku" <?php if ($tujuan_kunjungan == "Meminjam Buku") echo "selected"; ?>>Meminjam Buku</option>
                    <option value="Mengembalikan Buku" <?php if ($tujuan_kunjungan == "Mengembalikan Buku") echo "selected"; ?>>Mengembalikan Buku</option>
                    <option value="Riset/Penelitian" <?php if ($tujuan_kunjungan == "Riset/Penelitian") echo "selected"; ?>>Riset/Penelitian</option>
                    <option value="Diskusi/Belajar Kelompok" <?php if ($tujuan_kunjungan == "Diskusi/Belajar Kelompok") echo "selected"; ?>>Diskusi/Belajar Kelompok</option>
                    <option value="Lainnya" <?php if ($tujuan_kunjungan == "Lainnya") echo "selected"; ?>>Lainnya</option>
                </select>
                <?php if (!empty($tujuanErr)): ?>
                    <div class="invalid-feedback error-message"><?php echo $tujuanErr; ?></div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="komentar" class="form-label">Komentar atau Saran (Opsional)</label>
                <textarea class="form-control" id="komentar" name="komentar" rows="4"><?php echo $komentar; ?></textarea>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i data-feather="send" class="me-2"></i>Kirim Data Kunjungan
                </button>
            </div>
        </form>
    </div>

    <script>
        feather.replace(); // Panggil Feather Icons
    </script>
    <!-- Optional: Link ke Bootstrap JS Bundle (jika diperlukan untuk komponen JS Bootstrap lainnya) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>