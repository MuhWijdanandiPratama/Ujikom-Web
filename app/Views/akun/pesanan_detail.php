<?= $this->extend('layout/template');?>
<?= $this->section('content');?>

<h2 class="my-3 text-center">Akun</h2>
<div class="row">
  <?= $this->include('layout/menu_akun');?>
  <div class="col-sm-9">
    <div class="bg-white border rounded shadow-sm p-4 h-100">
      <h4>Detail Pesanan</h4>
      <hr class="my-3">
      <h5><?= $pesanan['nama_produk'];?></h5>
      <div class="row">
        <div class="col-3 mr-2">
          <p class="card-text">Pembeli</p>
          <p class="card-text">Qty</p>
          <p class="card-text">Total Harga</p>
          <p class="card-text">Status</p>
          <p class="card-text">Deskirpsi Produk</p>
          <p class="card-text">Pesan</p>
        </div>
        <div class="col-3">
          <p class="card-text">: <?= $pesanan['username'];?></p>
          <p class="card-text">: <?= $pesanan['qty'];?></p>
          <p class="card-text">: Rp <?= number_format(($pesanan['harga_produk']*$pesanan['qty']),0,',','.');?></p>
          <p class="card-text">: <?= ($pesanan['id_pembayaran']) ? '<span class="badge badge-success">Dibayar</span>' : '<span class="badge badge-danger">Belum Dibayar</span>';;?></p>
          <p class="card-text">: <?= $pesanan['deskripsi_produk'];?></p>
          <p class="card-text">: <?= $pesanan['pesan'];?></p>
        </div>
      </div>
      <div class="mt-4">
        <a href="<?= base_url();?>/akun/pesanan" class="btn btn-primary">Kembali</a>
        <?php if($pesanan['id_pembayaran']==null&&$pesanan['username']==session('username')) :;?>
          <a href="<?= base_url();?>/pesanan/pembayaran/<?= $pesanan['id_pesanan'];?>" class="btn btn-danger">Bayar</a>
        <?php endif;?>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection();?>
