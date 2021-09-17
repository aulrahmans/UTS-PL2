<?php
// Membuat Object dari Class Model_spp
$sppModel = new Model_spp();
$GetSpp = $sppModel->GET();

// untuk mengecek di object $spp ada berapa banyak Property
?>


<h3>Table SPP</h3>
<h3><a href="<?= url('spp/create'); ?>">+ Add Data</a></h3>

<table border="1">
    <tr>
        <th>No</th>
        <th>Tahun</th>
        <th>Nominal</th>
        <th>Tools</th>
    </tr>

    <?php
    // Decision validation variabel
    if (isset($GetSpp)) {
        foreach ($GetSpp as $key => $value) {
    ?>
            <tr>
                <td><?php echo $key + 1; ?>.</td>
                <td><?php echo $value['tahun']; ?></td>
                <td>Rp <?php echo $value['nominal']; ?></td>
                <td>
                    <a href="<?= url('spp/edit?id=' . base64_encode($value['id_spp'])); ?>">View</a>
                    &nbsp;|&nbsp;
                    <a href="<?= url('spp/delete?id=' . base64_encode($value['id_spp'])); ?>" onclick="notificationBeforeDelete(event, this)">Delete</a>
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