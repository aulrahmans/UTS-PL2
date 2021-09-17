<?php
// Class pegawai (CRUD pegawai)

class Model_pembayaran
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
    function POST($id_petugas, $nisn, $tgl_bayar, $bulan_bayar, $tahun_dibayar, $id_spp, $jumlah_bayar)
    {
        mysqli_query(
            $this->con,
            "insert into tb_pembayaran values(
                '',
                '" . $id_petugas . "',
                '" . $nisn . "',
                '" . $tgl_bayar . "',
                '" . $bulan_bayar . "',
                '" . $tahun_dibayar . "',
                '" . $id_spp . "',
                '" . $jumlah_bayar . "'
            )"
        );
    }

    // Method untuk mengambil semua data dari table
    function GET()
    {
        // perintah Get data
        $sql = "SELECT a.*,
                b.nama_petugas,
                c.nis, c.nama,
                d.tahun, d.nominal
                FROM tb_pembayaran a
                INNER JOIN
                tb_petugas b
                ON a.id_petugas=b.id_petugas
                INNER JOIN
                tb_siswa c
                ON a.nisn=c.nisn
                INNER JOIN
                tb_spp d
                ON c.id_spp=d.id_spp
                ";
        $this->query = mysqli_query($this->con, $sql);
        while ($this->data = mysqli_fetch_array($this->query)) {
            $this->result[] = $this->data;
        }
        return $this->result;
    }

    // Method untuk mengambil data seleksi dari table
    function GET_Where($id_pembayaran)
    {
        // perintah Get data
        $sql = "SELECT a.*,
                b.nama_petugas,
                c.nis, c.nama,
                d.tahun, d.nominal
                FROM tb_pembayaran a
                INNER JOIN
                tb_petugas b
                ON a.id_petugas=b.id_petugas
                INNER JOIN
                tb_siswa c
                ON a.nisn=c.nisn
                INNER JOIN
                tb_spp d
                ON c.id_spp=d.id_spp
                WHERE a.id_pembayaran='$id_pembayaran'
                ";
        $this->query = mysqli_query($this->con, $sql);
        while ($this->data = mysqli_fetch_array($this->query)) {
            $this->result[] = $this->data;
        }
        return $this->result;
    }

    // Method untuk memasukan data ke dalam table
    function PUT($id_pembayaran, $id_petugas, $nisn, $tgl_bayar, $bulan_bayar, $tahun_dibayar, $id_spp, $jumlah_bayar)
    {
        // perintah PUT data
        mysqli_query($this->con, "update tb_pembayaran set
            id_petugas='" . $id_petugas . "',
            nisn='" . $nisn . "',
            tgl_bayar='" . $tgl_bayar . "',
            bulan_bayar='" . $bulan_bayar . "',
            tahun_dibayar='" . $tahun_dibayar . "',
            id_spp='" . $id_spp . "',
            jumlah_bayar='" . $jumlah_bayar . "'
            where id_pembayaran='" . $id_pembayaran . "'
        ");
    }

    // Method untuk menghapus data dari table
    function DELETE($id_pembayaran)
    {
        // perintah DELETE data
        mysqli_query($this->con, "delete from tb_pembayaran where id_pembayaran='$id_pembayaran'");
    }
}
