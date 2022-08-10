<?= $this->extend('layout/template');?>
<?= $this->section('content');?>

<h2 class="my-3 text-center">Register Supplier</h2>
<?php if (session()->getFLashdata('error')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= session()->getFLashdata('error'); ?>
    </div>
<?php endif; ?>
<div class="row">
  <div class="col-sm-6 offset-md-3">
    <div class="bg-white border rounded shadow-sm p-4 h-100">
      <form action="<?= base_url();?>/login/register_cek_supplier" method="post">
        <?= csrf_field();?>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : '';?>" id="username" name="username" autofocus value="<?= old('username');?>">
          <div class="invalid-feedback">
            <?= $validation->getError('username');?>
          </div>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '';?>" id="email" name="email" value="<?= old('email');?>">
          <div class="invalid-feedback">
            <?= $validation->getError('email');?>
          </div>
        </div>
        <div class="form-row">
          <div class="col">
            <div class="form-group">
              <label for="password1">Password</label>
              <input type="password" class="form-control <?= ($validation->hasError('password1')) ? 'is-invalid' : '';?>" id="password1" name="password1">
              <div class="invalid-feedback">
                <?= $validation->getError('password1');?>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="password2">Ulangi Password</label>
              <input type="password" class="form-control <?= ($validation->hasError('password2')) ? 'is-invalid' : '';?>" id="password2" name="password2">
              <div class="invalid-feedback">
                <?= $validation->getError('password2');?>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-success">Daftar</button>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection();?>
