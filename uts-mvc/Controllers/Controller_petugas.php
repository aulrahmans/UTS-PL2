<?php
// Class petugas (CRUD petugas)
class Controller_petugas
{
    // Property
    var $PetugasModel;

    // Method main variabel
    function __construct()
    {
        // Membuat Object dari Class Module petugas
        include_once('Models/Model_petugas.php');
        $this->PetugasModel = new Model_petugas();
    }

    /**
     * Method index
     * Digunakan untuk menampilkan list data petugas
     */
    function index()
    {
        include('Views/menu/index.php');
        include('Views/petugas/index.php');
    }

    /**
     * Method create
     * Digunakan untuk menampilkan halaman/page form petugas
     */
    function create()
    {
        include('Views/menu/index.php');
        include('Views/petugas/post.php');
    }

    /**
     * Method simpan
     * Digunakan untuk memproses penambahan data petugas ke database
     * Yang diinput dari form create petugas
     */
    function simpan()
    {
        // Validasi Token CSRF
        if (validation()) {
            $this->PetugasModel->POST(
                $_POST['username'],
                $_POST['password'],
                $_POST['nama_petugas'],
                $_POST['level']
            );
        }

        redirect('petugas/index');
    }

    /**
     * Method edit
     * Digunakan untuk menampilkan halaman/page form spp
     * Dengan form inputan yang sudah memiliki nilai
     * Berdasarkan id spp yang dipilih
     */
    function edit()
    {
        include('Views/petugas/put.php');
    }

    /**
     * Method update
     * Digunakan untuk memproses perubahan data petugas ke database
     * Yang diedit dari form petugas
     */
    function update()
    {
        // Validasi Token CSRF
        if (validation() == true) {
            $this->PetugasModel->PUT(
                base64_decode($_POST['id_petugas']),
                $_POST['username'],
                $_POST['password'],
                $_POST['nama_petugas'],
                $_POST['level']
            );
        }

        redirect('petugas/index');
    }

    /**
     * Method delete
     * Digunakan untuk menghapus data petugas dari database
     * Berdasarkan id petugas yang dipilih
     */
    function delete()
    {
        // Validasi Token CSRF
        if (validation() == true) {
            $this->PetugasModel->DELETE(base64_decode($_GET['id']));
        }

        redirect('petugas/index');
    }
}
