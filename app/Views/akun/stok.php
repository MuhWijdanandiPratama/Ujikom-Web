<?= $this->extend('layout/template');?>
<?= $this->section('content');?>

<h2 class="my-3 text-center">Akun</h2>
<div class="row">
  <?= $this->include('layout/menu_akun');?>
  <div class="col-sm-9">
    <div class="bg-white border rounded shadow-sm p-4 h-100">
      <div class="d-flex justify-content-between">
        <h4>Stok Produk</h4>
      </div>
      <?php if (session()->getFLashdata('pesan')) : ?>
          <div class="alert alert-success mt-2" role="alert">
              <?= session()->getFLashdata('pesan'); ?>
          </div>
      <?php endif; ?>
      <div class="table-responsive mt-3">
        <table class="table table-striped" id="tabel">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama</th>
              <th scope="col">Harga</th>
              <th scope="col">Stok</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; foreach ($produk as $p) : ?>
              <?php if($p['id_supplier']==session('id_user')) :;?>
                <tr>
                  <th scope="row"><?= $i++;?>.</th>
                  <td><?= $p['nama_produk']; ?></td>
                  <td>Rp <?= number_format($p['harga_produk'],0,',','.'); ?></td>
                  <td><?= ($p['stok']<10) ? '<span class="badge badge-danger">'.$p['stok'].'</span>' : '<span class="badge badge-success">'.$p['stok'].'</span>'; ?></td>
                  <td><a href="<?= base_url();?>/akun/stok_detail/<?= $p['id_produk'];?>" class="btn btn-success btn-sm">Detail</a></td>
                </tr>
              <?php endif;?>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection();?>
