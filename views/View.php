<?php
class View{
    protected function header(){
        require 'includes/header.php';
    }
    protected function menu(){
        require 'includes/menu.php';
    }
    protected function footer(){
        require 'includes/footer.php';
    }
    protected function scripts(){
        require 'includes/responsive.php';
    }
}