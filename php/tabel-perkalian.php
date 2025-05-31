<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Perkalian 10x10</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif; /* Menggunakan font yang sama dengan situs utama */
            background-color: #EAF2F8; /* Warna latar belakang cream-blue */
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table thead th {
            background-color: #0d6efd; /* Warna primer Bootstrap */
            color: white;
        }
        .table tbody th {
            background-color: #cfe2ff; /* Warna primer-subtle Bootstrap */
        }
        .btn-home {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center mb-4">
            <a href="../index.html" class="btn btn-primary btn-home">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill me-2" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0m3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                </svg>
                Kembali ke Home
            </a>
            <h1 class="display-5 fw-bold">Tabel <span style="color: #0d6efd;">Perkalian</span></h1>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center table-striped">
                <thead>
                    <tr>
                        <th scope="col">×</th>
                        <?php for ($i = 1; $i <= 10; $i++): ?>
                            <th scope="col"><?php echo $i; ?></th>
                        <?php endfor; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 1; $i <= 10; $i++): ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <?php for ($j = 1; $j <= 10; $j++): ?>
                                <td><?php echo $i * $j; ?></td>
                            <?php endfor; ?>
                        </tr>
                    <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Optional: Link ke Bootstrap JS Bundle (jika diperlukan untuk komponen JS Bootstrap lainnya) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>