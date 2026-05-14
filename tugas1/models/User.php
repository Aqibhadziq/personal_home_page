<?php
class User
{
    private $koneksi;

    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function login($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = ? AND password = MD5(?) LIMIT 1";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$username, $password]);
        return $ps->fetch(PDO::FETCH_ASSOC);
    }

    public function getUser($id)
    {
        $sql = "SELECT * FROM users WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        return $ps->fetch(PDO::FETCH_ASSOC);
    }
}
?>
