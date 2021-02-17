<?php
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
}