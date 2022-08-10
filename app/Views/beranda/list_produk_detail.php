<?= $this->extend('layout/template');?>
<?= $this->section('content');?>

<h2 class="my-3 text-center">Detail Produk</h2>
<div class="d-block">
  <div class="card mb-3 mx-auto shadow" style="max-width: 400px;">
    <div class="row no-gutters">
      <div class="col-md-12">
        <div class="card-body text-center">
          <h5 class="card-title"><?= $produk['nama_produk'];?></h5>
          <p class="card-text">Stok : <?= $produk['stok'];?></p>
          <p class="card-text">Harga : Rp <?= number_format($produk['harga_produk'],0,',','.');?></p>
          <p class="card-text">Deskripsi :  <?= $produk['deskripsi_produk'];?></p>
          <?php if(session('role')=='pembeli') :;?>
            <a href="<?= base_url();?>/pesanan/pesan/<?= $produk['id_produk'];?>" class="btn btn-success">BELI</a>
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection();?>
