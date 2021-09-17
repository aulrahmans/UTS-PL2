<?php
// Class siswa (CRUD siswa)

class Model_siswa
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
    function POST($nisn, $nis,$nama, $id_kelas,$alamat, $no_telp,$id_spp)
    {
        mysqli_query(
            $this->con,
            "insert into tb_siswa values(

                '" . $nisn . "',
                '" . $nis . "',
                '" . $nama . "',
                '" . $id_kelas . "',
                '" . $alamat . "',
                '" . $no_telp . "',
                '" . $id_spp . "'
            )"
        );
    }

    // Method untuk mengambil semua data dari table
    function GET()
    {
        // perintah Get data
        $sql = "SELECT a.*,
                b.nama_kelas, b.kompetensi_keahlian,
                c.tahun, c.nominal 
                FROM tb_siswa a
                INNER JOIN
                tb_kelas b
                ON a.id_kelas=b.id_kelas
                INNER JOIN
                tb_spp c
                ON a.id_spp=c.id_spp
                ";
        $this->query = mysqli_query($this->con, $sql);
        while ($this->data = mysqli_fetch_array($this->query)) {
            $this->result[] = $this->data;
        }
        return $this->result;
    }

    // Method untuk mengambil data seleksi dari table
    function GET_Where($nisn)
    {
        // perintah Get data
        $sql = "SELECT a.*,
                b.nama_kelas, b.kompetensi_keahlian,
                c.tahun, c.nominal 
                FROM tb_siswa a
                INNER JOIN
                tb_kelas b
                ON a.id_kelas=b.id_kelas
                INNER JOIN
                tb_spp c
                ON a.id_spp=c.id_spp
                WHERE
                a.nisn='$nisn'";
        $this->query = mysqli_query($this->con,$sql);
        while ($this->data = mysqli_fetch_array($this->query)) {
            $this->result[] = $this->data;
        }
        return $this->result;
    }

    // Method untuk memasukan data ke dalam table
    function PUT($nisn, $nis, $nama, $id_kelas, $alamat, $no_telp, $id_spp)
    {
        // perintah PUT data
        mysqli_query($this->con, "update tb_siswa set
            nis='" . $nis . "',
            nama='" . $nama . "',
            id_kelas='". $id_kelas. "',
            alamat = '". $alamat . "',
            no_telp = '".$no_telp."',
            id_spp ='". $id_spp. "'
            where nisn='" . $nisn . "'
        ");
    }

    // Method untuk menghapus data dari table
    function DELETE($nisn)
    {
        // perintah DELETE data
        mysqli_query($this->con, "delete from tb_nisn where nisn='$nisn'");
    }
}
