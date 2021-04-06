<?php
require_once('settings/db.php');

class login extends database
{
    public function auth($data)
    {
        $email = htmlspecialchars($data['mail']);
        $pass = md5(htmlspecialchars($data['password']));
        $sql = "SELECT `name` FROM `admin` WHERE `mail` = '$email' AND `password` = '$pass'";
        $result = $this->db->query($sql);
        return $result;
    }

}