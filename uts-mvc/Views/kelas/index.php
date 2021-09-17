<?php
// Membuat Object dari Class Model_kelas
$kelasModel = new Model_kelas();
$Getkelas = $kelasModel->GET();

// untuk mengecek di object $spp ada berapa banyak Property
?>


<h3>Table Kelas</h3>
<h3><a href="<?= url('kelas/create'); ?>">+ Add Data</a></h3>

<table border="1">
    <tr>
        <th>No</th>
        <th>Kelas</th>
        <th>Kompetensi Keahlian</th>
        <th>Tools</th>
    </tr>

    <?php
    // Decision validation variabel
    if (isset($Getkelas)) {
        foreach ($Getkelas as $key => $value) {
    ?>
            <tr>
                <td><?php echo $key + 1; ?>.</td>
                <td><?php echo $value['nama_kelas']; ?></td>
                <td><?php echo $value['kompetensi_keahlian']; ?></td>
                <td>
                    <a href="<?= url('kelas/edit?id=' . base64_encode($value['id_kelas'])); ?>">View</a>
                    &nbsp;|&nbsp;
                    <a href="<?= url('kelas/delete?id=' . base64_encode($value['id_kelas'])); ?>" onclick="notificationBeforeDelete(event, this)">Delete</a>
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