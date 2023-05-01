<?php

    session_start();
    require '../Models/database_config.php';

    function viewUser($id){
        $query = "select * from users where id = '$id'";
        $result = get($query);
        return $result;
    }
?>