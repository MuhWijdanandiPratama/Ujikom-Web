<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/datatables.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">

  <title>Toko Sepatu LARIS</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-success sticky-top">
    <div class="container">
      <a class="navbar-brand mb-0 h1 logo" href="<?= base_url(); ?>">LARIS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse ml-md-5" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" href="<?= base_url(); ?>">Belanja Produk</a>
        </div>
        <?php if (session('username')) :; ?>
          <div class="navbar-nav">
            <a class="nav-link active" href="<?= base_url(); ?>/akun">Akun</a>
          </div>
        <?php endif; ?>
      </div>
      <?php if (session('username')) :; ?>
        <a href="<?= base_url(); ?>/akun" class="btn btn-light text-success d-md-block d-sm-none" style="background-color: white;"><?= session('username'); ?></a>
      <?php else :; ?>
        <a href="<?= base_url(); ?>/login" class="btn btn-light text-success d-md-block d-sm-none" style="background-color: white;">Login</a>
      <?php endif; ?>
    </div>
  </nav>

  <div style="min-height: 74.4vh;">
    <div class="container">
      <?= $this->renderSection('content'); ?>
    </div>
  </div>

  <div class="footer bg-success">
    <div class="container">
      <div class="row one row-cols-4">
        <div class="desc">
          <div class="col fticon">
            <img class="iconfb" src="<?= base_url()?>/assets/Icon/fb-icon.png" alt="facebook">
            <p class="fb">Facebook</p>
          </div>
          <div class="col fticon">
            <img class="iconig" src="<?= base_url()?>/assets/Icon/ig-icon.png" alt="instagram">
            <p class="ig">Instagram</p>
          </div>
          <div class="col fticon">
            <img class="icontwt" src="<?= base_url()?>/assets/Icon/twitter-icon.png" alt="twitter">
            <p class="twitter">Twitter</p>
          </div>
          <div class="col fticon">
            <img class="iconyt" src="<?= base_url()?>/assets/Icon/youtube-icon.png" alt="youtube">
            <p class="youtube">Youtube</p>
          </div>
        </div>
      </div>
    </div>
    <br><br><br>
    <div class="other">
      <p class="teks"><img class="copirek" src="<?= base_url()?>/assets/Icon/copyright-regular.svg" alt="copyright">Copyright Toko Laris 2022</p>
      <!-- <p class="Privacy">Privacy & Legacy</p>
      <p class="Contact">Contact</p>
      <p class="News">News</p>
      <p class="Carrers">Carrers</p>
      <p class="Location">Copyright</p> -->
    </div>
    <br><br>
  </div>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="<?= base_url(); ?>/assets/js/jquery.slim.min.js"></script>
  <script src="<?= base_url(); ?>/assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>/assets/js/datatables.min.js"></script>
  <script>
    // DataTables
    $(document).ready(function() {
      $(tabel).DataTable({
        responsive: false,
        language: {
          sEmptyTable: "Tidak ada data yang tersedia pada tabel ini",
          sProcessing: "Sedang memproses...",
          sLengthMenu: "Tampilkan _MENU_ data",
          sZeroRecords: "Tidak ditemukan data yang sesuai",
          sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
          sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
          sInfoFiltered: "(disaring dari _MAX_ data keseluruhan)",
          sInfoPostFix: "",
          sSearch: "Cari:",
          sUrl: "",
          oPaginate: {
            sFirst: "Pertama",
            sPrevious: "Sebelumnya",
            sNext: "Selanjutnya",
            sLast: "Terakhir",
          },
          aria: {
            sortAscending: ": aktivasi untuk menyaring kolom secara menaik",
            sortDescending: ": aktivasi untuk menyaring kolom secara menurun",
          },
        },
      });
    });
    // END DataTables
  </script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>