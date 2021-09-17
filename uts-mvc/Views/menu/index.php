<?php
$level = $_SESSION['level'];
?>


MENU
<br>
<?php
if (strtolower($level) == 'administrator') { ?>
<a href="<?= url('spp'); ?>">SPP</a>
&nbsp;|&nbsp;
<a href="<?= url('kelas'); ?>">KELAS</a>
&nbsp;|&nbsp;
<a href="<?= url('siswa'); ?>">SISWA</a>
&nbsp;|&nbsp;
<a href="<?= url('pembayaran'); ?>">PEMBAYARAN</a>
&nbsp;|&nbsp;
<a href="<?= url('petugas'); ?>">PETUGAS</a>
&nbsp;|&nbsp;
<?php } ?>
<?php
if (strtolower($level) == 'petugas') { ?>
    <a href="<?= url('pembayaran'); ?>">PEMBAYARAN</a>
    &nbsp;|&nbsp;
<?php } ?>
<a href="<?= url('login/logout'); ?>" onclick="return confirm('Apakah anda yakin ingin keluar ? ');">LOGOUT (<?= $_SESSION['nama_petugas']; ?>)</a>
<hr>
<br>
<br>