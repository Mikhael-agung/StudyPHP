<?php 
require_once 'domain_Object/node_role.php';

$obj_role = [];
$obj_role[] = new role(role_id: 1, role_name: "super admin", role_description: "mengatur admin", role_status: 1);
$obj_role[] = new role(role_id: 2, role_name: "admin", role_description: "mengatur kasir", role_status: 0);
$obj_role[] = new role(role_id: 3, role_name: "kasir", role_description: "mengatur uang", role_status: 1);
$obj_role[] = new role(role_id: 4, role_name: "customer", role_description: "Beli barang", role_status: 1);

include 'view/role_list.php';

?>

