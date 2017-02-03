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
      <form class="form">
        <label class="label">Name</label>
        <p class="control">
          <input class="input" type="text" placeholder="Nama kandidat">
        </p>

        <label class="label">Tinggi badan</label>
        <p class="control">
          <input class="input" type="text" placeholder="Range 150-180">
        </p>

        <label class="label">Pendidikan terakhir</label>
        <p class="control">
          <span class="select">
            <select>
              <option>SMA/SMK</option>
              <option>D1</option>
              <option>D2</option>
              <option>D3</option>
              <option>S1</option>
            </select>
          </span>
        </p>

        <label class="label">Kemampuan bahasa inggris</label>
        <p class="control">
          <input class="input" type="text" placeholder="TOEFL Score">
        </p>

        <label class="label">Berat badan</label>
        <p class="control">
          <input class="input" type="text" placeholder="Range 40-80kg">
        </p>

        <label class="label">Pengalaman kerja</label>
        <p class="control">
          <input class="input" type="text" placeholder="Format bulan, Exm: 12">
        </p>

        <p class="control is-grouped">
          <button class="button is-primary">Submit</button>
        </p>
      </form>
    </section>
  </section>
  </body>
</html>
