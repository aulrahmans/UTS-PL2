<?php
// Membuat Object dari Class Model_siswa
$siswa = new Model_siswa();
$GetSiswa = $siswa->GET_Where(base64_decode(@$_GET['id']));
$Get = @$GetSiswa[0];

$kelasModel = new Model_kelas();
$GetKelas = $kelasModel->GET();

$sppModel = new Model_spp();
$GetSpp = $sppModel->GET();
?>

<input type="hidden" name="csrf_token" value="<?php echo CreateCSRF(); ?>" />
<table border="1">
    <td>NISN</td>
    <td><input type="number" name="nisn" value="<?= base64_encode($Get['nisn']); ?>"required></td>
    <tr>
        <td>NIS</td>
        <td><input type="number" name="nis" value="<?= $Get['nis']; ?>" required></td>
    </tr>
    <tr>
        <td>Nama</td>
        <td><input type="text" name="nama" value="<?= @$Get['nama']; ?>" required></td>
    </tr>
    <tr>
        <td>Kelas</td>
        <td>
            <select name="id_kelas" id="id_kelas" required>
                <option value="">-- Pilih Kelas --</option>
                <?php
                foreach ($GetKelas as $row) {
                    if (@$Get['id_kelas'] == $row['id_kelas']) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
                ?>
                    <option value="<?= $row['id_kelas']; ?>" <?= $selected; ?>>
                        <?=$row['nama_kelas'] . ' - ' . $row['kompetensi_keahlian']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </td>
    </tr><tr>
    <td>Alamat</td>
        <td><input type="text" name="alamat" value="<?= @$Get['alamat']; ?>"></td>
    </tr>
    <tr>
    <td>No. Telepon</td>
        <td><input type="number" name="no_telp" value="<?= $Get['no_telp']; ?>"></td>
    </tr>
    <td>SPP</td>
    <td>
            <select name="id_spp" id="id_spp" required>
                <option value="">-- Pilih SPP --</option>
                <?php
                foreach ($GetSpp as $row) {
                    if (@$Get['id_spp'] == $row['id_spp']) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
                ?>
                    <option value="<?= $row['id_spp']; ?>" <?= $selected; ?>>
                        <?=$row['tahun'] . ' - ' . $row['nominal']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="right">
            <input type="submit" name="proses" value="✔ Create">

            <a href="<?= url('siswa/index'); ?>"><input type="button" name="cancel" value="✖ Cancel"></a>
        </td>
    </tr>
</table>