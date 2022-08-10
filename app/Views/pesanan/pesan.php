<?= $this->extend('layout/template');?>
<?= $this->section('content');?>

<h2 class="my-3 text-center">Pesan</h2>
<?php if (session()->getFLashdata('error')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->getFLashdata('error'); ?>
    </div>
<?php endif; ?>
<div class="row">
  <div class="col-sm-6 offset-md-3">
    <div class="bg-white border rounded shadow p-4 h-100">
      <div class="card border-0 mb-5 mx-auto" style="max-width: 400px;">
        <div class="row no-gutters">
          <div class="col-md-12">
            <div class="card-body p-0 text-center">
              <h5 class="card-title"><?= $produk['nama_produk'];?></h5>
              <p class="card-text">Harga : Rp <?= number_format($produk['harga_produk'],0,',','.');?></p>
              <p class="card-text">Deskripsi :  <?= $produk['deskripsi_produk'];?></p>
            </div>
          </div>
        </div>
      </div>
      <form action="<?= base_url();?>/pesanan/pesan_act" method="post">
        <?= csrf_field();?>
        <div class="form-group row">
          <label for="qty" class="col-sm-2 col-form-label mt-n3">Jumlah Pesanan</label>
          <div class="col-sm-10">
            <input type="number" class="form-control <?= ($validation->hasError('qty')) ? 'is-invalid' : '';?>" id="qty" name="qty" value="<?= old('qty');?>" placeholder="Jumlah Pesanan">
            <div class="invalid-feedback">
              <?= $validation->getError('qty');?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="pesan" class="col-sm-2 col-form-label">Pesan</label>
          <div class="col-sm-10">
            <textarea class="form-control <?= ($validation->hasError('pesan')) ? 'is-invalid' : '';?>" id="pesan" rows="3" name="pesan" placeholder="Tulis pesan yang ingin anda sampaikan..."><?= old('pesan');?></textarea>
            <div class="invalid-feedback">
              <?= $validation->getError('pesan');?>
            </div>
          </div>
        </div>
        <input type="hidden" name="id_produk" value="<?= $produk['id_produk'];?>">
        <input type="hidden" name="id_pembeli" value="<?= session('id_user');?>">
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-success">Pesan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection();?>
