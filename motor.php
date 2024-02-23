<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rental Motor Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container row p-5">
        <div class="col">
            <img src="assets/images/new-cars-model/beat.png" class="img-thumbnail" alt="...">
        </div>

        <div class="col">
            <form method="POST">
                <div>
                    <label>NIK</label> <br>
                    <input name="nik" type="text" class="form-control" placeholder="Masukkan NIK">
                </div>
                <div>
                    <label>Nama</label> <br>
                    <input name="nama" type="text" class="form-control" placeholder="Masukkan nama">
                </div>
                <div>
                    <label>Alamat</label> <br>
                    <input name="alamat" type="text" class="form-control" placeholder="Masukkan alamat">
                </div>
                <div>
                    <label>Hari Sewa</label> <br>
                    <input type="hari" class="form-control" name="jumlahHari" placeholder="Jumlah Hari Sewa" aria-label="jumlahHari" aria-describedby="button-addon2">
                </div>
                <div class="col-12 mt-3">
                    <button class="btn btn-primary" type=" submit1" name="submit1" id="button-addon2">Hitung Diskon</button>
                </div>
            </form>

            <?php
            // Fungsi untuk menghitung diskon berdasarkan jumlah hari sewa
            function Setelahdiskon($jumlahHari, $tarifPerHari)
            {
                $diskon = 0;

                if ($jumlahHari >= 7) {
                    $diskon = 15;
                } elseif ($jumlahHari >= 5) {
                    $diskon = 10;
                } elseif ($jumlahHari >= 3) {
                    $diskon = 7;
                }

                // Menghitung total tarif sebelum diskon
                $totalSebelumDiskon = $jumlahHari * $tarifPerHari;

                // Menghitung nilai diskon
                $nilaiDiskon = ($totalSebelumDiskon * $diskon) / 100;

                // Menghitung total tarif setelah diskon
                $totalSetelahDiskon = $totalSebelumDiskon - $nilaiDiskon;

                return array(
                    'totalSebelumDiskon' => $totalSebelumDiskon,
                    'diskon' => $diskon,
                    'nilaiDiskon' => $nilaiDiskon,
                    'totalSetelahDiskon' => $totalSetelahDiskon
                );
            }

            // Memeriksa apakah form telah disubmit
            if (isset($_POST['submit1'])) {
                $nik = $_POST['nik'];
                $nama = $_POST['nama'];
                $alamat = $_POST['alamat'];
                $jumlahHari = $_POST['jumlahHari'];
                $tarifPerHari = 70000; // Misalnya, tarif sewa per hari Rp 70.000

                $hasilDiskon = Setelahdiskon($jumlahHari, $tarifPerHari);

                echo "NIK: " . $nik . " <br>";
                echo "Nama: " . $nama . " <br>";
                echo "Alamat: " . $alamat . " <br>";
                echo "<strong>Hasil Perhitungan Diskon:</strong><br>";
                echo "Jumlah Hari Sewa: " . $jumlahHari . " hari <br>";
                echo "Tarif Per Hari: Rp " . number_format($tarifPerHari) . "<br>";
                echo "Total Sebelum Diskon: Rp " . number_format($hasilDiskon['totalSebelumDiskon']) . "<br>";
                echo "Diskon: " . $hasilDiskon['diskon'] . "%<br>";
                echo "Nilai Diskon: Rp " . number_format($hasilDiskon['nilaiDiskon']) . "<br>";
                echo "Total Setelah Diskon: Rp " . number_format($hasilDiskon['totalSetelahDiskon']) . "<br>";
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>