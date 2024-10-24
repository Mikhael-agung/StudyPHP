<?php

require_once 'domain_Object/node_role.php';
require_once 'models/role_model.php';

session_start();


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
        $obj_role = $modelRole->getAllRoles();
        switch ('fitur'){
            case 'add':
                $role_name = $_POST['role_name'];
                $role_description= $_POST['role_description'];
                $role_status = $_POST['status'];
                $modelRole->addRole($role_name, $role_description, $role_status);
                header('Location: index.php?modul=role');
                break;
                default:
                $obj_role = $modelRole->getAllRoles();
                include 'view/role_list.php';
                break;
        }
    default:
        break;
}


?>