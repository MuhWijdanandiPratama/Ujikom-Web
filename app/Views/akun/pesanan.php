<?= $this->extend('layout/template');?>
<?= $this->section('content');?>

<h2 class="my-3 text-center">Akun</h2>
<div class="row">
  <?= $this->include('layout/menu_akun');?>
  <div class="col-sm-9">
    <div class="bg-white border rounded shadow-sm p-4 h-100">
      <div class="d-flex justify-content-between">
        <h4>Pesanan</h4>
      </div>
      <div class="table-responsive mt-3">
        <table class="table table-striped" id="tabel">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Nama Produk</th>
              <th scope="col">Pembeli</th>
              <th scope="col">Status</th>
              <th scope="col">Tanggal Pemesanan</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if(session('role')=='admin') : ?>
              <?php $i=1; foreach ($pesanan as $p) : ?>
                <tr>
                  <th scope="row"><?= $i++;?>.</th>
                  <td><?= $p['nama_produk']; ?></td>
                  <td><?= $p['username']; ?></td>
                  <td><?= ($p['id_pembayaran']) ? '<span class="badge badge-success">Dibayar</span>' : '<span class="badge badge-danger">Belum Dibayar</span>'; ?></td>
                  <td><?= $p['tgl_pesanan']; ?></td>
                  <td><a href="<?= base_url();?>/akun/pesanan_detail/<?= $p['id_pesanan'];?>" class="btn btn-success btn-sm">Detail</a></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ;?>
              <?php $i=1; foreach ($pesanan as $p) : ?>
                <?php if($p['username']==session('username')) :;?>
                  <tr>
                    <th scope="row"><?= $i++;?>.</th>
                    <td><?= $p['nama_produk']; ?></td>
                    <td><?= $p['username']; ?></td>
                    <td><?= ($p['id_pembayaran']) ? '<span class="badge badge-success">Dibayar</span>' : '<span class="badge badge-danger">Belum Dibayar</span>'; ?></td>
                    <td><?= $p['tgl_pesanan']; ?></td>
                    <td><a href="<?= base_url();?>/akun/pesanan_detail/<?= $p['id_pesanan'];?>" class="btn btn-success btn-sm">Detail</a></td>
                  </tr>
                <?php endif;?>
              <?php endforeach; ?>
            <?php endif;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection();?>
