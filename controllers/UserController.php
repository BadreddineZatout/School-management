<?php
include 'models/User.php';
class UserController{
    private $type;
    public function __construct(int $type)
    {
        $this->type = $type;
    }

    public function login_page()
    {
        require ('views/login.php');
    }
    public function login($username, $pdw)
    {
        $user = new User();
        return $user->login($username, $pdw);
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
        return json_encode($this->ppt->getAll());
    }
    public function store()
    {
        $target = 'data/images/'.basename($_FILES['image_add']['name']);
        move_uploaded_file($_FILES['image_add']['tmp_name'], $target);
        $this->edt->store();
        header('location:/?action=admin-edt');
    }
    public function update()
    {
        $this->edt->update();
        header('location:/?action=admin-edt');
    }
    public function delete()
    {
        $this->edt->delete($_GET['id']);
    }
}