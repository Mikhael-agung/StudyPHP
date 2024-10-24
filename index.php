<?php

require_once 'models/role_model.php';

session_start();
// session_destroy();
// session_unset();


if(isset($_GET['modul'])){
    $modul = $_GET['modul'];
} else {
    $modul = 'dashboard';
}

switch ($modul){
    case 'dashboard': 
        include 'view/kosong.php';
        break;
    case 'role':
        $modelRole =  new modelRole();
        if (isset($_GET['fitur'])){
            $fitur = $_GET['fitur'];
        }else{
            $fitur = null;
            }
        switch ($fitur){
            case 'add':
                $role_name = $_POST['role_name'];
                $role_description= $_POST['role_description'];
                $role_status = $_POST['status'];
                $modelRole->addRole($role_name, $role_description, $role_status);
                header('location: index.php?modul=role');
                break;
                default:
                $obj_role = $modelRole->getAllRoles();
                include 'view/role_list.php';
                break;
        }
}


?>