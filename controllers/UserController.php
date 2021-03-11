<?php
include 'models/User.php';
class UserController{
    private $type;
    private $user;
    public function __construct(int $type)
    {
        $this->type = $type;
        $this->user = new User();
    }

    public function login_page()
    {
        require ('views/login.php');
    }
    public function login($username, $pdw)
    {
        return $this->user->login($username, $pdw);
    }
    public function redirectUser($type){
        if ($type == 2){
            $_SESSION['eleve_id'] = NULL;
            return 'location:/?action=admin';
        }
        else if($type == 1){
            $_SESSION['eleve_id'] = NULL;
            return 'location:/?action=parent';
        }else{
            return 'location:/?action=eleve';
        }
    }
    public function getAll()
    {
        return json_encode($this->user->getAll());
    }
    public function store()
    {
        $id = $this->user->store();
        switch ($_POST['type']) {
            case 0:
                $this->user->storeEleve($id);
                break;
            case 1: 
                $this->user->storeParent($id);
                break;
            case 2: 
                $this->user->storeEns($id);
                break;
            case 3:
                $this->user->storeAdmin($id);
                break;
        }
        header('location:/?action=admin-user');
    }
    public function update()
    {
        $this->user->update();
        header('location:/?action=admin-user');
    }
    public function delete()
    {
        $this->user->delete($_GET['id']);
    }
}