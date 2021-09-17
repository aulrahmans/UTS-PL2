<?php
// Class petugas (CRUD petugas)

class Model_petugas
{
    // Property
    var $db;
    var $con;
    var $query;
    var $data;
    var $result;

    // Method main variabel
    function __construct()
    {
        // Membuat Object dari Class database
        include_once('Config/Database.php');
        $this->db = new Database();
        $this->con = $this->db->Connect();
    }

    // Method untuk memasukan data ke dalam table
    function POST($username, $password, $nama_petugas, $level)
    {
        mysqli_query(
            $this->con,
            "insert into tb_petugas values(
                '',
                '" . $username . "',
                '" . $password . "',
                '" . $nama_petugas . "',
                '" . $level . "'
            )"
        );
    }

    // Method untuk mengambil semua data dari table
    function GET()
    {
        // perintah Get data
        $this->query = mysqli_query($this->con, "select * from tb_petugas");
        while ($this->data = mysqli_fetch_array($this->query)) {
            $this->result[] = $this->data;
        }
        return $this->result;
    }

    // Method untuk mengambil data seleksi dari table
    function GET_Where($id_petugas)
    {
        // perintah Get data
        $this->query = mysqli_query($this->con, "select * from tb_petugas where id_petugas='$id_petugas'");
        while ($this->data = mysqli_fetch_array($this->query)) {
            $this->result[] = $this->data;
        }
        return $this->result;
    }

    // Method untuk memasukan data ke dalam table
    function PUT($id_petugas, $username, $password, $nama_petugas, $level)
    {
        // perintah PUT data
        mysqli_query($this->con, "update tb_petugas set
            username='" . $username . "',
            password='" . $password . "',
            nama_petugas='" . $nama_petugas . "',
            level='" . $level . "'
            where id_petugas='" . $id_petugas . "'
        ");
    }

    // Method untuk menghapus data dari table
    function DELETE($id_petugas)
    {
        // perintah DELETE data
        mysqli_query($this->con, "delete from tb_petugas where id_petugas='$id_petugas'");
    }

    
    function GETAKUN($username, $password)
    {
        $this->query = mysqli_query($this->con, "SELECT * FROM tb_petugas WHERE username='" . $username . "' AND password='" . $password . "' LIMIT 1");
        return mysqli_fetch_array($this->query);
    }
}
