<?php
// Membuat Object dari Class Model_petugas
$petugas = new Model_petugas();
$GetPetugas = $petugas->GET_Where(base64_decode(@$_GET['id']));
$Get = @$GetPetugas[0];
?>

<input type="hidden" name="csrf_token" value="<?php echo CreateCSRF(); ?>" />
<table border="1">
    <input type="hidden" name="id_petugas" value="<?= base64_encode($Get['id_petugas']); ?>">
    <tr>
        <td>Username</td>
        <td><input type="text" name="username" value="<?= @$Get['username']; ?>" required></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="password" name="password" value="<?= @$Get['password']; ?>" required></td>
    </tr>
    <tr>
        <td>Petugas</td>
        <td><input type="text" name="nama_petugas" value="<?= @$Get['nama_petugas']; ?>" required></td>
    </tr>
    <tr>
        <td>Level</td>
        <td>
            <select name="level">
                <option value="Administrator">Administrator</option>
                <option value="Petugas">Petugas</option>
            </select>
        </td>
    </tr>
    <tr>
    <tr>
        <td colspan="2" align="right">
            <input type="submit" name="proses" value="✔ Create">

            <a href="<?= url('spp/index'); ?>"><input type="button" name="cancel" value="✖ Cancel"></a>
        </td>
    </tr>
</table>