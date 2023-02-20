<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>POS</th>
            <th>SUB POS</th>
            <th>SUB POS</th>
            <th>Kegiatan</th>
            <th>Deskripsi</th>
            <th>Nominal</th>
            <th>Disetujui</th>
        </tr>

    </thead>
    <tbody>
        <?php foreach ($detailajuan as $key) : ?>
            <tr>



                <td>
                    <h4><?php echo $key['nama_pos']; ?></h4>
                </td>
                <td>
                    <h4><?php echo $key['nama_subpos']; ?></h4>
                </td>
                <td>
                    <h4><?php echo $key['nama_subpos2']; ?></h4>
                </td>
                <td>
                    <h4><?php echo $key['kegiatan2']; ?></h4>
                </td>
                <td>
                    <h4><?php echo $key['deskripsi2']; ?></h4>
                </td>

                <td>
                 
                    <h4><?php echo 'Rp.' . number_format(floatval($key['nominal_pengajuan2']), 2, ',', '.'); ?></h4>
                </td>
                <td>
                    <h4><?php echo 'Rp.' . number_format(floatval($key['nominal_persetujuan2']), 2, ',', '.'); ?></h4>
                </td>


            </tr>
        <?php endforeach; ?>

    </tbody>
    <h2></h2>
    <tfoot class="bg-gray">
        <td colspan="5"><b> Total Anggaran diajukan Minggu ke - <?= $ajuan['minggu2']; ?></b></td>
        <td>
            <h4><?php echo "Rp. " . number_format($total['nominal_pengajuan2'], 2, ',', '.'); ?></h4>
        </td>
        <td>
            <h4><?php echo "Rp. " .  number_format($total['nominal_persetujuan2'], 2, ',', '.'); ?></h4>
        </td>
    </tfoot>





</table>