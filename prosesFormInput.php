<?php
  include "conn.php";

  $nama = $_POST['nama'];
  $tinggi = $_POST['tinggi'];
  $pendidikan = $_POST['pendidikan'];
  $toeflscore = $_POST['toeflscore'];
  $berat = $_POST['berat'];
  $pengalaman = $_POST['pengalaman'];

  /* PERHITUNGAN BOBOT TINGGI BADAN */
  if ($tinggi < 150) {
    $bobotTinggi = 60;
  }
  elseif ($tinggi >= 150 && $tinggi < 160) {
    $bobotTinggi = 70;
  }
  elseif ($tinggi >= 160 && $tinggi < 170) {
    $bobotTinggi = 80;
  }
  elseif ($tinggi >= 170 && $tinggi < 179) {
    $bobotTinggi = 85;
  }
  elseif ($tinggi >= 180) {
    $bobotTinggi = 90;
  }
  else {
    $bobotTinggi = 0;
  }

  /* PERHITUNGAN BOBOT TOEFL */
  if ($toeflscore <=299) {
    $bobotToefl = 50;
  }
  elseif ($toeflscore >= 300 && $toeflscore <399) {
    $bobotToefl = 60;
  }
  elseif ($toeflscore >= 400 && $toeflscore <499) {
    $bobotToefl = 70;
  }
  elseif ($toeflscore >= 500 && $toeflscore <599) {
    $bobotToefl = 80;
  }
  elseif ($toeflscore >= 600) {
    $bobotToefl = 90;
  }
  else {
    $bobotToefl = 0;
  }

  /* PERHITUNGAN BOBOT BERAT BADAN */
  if ($berat <= 40) {
    $bobotBerat = 50;
  }
  elseif ($berat >= 41 && $berat < 49) {
    $bobotBerat = 70;
  }
  elseif ($berat >= 50 && $berat < 59) {
    $bobotBerat = 90;
  }
  elseif ($berat >= 60 && $berat <= 70) {
    $bobotBerat = 90;
  }
  elseif ($berat > 70) {
    $bobotBerat = 70;
  }
  else {
    $bobotBerat = 0;
  }

  /* PERHITUNGAN BOBOT PENGALAMAN KERJA */
  if ($pengalaman < 3) {
    $bobotPengalaman = 60;
  }
  elseif ($pengalaman >=3 && $pengalaman <= 6) {
    $bobotPengalaman = 70;
  }
  elseif ($pengalaman >6 && $pengalaman <= 12) {
    $bobotPengalaman = 80;
  }
  elseif ($pengalaman>12 && $pengalaman <= 24) {
    $bobotPengalaman = 85;
  }
  elseif ($pengalaman > 24 && $pengalaman <= 240) {
    $bobotPengalaman = 90;
  }
  else {
    $bobotPengalaman = 0;
  }

  /* TADINYA BUAT TEST DOANG UDAH BISA DI BUKA BLM
  echo "Nama : " . $nama . "<br>";
  echo "Tinggi : " . $bobotTinggi . "<br>";
  echo "Pendidikan : " . $pendidikan . "<br>";
  echo "Kemampuan english : " . $bobotToefl . "<br>";
  echo "Berat badan : " . $bobotBerat . "<br>";
  echo "Pengalaman : " . $bobotPengalaman . "<br>";
  */

  $sql = "
    INSERT INTO kandidat(alternatif, c1, c2, c3, c4, c5)
    VALUES ('$nama', '$bobotTinggi', '$pendidikan', '$bobotToefl', '$bobotBerat', '$bobotPengalaman');
  ";

  if ($conn->query($sql) == TRUE) {
    echo "Alternatif berhasil ditambahkan.";
    header("location:index.php");
  }
  else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
?>
