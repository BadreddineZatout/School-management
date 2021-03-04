<?php
include 'models/Contact.php';
class ContactController{

    function contact_page()
    {
        $contacts = $this->get_contact();
        foreach($contacts as $c)
        {
            $contact = $c;
        }
        require_once 'views/contact.php';
    }
    public function get_contact()
    {
        $contact = new Contact();
        return $contact->get_contact();
        
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