<?php
include 'models/Contact.php';
class ContactController{
    private $contact;
    public function __construct()
    {
        $this->contact = new Contact();
    }

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
        return $this->contact->get_contact();
        
    }
    public function getAll()
    {
        return json_encode($this->contact->getAll());
    }
    public function store()
    {
        $this->contact->store();
        header('location:/?action=admin-contact');

    }
    public function delete()
    {
        $this->contact->delete();
    }
}