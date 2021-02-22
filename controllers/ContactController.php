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
}