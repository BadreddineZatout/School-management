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
}