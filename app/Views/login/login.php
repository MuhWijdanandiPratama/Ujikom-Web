<?= $this->extend('layout/template');?>
<?= $this->section('content');?>

<h2 class="my-3 text-center">Toko LARIS</h2>
<div class="row">
  <div class="col-sm-4 offset-md-2">
    <div class="bg-white border rounded shadow-sm p-4 h-100">
      <h4 class="mb-3">Login</h4>
        <?php if (session()->getFLashdata('error')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFLashdata('error'); ?>
            </div>
        <?php endif; ?>
        <form action="<?= base_url();?>/login/cek" method="post">
          <div class="form-group">
            <label for="username">Username atau Email</label>
            <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '';?>" id="username" name="username" autofocus>
            <div class="invalid-feedback">
              <?= $validation->getError('username');?>
            </div>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : '';?>" id="password" name="password">
            <div class="invalid-feedback">
              <?= $validation->getError('password');?>
            </div>
          </div>
          <button type="submit" class="btn btn-success">Masuk</button>
      </form>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="bg-white border rounded shadow-sm p-4 h-100">
      <h4 class="mb-3">Register</h4>
      <p class="font-weight-normal my-1">Belum punya akun?</p>
      <p class="font-weight-normal">Daftar Sekarang!</p>
      <a href="<?= base_url();?>/login/register_pembeli" class="btn btn-success btn-block">Pembeli</a>
      <p class="font-weight-normal text-center my-1">atau</p>
      <a href="<?= base_url();?>/login/register_supplier" class="btn btn-success btn-block">Supplier</a>
    </div>
  </div>
</div>

<?= $this->endSection();?>
