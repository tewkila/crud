<?php
require_once('settings/models/login.php');

class log
{
    public $login = array();

    function __construct()
    {
//         parent::__construct();

    }

    public function logIn()
    {
        if (isset($_POST['log-in'])) {

            $log = new login();
            $sql = $log->auth($_POST);
            if (isset($sql->num_rows) && $sql->num_rows > 0) {
                while ($row = $sql->fetch_assoc()) {
                    $_SESSION["name"] = $row['name'];
                }
            }

            if (isset($_SESSION["name"])) {
                header('Location: http://localhost/tekla/new-crud/admin.php');
            }
        }


    }

}

?>