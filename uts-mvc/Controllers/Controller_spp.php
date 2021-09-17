<?php
// Class pegawai (CRUD pegawai)
class Controller_spp
{
    // Property
    var $SppModel;

    // Method main variabel
    function __construct()
    {
        // Membuat Object dari Class Module pegawai
        include_once('Models/Model_spp.php');
        $this->SppModel = new Model_spp();
    }

    /**
     * Method index
     * Digunakan untuk menampilkan list data spp
     */
    function index()
    {
        include('Views/menu/index.php');
        include('Views/spp/index.php');
    }

    /**
     * Method create
     * Digunakan untuk menampilkan halaman/page form spp
     */
    function create()
    {
        include('Views/menu/index.php');
        include('Views/spp/post.php');
    }

    /**
     * Method store
     * Digunakan untuk memproses penambahan data spp ke database
     * Yang diinput dari form create spp
     */
    function store()
    {
        // Validasi Token CSRF
        if (validation()) {
            $this->SppModel->POST(
                $_POST['tahun'],
                $_POST['nominal'],
            );
        }

        redirect('spp/index');
    }

    /**
     * Method edit
     * Digunakan untuk menampilkan halaman/page form spp
     * Dengan form inputan yang sudah memiliki nilai
     * Berdasarkan id spp yang dipilih
     */
    function edit()
    {
        include('Views/menu/index.php');
        include('Views/spp/put.php');
    }

    /**
     * Method update
     * Digunakan untuk memproses perubahan data spp ke database
     * Yang diedit dari form spp
     */
    function update()
    {
        // Validasi Token CSRF
        if (validation() == true) {
            $this->SppModel->PUT(
                base64_decode($_POST['id_spp']),
                $_POST['tahun'],
                $_POST['nominal']
            );
        }

        redirect('spp/index');
    }

    /**
     * Method delete
     * Digunakan untuk menghapus data spp dari database
     * Berdasarkan id spp yang dipilih
     */
    function delete()
    {
        // Validasi Token CSRF
        if (validation() == true) {
            $this->SppModel->DELETE(base64_decode($_GET['id']));
        }

        redirect('spp/index');
    }
}
