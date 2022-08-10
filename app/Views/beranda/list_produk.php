<?= $this->extend('layout/template');?>
<?= $this->section('content');?>

<h2 class="my-3 text-center">Produk Kami</h2>
<form action="<?= base_url();?>/beranda/index" method="post">
  <div class="form-row">
    <div class="col-md-6 offset-md-3">
      <div class="input-group shadow-sm">
      <input type="search" class="form-control" placeholder="Cari produk..." aria-label="Cari produk..." aria-describedby="button-addon2" name="keyword" value="<?= $keyword;?>">
      <div class="input-group-append">
        <button class="btn btn-success" type="submit" id="button-addon2">Cari</button>
      </div>
    </div>
    </div>
  </div>
</form>
<hr class="my-4">
<div class="row row-cols-1 row-cols-md-5">
  <?php foreach($produk as $p):;?>
    <div class="col mb-4">
      <a href="<?= base_url();?>/beranda/produk/<?= $p['id_produk'];?>" class="text-decoration-none text-dark">
        <div class="card shadow-hover text-white bg-success h-100">
          <div class="card-body" style="min-height: 100px;">
            <h5 class="card-title"><?= $p['nama_produk'];?></h5>
            <p class="card-text">Rp <?= number_format($p['harga_produk'],0,',','.');?></p>
          </div>
        </div>
      </a>
    </div>
<?php endforeach;?>
</div>

<?= $this->endSection();?>
