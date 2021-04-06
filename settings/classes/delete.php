<?php
require_once('settings/db.php');

class delete extends database
{
    function __construct()
    {
        parent::__construct();

    }

    public function deleteRow()
    {
        if (isset($_GET['delete'])) {
            $id = intval($_GET['delete']);
            $this->db->query("DELETE FROM `type` WHERE id=$id") or die($mysqli->error());
            $this->db->query("DELETE FROM `info` WHERE id=$id") or die($mysqli->error());
            header('Location: http://localhost/tekla/new-crud/edit.php');
        }
    }


}

?>