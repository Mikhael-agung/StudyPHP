<?php
require_once '../domain_Object/node_role.php';
class modelRole{
    private $roles = [];
    private $nextId = 1;

    private function saveToSession (){
        $_SESSION['roles'] = serialize($this->roles);
    }

    public function getAllRoles(){
        return $this->roles;
    }

    public function __construct(){
        if(isset($_SESSION['roles'])){
            $this->roles = unserialize($_SESSION['roles']);
            $this->nextId = count($this->roles) + 1;
        }else{
            $this->initiliazeDefaultRole();
        }
    }

    public function addRole($role_name, $role_description, $role_status){
        $peran = new \Role($this->nextId, $role_name, $role_description, $role_status);
        $this->roles[] = $peran;
        $this->saveToSession();
    }

    public function initiliazeDefaultRole(){
        $this->addRole("Admin", "Administrator", 1);
        $this->addRole("User", "Customer/member", 1);
        $this->addRole("kasir", "Pembayaran", 0);
    }
    
    public function updateRole($role_id, $role_name, $role_description, $role_status){
        foreach($this->roles as $key => $role){
            if($role->role_id == $role_id){
                $this->roles[$key]->role_name = $role_name;
                $this->roles[$key]->role_description = $role_description;
                $this->roles[$key]->role_status = $role_status;
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function deleteRole($role_id){
        foreach($this->roles as $key => $role){
            if($role->role_id == $role_id){
                unset($this->roles[$key]);
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }

    public function getRoleById($role_id){
        foreach($this->roles as $role){
            if($role->role_id == $role_id){
                return $role;
            }
        }
        return null;
    }

    public function getRoleByName($role_name) {
        foreach($this->roles as $role){
            if($role->role_name == $role_name){
                return $role;
            } 
        }
    }
}