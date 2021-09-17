<?php

// Membuat Object dari Class Model_kelas
$kelas = new Model_kelas();
$GetKelas= $kelas->GET_Where(base64_decode(@$_GET['id']));
$Get = @$GetKelas[0];
?>

<input type="hidden" name="csrf_token" value="<?php echo CreateCSRF(); ?>" />
<table border="1">
    <input type="hidden" name="id_kelas" value="<?= base64_encode(@$Get['id_kelas']); ?>">
    <tr>
        <td>Kelas</td>
        <td><input type="text" name="nama_kelas" value="<?= @$Get['nama_kelas']; ?>"></td>
    </tr>
    <tr>
        <td>Kompetensi Keahlian</td>
        <td>
            <select name="kompetensi_keahlian">
                <option value="RPL">Rekasaya Perangkat Lunak</option>
                <option value="TKJ">Teknik Komputer Jaringan</option>
            </select>
        </td>
    </tr>
    <tr>
    <tr>
        <td colspan="2" align="right">
            <input type="submit" name="proses" value="✔ Create">

            <a href="<?= url('kelas/index'); ?>"><input type="button" name="cancel" value="✖ Cancel"></a>
        </td>
    </tr>
</table>