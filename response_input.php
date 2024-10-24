<?php 

echo "ini adalah file testing response input";
echo "<br>";
echo "modul = ".$_GET['modul']."<br>";
echo "fitur = ".$_GET['fitur']."<br>";
echo "request method :".$_SERVER['REQUEST_METHOD']."<br>";
print_r($_POST);
echo "<br>";
echo "nama role : ".$_POST['role_name']."br";
echo "keterangan role : ".$_POST['role_description']."<br>";
echo "status role : ".$_POST ['role_status']."<br>";

require_once 'domain_Object/node_role.php';
$obj_role = [];
$obj_role[] = new role(role_id: 1,role_name: $_POST['role_name'],role_description: $_POST['role_description'],role_status: $_POST['role_status']);
include 'view/role_list.php';


?>