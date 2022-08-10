<?= $this->extend('layout/template');?>
<?= $this->section('content');?>

<h2 class="my-3 text-center">Akun</h2>
<div class="row">
  <?= $this->include('layout/menu_akun');?>
  <div class="col-sm-9">
    <div class="bg-white border rounded shadow-sm p-4 h-100">
      <h4>Tambah Stok Produk</h4>
      <hr class="my-3">
      <?php if (session()->getFLashdata('error')) : ?>
          <div class="alert alert-danger" role="alert">
              <?= session()->getFLashdata('error'); ?>
          </div>
      <?php endif; ?>
      <h5><?= $produk['nama_produk'];?></h5>
      <form action="<?= base_url();?>/akun/stok_update_act" method="post">
        <?= csrf_field();?>
        <div class="form-group row">
          <label for="stok" class="col-sm-2 col-form-label">Tambah Stok</label>
          <div class="col-sm-10">
            <input type="number" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : '';?>" id="stok" name="stok" value="<?= old('stok');?>" placeholder="Tambah Stok Produk">
            <div class="invalid-feedback">
              <?= $validation->getError('stok');?>
            </div>
          </div>
        </div>
        <input type="hidden" id="id_produk" name="id_produk" value="<?= $produk['id_produk'];?>">
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-success">Tambah</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection();?>
