<table style="height: 99px; width: 100%; border-collapse: collapse; border-style: hidden;" border="0">
    <tbody>
        <tr style="height: 99px;">
            <td style="width: 23.2943%; height: 99px; text-align: right">
                <img src="<?php echo base_url('/logo.png'); ?>">
            </td>
            <td style="width: 76.7057%; height: 99px;">
                <h2 style="text-align: center;">INVENTARIS SMK PIKA</h2>
                <h3 style="text-align: center;">Informasi Data Barang&nbsp;</h3>
            </td>
        </tr>
    </tbody>
</table>
<hr />

<?php if ($tipe == 1) : ?>
    <p style="text-align: center;"><strong>Data Barang Masuk</strong><br /><strong>pada tanggal <?= date('d-m-Y', strtotime($tanggalAwal)) ?> sampai tanggal <?= date('d-m-Y', strtotime($tanggalAkhir)) ?></strong></p>
    <p style="text-align: center;"><strong>tabel</strong></p>
    <table style="border-collapse: collapse; width: 100%; height: 40px;" border="2">
        <thead class="justify-content-center my-auto">
            <tr style="height: 18px;">
                <th style="width: 7.46309%; height: 56px;">
                    <h5>No.</h5>
                </th>
                <th style="width: 13.8958%; height: 56px;">
                    <h5>ID Transaksi</h5>
                </th>
                <th style="width: 16.6249%; height: 56px;">
                    <h5>Tanggal Masuk</h5>
                </th>
                <th style="width: 20.5235%; height: 56px;">
                    <h5>Nama Barang</h5>
                </th>
                <th style="width: 11.9466%; height: 56px;">
                    <h5>Jumlah barang</h5>
                </th>
                <th style="width: 18.1843%; height: 56px;">
                    <h5>Jumlah Harga</h5>
                </th>
                <th style="width: 11.3617%; height: 56px;">
                    <h5>Ruang</h5>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $totalmasuk = 0;
            $hargamasuk = 0;
            if ($databarang) : ?>
                <?php foreach ($databarang as $i => $rowmasuk) : ?>
                    <tr>
                        <td><?php echo $i + 1 . '.'; ?></td>
                        <td><?php echo $rowmasuk['id_transaksi']; ?></td>
                        <td><?php echo $rowmasuk['tanggal_masuk']; ?></td>
                        <td><?php echo $rowmasuk['nama_barang']; ?></td>
                        <td><?php echo $rowmasuk['jumlah_barang']; ?></td>
                        <td><?php echo "Rp. " . number_format($rowmasuk['jumlah_harga']); ?></td>
                        <td><?php echo $rowmasuk['nama_ruang']; ?></td>
                        <!-- kalkulasi jumlah total dan harga total -->
                        <?php $totalmasuk = $totalmasuk + $rowmasuk['jumlah_barang']; ?>
                        <?php $hargamasuk = $hargamasuk + $rowmasuk['jumlah_harga']; ?>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>TOTAL</td>
                    <td><?= $totalmasuk; ?></td>
                    <td><?= "Rp. " .  number_format($hargamasuk); ?></td>
                    <td></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>
<?php if ($tipe == 2) : ?>
    <p style="text-align: center;"><strong>Data Barang Keluar</strong><br /><strong>pada tanggal <?= date('d-m-Y', strtotime($tanggalAwal)) ?> sampai tanggal <?= date('d-m-Y', strtotime($tanggalAkhir)) ?></strong></p>
    <p style="text-align: center;"><strong>tabel</strong></p>
    <table style="border-collapse: collapse; width: 100%; height: 74px;" border="2">
        <thead>
            <tr style="height: 18px;">
                <th style="width: 7.46309%; height: 56px;">
                    <h5>No.</h5>
                </th>
                <th style="width: 13.8958%; height: 56px;">
                    <h5>ID Transaksi</h5>
                </th>
                <th style="width: 16.6249%; height: 56px;">
                    <h5>Tanggal Keluar</h5>
                </th>
                <th style="width: 20.5235%; height: 56px;">
                    <h5>Nama Barang</h5>
                </th>
                <th style="width: 11.9466%; height: 56px;">
                    <h5>Jumlah barang</h5>
                </th>
                <th style="width: 18.1843%; height: 56px;">
                    <h5>Keterangan</h5>
                </th>
                <th style="width: 11.3617%; height: 56px;">
                    <h5>Ruang</h5>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $totalkeluar = 0;
            if ($databarang) : ?>
                <?php foreach ($databarang as $i => $rowkeluar) : ?>
                    <tr>
                        <td><?php echo $i + 1 . '.'; ?></td>
                        <td><?php echo $rowkeluar['id_transaksi']; ?></td>
                        <td><?php echo $rowkeluar['tanggal_keluar']; ?></td>
                        <td><?php echo $rowkeluar['nama_barang']; ?></td>
                        <td><?php echo $rowkeluar['jumlah_barang']; ?></td>
                        <td><?php echo $rowkeluar['keterangan']; ?></td>
                        <td><?php echo $rowkeluar['nama_ruang']; ?></td>
                        <?php $totalkeluar = $totalkeluar + $rowkeluar['jumlah_barang']; ?>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>TOTAL</td>
                    <td><?= $totalkeluar ?></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>
<?php if ($tipe == 3) : ?>
    <p style="text-align: center;"><strong>Data Barang Total</strong><br /><strong>pada tanggal <?= date('d-m-Y', strtotime($tanggalAwal)) ?> sampai tanggal <?= date('d-m-Y', strtotime($tanggalAkhir)) ?></strong></p>
    <p style="text-align: center;"><strong>tabel</strong></p>
    <table style="border-collapse: collapse; width: 100%; height: 74px" border="2">
        <thead>
            <tr style="height: 18px;">
                <th style="width: 7.46309%; height: 56px;">
                    <h5>No.</h5>
                </th>
                <th style="width: 13.8958%; height: 56px;">
                    <h5>Nama barang</h5>
                </th>
                <th style="width: 16.6249%; height: 56px;">
                    <h5>Nama kategori</h5>
                </th>
                <th style="width: 20.5235%; height: 56px;">
                    <h5>Jumlah</h5>
                </th>
                <th style="width: 11.9466%; height: 56px;">
                    <h5>Nama ruang</h5>
                </th>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $totalselisih = 0;
            if ($databarang) : ?>
                <?php foreach ($databarang as $i => $rowbarang) : ?>
                    <tr>
                        <td><?php echo $i + 1 . '.'; ?></td>
                        <td><?php echo $rowbarang['nama_barang']; ?></td>
                        <td><?php echo $rowbarang['nama_kategori']; ?></td>
                        <td><?php echo $rowbarang['Jumlah']; ?></td>
                        <td><?php echo $rowbarang['nama_ruang']; ?></td>
                        <?php $totalselisih = $totalselisih + $rowbarang['Jumlah']; ?>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td>TOTAL</td>
                    <td><?= $totalselisih ?></td>
                    <td></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php endif; ?>
<script>
    print();
</script>