<?php
// Class kelas (CRUD kelas)
class Controller_kelas
{
    // Property
    var $KelasModel;

    // Method main variabel
    function __construct()
    {
        // Membuat Object dari Class Module kelas
        include_once('Models/Model_kelas.php');
        $this->KelasModel = new Model_kelas();
    }

    /**
     * Method index
     * Digunakan untuk menampilkan list data kelas
     */
    function index()
    {
        include('Views/menu/index.php');
        include('Views/kelas/index.php');
    }

    /**
     * Method create
     * Digunakan untuk menampilkan halaman/page form kelas
     */
    function create()
    {
        include('Views/menu/index.php');
        include('Views/kelas/post.php');
    }

    /**
     * Method store
     * Digunakan untuk memproses penambahan data kelas ke database
     * Yang diinput dari form create kelas
     */
    function simpan()
    {
        // Validasi Token CSRF
        if (validation()) {
            $this->KelasModel->POST(
                $_POST['nama_kelas'],
                $_POST['kompetensi_keahlian'],
            );
        }

        redirect('kelas/index');
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
        include('Views/kelas/put.php');
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
            $this->KelasModel->PUT(
                base64_decode($_POST['id_kelas']),
                $_POST['nama_kelas'],
                $_POST['kompetensi_keahlian']
            );
        }

        redirect('kelas/index');
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
            $this->KelasModel->DELETE(base64_decode($_GET['id']));
        }

        redirect('kelas/index');
    }
}
