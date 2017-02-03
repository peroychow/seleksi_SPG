<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Seleksi pemilihan calon SPG</title>
    <style type="text/css">
      @import "css/bulma.css";
    </style>
  </head>
  <body>
    <section class="section">
    <nav class="nav has-shadow">
      <div class="container">
        <div class="nav-left">
          <a class="nav-item"></a>
          <a class="nav-item is-tab is-hidden-mobile" href=index.php>Home</a>
          <a class="nav-item is-tab is-hidden-mobile is-active">Alternatif</a>
        </div>
        <span class="nav-toggle">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </div>
    </nav>

    <center>
      <br>
      <h1 class="title">Simple Additive Weighting Method, Seleksi penerimaan SPG</h1><br>
    </center>
    <section class="section-form">
      <h2 class="subtitle">Tambah alternatif</h2>
      <form class="form" method="POST" action="prosesFormInput.php">
        <label class="label">Nama</label>
        <p class="control">
          <input class="input" name="nama" type="text" placeholder="Nama kandidat">
        </p>

        <label class="label">Tinggi badan</label>
        <p class="control">
          <input class="input" name="tinggi" type="text" placeholder="Range 150-180">
        </p>

        <label class="label">Pendidikan terakhir</label>
        <p class="control">
          <span class="select">
            <select name="pendidikan">
              <option value="75">SMA/SMK</option>
              <option value="80">D1</option>
              <option value="85">D2</option>
              <option value="90">D3</option>
              <option value="95">S1</option>
            </select>
          </span>
        </p>

        <label class="label">Kemampuan bahasa inggris</label>
        <p class="control">
          <input class="input" name="toeflscore" type="text" placeholder="TOEFL Score">
        </p>

        <label class="label">Berat badan</label>
        <p class="control">
          <input class="input" name="berat" type="text" placeholder="Range 40-80kg">
        </p>

        <label class="label">Pengalaman kerja</label>
        <p class="control">
          <input class="input" name="pengalaman" type="text" placeholder="Format bulan, Exm: 12">
        </p>

        <p class="control is-grouped">
          <button class="button is-primary">Submit</button>
        </p>
      </form>

      <hr>
      <h2 class="subtitle">Hapus alternatif</h2>
      <form class="form" method="POST" action="prosesHapusRecord.php">
        <label class="label">Pilih Nama</label>
        <p class="control">
          <span class="select">
            <?php
            include "conn.php";
            $sql = "
              SELECT id_kandidat, alternatif
              FROM kandidat
            ";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
              die("Gagal ambil data : " . mysql_error());
            }
            $select = '<select name="select" class="select">';
            echo $select;
            while ($data = mysqli_fetch_array($result)) {
              echo "
                <option value=".$data[id_kandidat].">" . $data[alternatif] . "</option>"
              ;
            }
            echo "</select>";
            $conn->close();
            ?>
          </span>
          <span>
            <a>&nbsp</a>
          </span>
          <span>
              <button class="button is-danger">Hapus</button>
          </span>
        </p>
      </form>
    </section>
  </section>
  </body>
</html>
