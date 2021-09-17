<?php
// Membuat Object dari Class Model_siswa
$siswaModel = new Model_siswa();
$GetSiswa = $siswaModel->GET();

// untuk mengecek di object $siswa ada berapa banyak Property
?>


<h3>Table Siswa</h3>
<h3><a href="<?= url('siswa/create'); ?>">+ Add Data</a></h3>

<table border="1">
    <tr>
        <th>No</th>
        <th>NISN</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Alamat</th>
        <th>No. Telepon</th>
        <th>SPP</th>
        <th>Tools</th>
    </tr>

    <?php
    // Decision validation variabel
    if (isset($GetSiswa)) {
        foreach ($GetSiswa as $key => $value) {
    ?>
            <tr>
                <td><?php echo $key + 1; ?>.</td>
                <td><?php echo $value['nisn']; ?></td>
                <td><?php echo $value['nis']; ?></td>
                <td><?php echo $value['nama']; ?></td>
                <td><?php echo $value['nama_kelas'] .'-'. $value['kompetensi_keahlian']; ?></td>
                <td><?php echo $value['alamat']; ?></td>
                <td><?php echo $value['no_telp']; ?></td>
                <td><?php echo $value['id_spp']; ?></td>
                <td>
                    <a href="<?= url('siswa/edit?id=' . base64_encode($value['nisn'])); ?>">View</a>
                    &nbsp;|&nbsp;
                    <a href="<?= url('siswa/delete?id=' . base64_encode($value['nisn'])); ?>" onclick="notificationBeforeDelete(event, this)">Delete</a>
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