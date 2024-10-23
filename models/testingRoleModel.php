<?php 

session_start();
session_destroy();

require_once 'role_model.php';

$obj_role = new modelRole();

echo "== default data role == "."<br>";
foreach($obj_role->getAllRoles() as $role){
    echo "role ID : " .$role->role_id. "<br>";
    echo "role Name : " .$role->role_name. "<br>";
    echo "role Description : " .$role->role_description. "<br>";
    echo "role Status  : " .$role->role_status. "<br>";
}

//add new role

echo "== testing add new role == "."<br>";
$obj_role->addRole("New role", "Testing New Role", 0);
$obj_role->addRole("Very New Role", "Testing Very New Role", 1);
foreach($obj_role->getAllRoles() as $role){
    echo "role ID : " .$role->role_id. "<br>";
    echo "role Name : " .$role->role_name. "<br>";
    echo "role Description : " .$role->role_description. "<br>";
    echo "role Status  : " .$role->role_status. "<br>";
}

echo "== update data role =="."<br>";
$obj_role->updateRole (1, "update role", "role terupdate", 1);
foreach ($obj_role->getAllRoles() as $role) {
    echo "role id: ".$role->role_id."<br>";
    echo "role name: ".$role->role_name."<br>";
    echo "role Description: ".$role->role_description."<br>";
    echo "role status: ".$role->role_status."<br><br>";
}


echo "== delete data role =="."<br>";
$obj_role->deleteRole(1);
foreach ($obj_role->getAllRoles() as $role) {
    echo "role id: ".$role->role_id."<br>";
    echo "role name: ".$role->role_name."<br>";
    echo "role Description: ".$role->role_description."<br>";
    echo "role status: ".$role->role_status."<br><br>";
}

?>