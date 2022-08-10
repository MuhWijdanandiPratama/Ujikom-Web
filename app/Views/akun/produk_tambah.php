<?= $this->extend('layout/template');?>
<?= $this->section('content');?>

<h2 class="my-3 text-center">Akun</h2>
<div class="row">
  <?= $this->include('layout/menu_akun');?>
  <div class="col-sm-9">
    <div class="bg-white border rounded shadow-sm p-4 h-100">
      <h4>Tambah Produk</h4>
      <hr class="my-3">
      <?php if (session()->getFLashdata('error')) : ?>
          <div class="alert alert-danger" role="alert">
              <?= session()->getFLashdata('error'); ?>
          </div>
      <?php endif; ?>
      <form action="<?= base_url();?>/akun/produk_tambah_act" method="post">
        <?= csrf_field();?>
        <div class="form-group row">
          <label for="nama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
          <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('nama_produk')) ? 'is-invalid' : '';?>" id="nama_produk" name="nama_produk" value="<?= old('nama_produk');?>" autofocus placeholder="Nama Produk">
            <div class="invalid-feedback">
              <?= $validation->getError('nama_produk');?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="harga_produk" class="col-sm-2 col-form-label">Harga Produk</label>
          <div class="col-sm-10">
            <input type="number" class="form-control <?= ($validation->hasError('harga_produk')) ? 'is-invalid' : '';?>" id="harga_produk" name="harga_produk" value="<?= old('harga_produk');?>" placeholder="Harga Produk">
            <div class="invalid-feedback">
              <?= $validation->getError('harga_produk');?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="stok" class="col-sm-2 col-form-label">Stok Produk</label>
          <div class="col-sm-10">
            <input type="number" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : '';?>" id="stok" name="stok" value="<?= old('stok');?>" placeholder="Stok Produk">
            <div class="invalid-feedback">
              <?= $validation->getError('stok');?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="supplier" class="col-sm-2 col-form-label">Supplier</label>
          <div class="col-sm-10">
            <select class="custom-select form-control <?= ($validation->hasError('supplier')) ? 'is-invalid' : '';?>" name="supplier">
              <option class="text-muted">Pilih Supllier</option>
              <?php foreach($supplier as $spl) :;?>
                <option value="<?= $spl['id_user'];?>" <?= ($spl['id_user']==old('supplier')) ? 'selected' : '';?>><?= $spl['username'];?></option>
              <?php endforeach;?>
            </select>
            <div class="invalid-feedback">
              <?= $validation->getError('supplier');?>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="deskripsi_produk" class="col-sm-2 col-form-label">Deskripsi Produk</label>
          <div class="col-sm-10">
            <textarea class="form-control <?= ($validation->hasError('deskripsi_produk')) ? 'is-invalid' : '';?>" id="deskripsi_produk" rows="3" name="deskripsi_produk" placeholder="Deskripsi Produk"><?= old('deskripsi_produk');?></textarea>
            <div class="invalid-feedback">
              <?= $validation->getError('deskripsi_produk');?>
            </div>
          </div>
        </div>
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
