<?php
// Membuat Object dari Class Model_pembayaran
$pembayaranModel = new Model_pembayaran();
$GetPembayaran = $pembayaranModel->GET();

// untuk mengecek di object $spp ada berapa banyak Property
?>


<h3>Table Pembayaran</h3>
<h3><a href="<?= url('pembayaran/create'); ?>">+ Add Data</a></h3>

<table border="1">
    <tr>
        <th>No</th>
        <th>NISN</th>
        <th>Nama Siswa</th>
        <th> SPP</th>
        <th>Jumlah Bayar</th>
        <th>Tanggal Bayar</th>
        <th>Petugas</th>
        <th>Tools</th>
    </tr>

    <?php
    // Decision validation variabel
    if (isset($GetPembayaran)) {
        foreach ($GetPembayaran as $key => $value) {
    ?>
            <tr>
                <td><?php echo $key + 1; ?>.</td>
                <td><?php echo $value['nisn']; ?></td>
                <td><?php echo $value['nama']; ?></td>
                <td><?php echo $value['tahun'] . ' - Rp ' . $value['nominal']; ?></td>
                <td>Rp <?php echo $value['jumlah_bayar']; ?></td>
                <td><?php echo $value['tgl_bayar'] . ' ' .$value['bulan_bayar'] .' '. $value['tahun_dibayar']; ?></td>
                          
                <td><?php echo $value['nama_petugas']; ?></td>
                <td>
                    <a href="<?= url('pembayaran/edit?id=' . base64_encode($value['id_pembayaran'])); ?>">View</a>
                    &nbsp;|&nbsp;
                    <a href="<?= url('pembayaran/delete?id=' . base64_encode($value['id_pembayaran'])); ?>" onclick="notificationBeforeDelete(event, this)">Delete</a>
                </td>
            </tr>
    <?php
        }
    }
    ?>
</table>
<form action="" id="delete-form" method="post">
    <input type="hidden" name="csrf_token" value="<?php echo CreateCSRF(); ?>" />
</form>

<script>
    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            const deleteForm = document.getElementById('delete-form');

            // isi nilai tag action pada form delete dengan nilai url pada tag <a href> (link delete)
            deleteForm.setAttribute('action', el.getAttribute('href'));
            // submit form delete
            deleteForm.submit();
        }
    }
</script>