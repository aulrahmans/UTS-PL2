<?php
class Controller_pembayaran
{
    // Property
    var $PembayaranModel;

    function __construct()
    {
        include_once('Models/Model_pembayaran.php');
        include_once('Models/Model_petugas.php');
        include_once('Models/Model_siswa.php');

        $this->PembayaranModel = new Model_pembayaran();
    }

    function index()
    {
        include('Views/menu/index.php');
        include('Views/pembayaran/index.php');
    }

    function create()
    {
        include('Views/menu/index.php');
        include('Views/pembayaran/post.php');
    }

    function store()
    {
        // Validasi Token CSRF
        if (validation()) {
            $this->PembayaranModel->POST(
                $_SESSION['id_petugas'],
                $_POST['nisn'],
                $_POST['tgl_bayar'],
                $_POST['bulan_bayar'],
                $_POST['tahun_dibayar'],
                $_POST['id_spp'],
                $_POST['jumlah_bayar']
            );
        }

        redirect('pembayaran/index');
    }

    function edit()
    {
        include('Views/pembayaran/put.php');
    }

    function update()
    {
        // Validasi Token CSRF
        if (validation() == true) {
            $this->PembayaranModel->PUT(
                base64_decode($_POST['id_pembayaran']),
                $_SESSION['id_petugas'],
                $_POST['nisn'],
                $_POST['tgl_bayar'],
                $_POST['bulan_bayar'],
                $_POST['tahun_dibayar'],
                $_POST['id_spp'],
                $_POST['jumlah_bayar']
            );
        }

        redirect('pembayaran/index');
    }

    function delete()
    {
        // Validasi Token CSRF
        if (validation() == true) {
            $this->PembayaranModel->DELETE(base64_decode($_GET['id']));
        }

        redirect('pembayaran/index');
    }
}
