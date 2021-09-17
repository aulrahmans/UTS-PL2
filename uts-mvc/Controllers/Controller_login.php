<?php
class Controller_login
{
    // Property
    var $PetugasModel;

    // Method main variabel
    function __construct()
    {
        // Membuat Object dari Class Module pegawai
        include_once('Models/Model_petugas.php');
        $this->PetugasModel = new Model_petugas();
    }

    function proses()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $getAkun = $this->PetugasModel->GETAKUN($username, $password);

        if (!empty($getAkun)) {
            $_SESSION['id_petugas'] = $getAkun['id_petugas'];
            $_SESSION['username'] = $getAkun['username'];
            $_SESSION['nama_petugas'] = $getAkun['nama_petugas'];
            $_SESSION['level'] = $getAkun['level'];
        }

        redirect('');
    }

    function logout()
    {
        session_destroy();
        redirect('');
    }
}
