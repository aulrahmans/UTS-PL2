<?php
// Membuat Object dari Class Model_petugas
$petugasModel = new Model_petugas();
$GetPetugas = $petugasModel->GET();

// untuk mengecek di object $petugas ada berapa banyak Property
?>


<h3>Table Petugas</h3>
<h3><a href="<?= url('petugas/create'); ?>">+ Add Data</a></h3>

<table border="1">
    <tr>
        <th>No</th>
        <th>Username</th>
        <th>Password</th>
        <th>Nama Petugas</th>
        <th>Level</th>
        <th>Tools</th>
    </tr>

    <?php
    // Decision validation variabel
    if (isset($GetPetugas)) {
        foreach ($GetPetugas as $key => $value) {
    ?>
            <tr>
                <td><?php echo $key + 1; ?>.</td>
                <td><?php echo $value['username']; ?></td>
                <td><?php echo $value['password']; ?></td>
                <td><?php echo $value['nama_petugas']; ?></td>
                <td><?php echo $value['level']; ?></td>
                <td>
                    <a href="<?= url('petugas/edit?id=' . base64_encode($value['id_petugas'])); ?>">View</a>
                    &nbsp;|&nbsp;
                    <a href="<?= url('petugas/delete?id=' . base64_encode($value['id_petugas'])); ?>" onclick="notificationBeforeDelete(event, this)">Delete</a>
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