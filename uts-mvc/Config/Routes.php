<?php
// Memanggil fungsi dari CSRF
include_once('Csrf.php');

/**
 * Mendapatkan URL URI
 * Seperti /spp/index
 */
$requestUri = $_SERVER['REQUEST_URI'];

/**
 * Menjadikan URL URI yang didapat menjadi sebuah array()
 * Dengan tanda pemisah slash (/)
 */
$requestUri = explode('/', $requestUri);

/**
 * Mendapatkan data URL URI dengan urutan array ke-2 (urutan array dimulai dari 0)
 */
$controllers = @$requestUri[3];

/**
 * Mendapatkan data URL URI dengan urutan array ke-3
 * Jika tidak ada data yang didapat, maka berikan data default 'index'
 */
$method = isset($requestUri[4]) ? explode('?', $requestUri[4])[0] : 'index';

/**
 * Function url
 * Digunakan untuk mengembalikan nilai URL penuh
 * Seperti http://localhost/uts-mvc/spp/index
 */
function url($route)
{
    // Mendapatkan nama URL Server (domain tanpa http / https)
    // Seperti localhost atau google.com
    $baseUrl = $_SERVER['HTTP_HOST'];

    return 'http://' . $baseUrl . '/uts-mvc/index.php/' . $route;
}

/**
 * Function redirect
 * Digunakan untuk membuka atau mengalihkan halaman/page
 */
function redirect($route)
{
    header("location:" . url($route));
}

/**
 * Function callControllers
 * Digunakan untuk memanggil method/function pada class controller yang dituju
 * Seperti memanggil method/function index pada class controller Controller_spp.php
 */
function callControllers($controllers, $method)
{
    $controllers->$method();
}

switch ($controllers) {
    case 'spp':
        /**
         * Memanggil class controller Controller_spp
         */
        include 'Controllers/Controller_spp.php';
        $controllers = new Controller_spp();

        /**
         * Memanggil function callControllers
         * Dengan parameters
         * $controllers, $method
         */
        callControllers($controllers, $method);
        break;
        case 'kelas' :
            include 'Controllers/Controller_kelas.php';
            $controllers = new Controller_kelas(); 
            callControllers($controllers, $method);
        break;
        case 'siswa' :
            include 'Controllers/Controller_siswa.php';
            $controllers = new Controller_siswa(); 
            callControllers($controllers, $method);
        break;
        case 'pembayaran' :
            include 'Controllers/Controller_pembayaran.php';
            $controllers = new Controller_pembayaran(); 
            callControllers($controllers, $method);
        break;
        case 'petugas' :
            include 'Controllers/Controller_petugas.php';
            $controllers = new Controller_petugas(); 
            callControllers($controllers, $method);
        break;
        case 'login':
            include 'Controllers/Controller_login.php';
            $controllers = new Controller_login();
    
            callControllers($controllers, $method);
            break;
        default:
            if (isset($_SESSION['id_petugas'])) {
                include('Views/menu/index.php');
            } else {
                include('Views/login/index.php');
            }
            break;

}
