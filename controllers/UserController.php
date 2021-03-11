<?php
require_once 'models/User.php';
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
        if ($type == 3){
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
        if (!$this->user->existe()) {
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
        }        
        header('location:/?action=admin-user');
    }
    public function update()
    {
        $this->user->update();
        switch ($_POST['typeMAJ']) {
            case 0:
            $this->user->updateEleve();
            break;
            case 1: 
                $this->user->updateParent();
                break;
            case 2: 
                $this->user->updateEns();
                break;
            case 3:
                $this->user->updateAdmin();
                break;
        }
        header('location:/?action=admin-user');
    }
    public function delete()
    {
        switch ($_GET['type']) {
            case 0:
                $this->user->deleteEleve($_GET['id']);
                break;
            case 1: 
                $this->user->deleteParent($_GET['id']);
                break;
            case 2: 
                $this->user->deleteEns($_GET['id']);
                break;
            case 3:
                $this->user->deleteAdmin($_GET['id']);
                break;
        }
        $this->user->delete($_GET['id']);
    }
}