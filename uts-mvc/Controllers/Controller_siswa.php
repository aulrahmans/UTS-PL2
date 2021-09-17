<?php
// Class pegawai (CRUD pegawai)
class Controller_siswa
{
    // Property
    var $SiswaModel;

    // Method main variabel
    function __construct()
    {
        // Membuat Object dari Class Module pegawai
        include_once('Models/Model_siswa.php');
        include_once('Models/Model_kelas.php');
        include_once('Models/Model_spp.php');
        $this->SiswaModel = new Model_siswa();
    }

    /**
     * Method index
     * Digunakan untuk menampilkan list data siswa
     */
    function index()
    {
        include('Views/menu/index.php');
        include('Views/siswa/index.php');
    }

    /**
     * Method create
     * Digunakan untuk menampilkan halaman/page form siswa
     */
    function create()
    
    {
        include('Views/menu/index.php');
        include('Views/siswa/post.php');
    }

    /**
     * Method simpan
     * Digunakan untuk memproses penambahan data siswa ke database
     * Yang diinput dari form create siswa
     */
    function simpan()
    {
        // Validasi Token CSRF
        if (validation()) {
            $this->SiswaModel->POST(
                $_POST['nisn'],
                $_POST['nis'],
                $_POST['nama'],
                $_POST['id_kelas'],
                $_POST['alamat'],
                $_POST['no_telp'],
                $_POST['id_spp']

            );
        }

        redirect('siswa/index');
    }

    /**
     * Method edit
     * Digunakan untuk menampilkan halaman/page form siswa
     * Dengan form inputan yang sudah memiliki nilai
     * Berdasarkan nisn yang dipilih
     */
    function edit()
    {
        include('Views/siswa/put.php');
    }

    /**
     * Method update
     * Digunakan untuk memproses perubahan data siswa ke database
     * Yang diedit dari form siswa
     */
    function update()
    {
        // Validasi Token CSRF
        if (validation() == true) {
            $this->SppModel->PUT(
                base64_decode($_POST['nisn']),
                $_POST['nis'],
                $_POST['nama'],
                $_POST['id_kelas'],
                $_POST['alamat'],
                $_POST['no_telp'],
                $_POST['id_spp']
            );
        }

        redirect('siswa/index');
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

        redirect('siswa/index');
    }
}
