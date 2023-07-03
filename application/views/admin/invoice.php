<div class="container-fluid">
    <h4>INvoice Pesanan Produk</h4>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>Id Invoice</th>
            <th>Nama Pesanam</th>
            <th>Alamat pengiriman</th>
            <th>Tanggal Pesanan</th>
            <th>Batas Pembayaran</th>
            <th>aksi</th>
        </tr>
        <?php foreach ($invoice as $inv): ?>
            <tr>
                <td><?php echo $inv->id ?></td>
                <td><?php echo $inv->nama ?></td>
                <td><?php echo $inv->alamat ?></td>
                <td><?php echo $inv->tgl_pesan ?></td>
                <td><?php echo $inv->batas_bayar ?></td>
                <td><?php echo anchor('admin/invoice/detail/'.$inv->id, '<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
            </tr>
            <?php endforeach; ?>
    </table>
</div>