<?php
$pembayaran = new Model_pembayaran();
$GetPembayaran = $pembayaran->GET_Where(base64_decode(@$_GET['id']));
$Get = @$GetPembayaran[0];

$petugasModel = new Model_petugas();
$GetPetugas = $petugasModel->GET();

$siswaModel = new Model_siswa();
$GetSiswa = $siswaModel->GET();


$bulans = [
    'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
];
?>

<input type="hidden" name="csrf_token" value="<?php echo CreateCSRF(); ?>" />
<table border="1">
    <input type="hidden" name="id_pembayaran" value="<?= base64_encode(@$Get['id_pembayaran']); ?>">
    <tr>
        <td>Petugas</td>
        <td>
        <?= $_SESSION['nama_petugas']; ?>
        </td>
    </tr>
    <tr>
        <td>Siswa</td>
        <td>
            <select name="nisn" id="nisn" onchange="getSpp(this.value)" required>
                <option value="">-- Pilih Siswa --</option>
                <?php
                foreach ($GetSiswa as $row) {
                    if (@$Get['nisn'] == $row['nisn']) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
                ?>
                    <option value="<?= $row['nisn']; ?>" data-id-spp="<?= $row['id_spp']; ?>" data-tahun="<?= $row['tahun']; ?>" data-nominal="<?= $row['nominal']; ?>" <?= $selected; ?>>
                        <?= $row['nama'] . ' - ' . $row['nama_kelas'] . ' - ' . $row['kompetensi_keahlian']; ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Tanggal Bayar</td>
        <td>
            <select name="tgl_bayar" required>
                <option value="">-- Pilih Tanggal --</option>
                <?php
                for($d = 1; $d <= 31; $d++) {
                    if (@$Get['tgl_bayar'] == $d) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
                ?>
                    <option value="<?= $d; ?>" <?= $selected; ?>><?= $d; ?></option>
                <?php
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Bulan Bayar</td>
        <td>
            <select name="bulan_bayar" required>
                <option value="">-- Pilih Bulan --</option>
                <?php
                foreach ($bulans as $k => $v) {
                    if (@$Get['bulan_bayar'] == $v) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
                ?>
                    <option value="<?= $v; ?>" <?= $selected; ?>><?= $v; ?></option>
                <?php
                }
                ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Tahun Bayar</td>
        <td><input type="number" name="tahun_dibayar" value="<?= @$Get['tahun_dibayar']; ?>" required></td>
    </tr>
    <tr>
        <td>SPP</td>
        <td>
            <span id="spp"><?php if (!empty($Get['nominal'])) {
                                echo $Get['tahun'] . ' - Rp ' . $Get['nominal'];
                            } else {
                                echo '--';
                            } ?></span>
            <input type="hidden" name="id_spp" id="id_spp" value="<?= @$Get['id_spp']; ?>">
        </td>
    </tr>
    
   <tr>
        <td>Jumlah Bayar</td>
        <td><input type="number" name="jumlah_bayar" value="<?= @$Get['jumlah_bayar']; ?>" required></td>
    </tr>
    
        <td colspan="2" align="right">
            <input type="submit" name="proses" value="✔ Create">

            <a href="<?= url('pembayaran/index'); ?>"><input type="button" name="cancel" value="✖ Cancel"></a>
        </td>
    </tr>
</table>

<script>
    function getSpp(value) {
        let id_spp, spp;

        if (value !== '') {
            const elementNisn = document.querySelector(`#nisn option[value="${value}"]`);
            const tahun = elementNisn.dataset.tahun;
            const nominal = elementNisn.dataset.nominal;
            id_spp = elementNisn.dataset.idSpp;
            spp = `${tahun} - Rp ${nominal}`;
        } else {
            id_spp = '';
            spp = '--';
        }

        document.getElementById('spp').innerHTML = spp;
        document.getElementById('id_spp').value = id_spp;
    }
</script>