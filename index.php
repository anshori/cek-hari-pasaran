<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- icon -->
  <link rel="icon" href="assets/img/calendar.png" type="image/png" sizes="16x16">
  <title>Cek Hari Pasaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .container {
      margin-top: 50px;
    }
    body {
      background-color: #CCD5AE;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card shadow">
      <div class="card-header">
        <h4 class="my-0">Hari Pasaran</h4>
      </div>
      <div class="card-body">
        <form method="GET">
        <div class="mb-3">
          <label for="tanggal" class="form-label">Masukkan Tanggal</label>
          <input type="date" name="tanggal" id="tanggal" min="1900-01-01" class="form-control">
        </div>
        <div class="row">
          <div class="col text-center">
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-angles-right"></i> cek <i class="fa-solid fa-angles-left"></i></button>
          </div>
          </form>
        </div>
        <div class="row">
          <div class="col text-center" id="result"></div>
        </div>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col text-center">
        <small class="text-secondary">unsorry@2023</small>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <?php 
    if(isset($_GET['tanggal'])) {
      // hari
      $tanggal = $_GET['tanggal'];
      $hari = date('l', strtotime($tanggal));
      $arrHari = array(
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
      );

      $arrBulan = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
      );

      $arrPasaran = array('Pahing', 'Pon', 'Wage', 'Kliwon', 'Legi');
      
      // Sample hari pasaran tanggal 1 januari 1900 adalah 'Pahing'
      $sampleTglJawa = 01;
      $sampleBulanJawa = 01;
      $sampleTahunJawa = 1900;

      $splitTanggal = explode('-', $tanggal);

      $tanggalIndonesia = $splitTanggal[2] . ' ' . $arrBulan[(int)$splitTanggal[1]] . ' ' . $splitTanggal[0];

      $jd1 = gregoriantojd($sampleBulanJawa, $sampleTglJawa, $sampleTahunJawa);
      $jd2 = gregoriantojd($splitTanggal[1], $splitTanggal[2], $splitTanggal[0]);
      $selisih = $jd2 - $jd1;

      // hitung modulus 5 dari selisih harinya
      $mod = $selisih % 5;

      $pasaran = $arrPasaran[$mod];
      
      // value tanggal to input tanggal
      echo "<script>document.getElementById('tanggal').value = '".$tanggal."'</script>";

      // echo javascript DOM
      echo "<script>document.getElementById('result').innerHTML = '<hr>Tanggal: <b>" . $tanggalIndonesia . "</b><br>Hari: <b>" . $arrHari[$hari] . "</b><br>Pasaran: <b>" . $pasaran . "</b>'</script>";
    }
  ?>
</body>
</html>