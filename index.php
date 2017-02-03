<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Seleksi pemilihan calon SPGL</title>
    <style type="text/css">
      @import "css/bulma.css";
    </style>
  </head>
  <body>
    <nav class="nav has-shadow">
      <div class="container">
        <div class="nav-left">
          <a class="nav-item">
            <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma logo">
          </a>
          <a class="nav-item is-tab is-hidden-mobile is-active">Home</a>
          <a class="nav-item is-tab is-hidden-mobile">Alternatif</a>
        <!--
          <a class="nav-item is-tab is-hidden-mobile">Pricing</a>
          <a class="nav-item is-tab is-hidden-mobile">About</a>
        -->
        </div>
        <span class="nav-toggle">
          <span></span>
          <span></span>
          <span></span>
        </span>
        <div class="nav-right nav-menu">
          <a class="nav-item is-tab is-hidden-tablet is-active">Home</a>
          <a class="nav-item is-tab is-hidden-tablet">Features</a>
          <a class="nav-item is-tab is-hidden-tablet">Pricing</a>
          <a class="nav-item is-tab is-hidden-tablet">About</a>
          <a class="nav-item is-tab">
            <figure class="image is-16x16" style="margin-right: 8px;">
              <img src="http://bulma.io/images/jgthms.png">
            </figure>
            Profile
          </a>
          <a class="nav-item is-tab">Log out</a>
        </div>
      </div>
    </nav>
    <center>
      <br>
      <h1 class="title">Simple Additive Weighting Method, Seleksi penerimaan SPG</h1><br>
    </center>
    <article class="message is-info">
      <div class="message-header">
        <p>Info</p>
      </div>
      <div class="message-body">
        <p>C1 = Tinggi badan (Range 150-180) -> <i>benefit</i></p>
        <p>C2 = Grade pendidikan (SMA/SMK, D1, D2, D3, S1) -> <i>benefit</i></p>
        <p>C3 = Kemampuan bahasa inggris (Nilai TOEFL) -> <i>benefit</i></p>
        <p>C4 = Berat badan (Range 40-80) -> <i>cost</i></p>
        <p>C5 = Pengalaman kerja (Dalam hitungan bulan) -> <i>benefit</i></p>
      </div>
    </article>
    <h2 class="subtitle">NILAI AWAL</h2>
    <table class="table">
    <thead>
      <tr>
        <th>Alternatif</th>
        <th>C1</th>
        <th>C2</th>
        <th>C3</th>
        <th>C4</th>
        <th>C5</th>
      </tr>
    </thead>
    <tbody>
    <?php
          include "conn.php";
          $sql = "
            SELECT alternatif, c1, c2, c3, c4, c5
            FROM kandidat
          ";
          $result = mysqli_query($conn, $sql);
          if (!$result) {
            die("Gagal ambil data : " . mysql_error());
          }
          while ($data = mysqli_fetch_array($result)) {
            echo "
            <tr>
              <td>" . $data['alternatif'] . "</td>
              <td>" . $data['c1'] . "</td>
              <td>" . $data['c2'] . "</td>
              <td>" . $data['c3'] . "</td>
              <td>" . $data['c4'] . "</td>
              <td>" . $data['c5'] . "</td>
            </tr>
            ";
          }
          $conn->close();
    ?>
    </tbody>
  </table>
  <h2 class="subtitle">NORMALISASI MATRIKS</h2>
  <table class="table">
  <thead>
    <tr>
      <th>Alternatif</th>
      <th>C1</th>
      <th>C2</th>
      <th>C3</th>
      <th>C4</th>
      <th>C5</th>
    </tr>
  </thead>
  <tbody>
  <?php
        include "conn.php";
        /*$sql = "
          SELECT c1
          FROM kandidat
        ";*/
        $getMaxC1 = "
          SELECT MAX(c1)
          FROM kandidat
        ";
        $getMaxC2 = "
          SELECT MAX(c2)
          FROM kandidat
        ";
        $getMaxC3 = "
          SELECT MAX(c3)
          FROM kandidat
        ";
        $getMaxC4 = "
          SELECT MAX(c4)
          FROM kandidat
        ";
        $getMaxC5 = "
          SELECT MAX(c5)
          FROM kandidat
        ";
        //$result = mysqli_query($conn, $sql);
        $resultMaxC1 = mysqli_query($conn, $getMaxC1);
        $resultMaxC2 = mysqli_query($conn, $getMaxC2);
        $resultMaxC3 = mysqli_query($conn, $getMaxC3);
        $resultMaxC4 = mysqli_query($conn, $getMaxC4);
        $resultMaxC5 = mysqli_query($conn, $getMaxC5);
        if (!$resultMaxC1) {
          die("Gagal ambil data : " . mysql_error());
        }

        $row = mysqli_fetch_row($resultMaxC1);
        $maximumC1 = $row[0];
        $row = mysqli_fetch_row($resultMaxC2);
        $maximumC2 = $row[0];
        $row = mysqli_fetch_row($resultMaxC3);
        $maximumC3 = $row[0];
        $row = mysqli_fetch_row($resultMaxC4);
        $maximumC4 = $row[0];
        $row = mysqli_fetch_row($resultMaxC5);
        $maximumC5 = $row[0];

        echo "Nilai maximum dari Criteria 1 - 5 = " . $maximumC1 ."  - ". $maximumC2 ." - ". $maximumC3 ." - ". $maximumC4 ." - ". $maximumC5;
        /*while ($data = mysqli_fetch_array($result)) {
          $normalisasi_c1 = $data['c1']/2;
          echo "
            <p>" . $normalisasi_c1 . "</p>
          ";
        }*/
        $conn->close();
  ?>
  </tbody>
  </table>

  </body>
</html>
