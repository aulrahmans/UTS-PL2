<?php
// Membuat Object dari Class Model_spp
$spp = new Model_spp();
$GetSpp = $spp->GET_Where(base64_decode(@$_GET['id']));
$Get = @$GetSpp[0];
?>

<input type="hidden" name="csrf_token" value="<?php echo CreateCSRF(); ?>" />
<table border="1">
    <input type="hidden" name="id_spp" value="<?= base64_encode($Get['id_spp']); ?>">
    <tr>
        <td>Tahun</td>
        <td><input type="number" name="tahun" value="<?= $Get['tahun']; ?>" required></td>
    </tr>
    <tr>
        <td>Nominal</td>
        <td><input type="number" name="nominal" value="<?= $Get['nominal']; ?>" required></td>
    </tr>
    <tr>
        <td colspan="2" align="right">
            <input type="submit" name="proses" value="✔ Create">

            <a href="<?= url('spp/index'); ?>"><input type="button" name="cancel" value="✖ Cancel"></a>
        </td>
    </tr>
</table>