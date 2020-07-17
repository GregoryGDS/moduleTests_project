<?php


namespace App\Tests;


use App\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    public function testLastnameNotEmpty(){
        $contact = new Contact('Doe', 'John', 'john.doe@mail.com', 'Test');
        $this->assertNotEmpty($contact->getLastname());
    }

    public function testLastnameEmpty(){
        $contact = new Contact('', 'John', 'john.doe@mail.com', 'Test');
        $this->assertEmpty($contact->getLastname());
    }

    public function testLastnameFormat(){
        $contact = new Contact('Doe', 'John', 'john.doe@mail.com', 'Test');
        $this->assertIsString($contact->getLastname());
    }

    public function testFirstnameNotEmpty(){
        $contact = new Contact('Doe', 'John', 'john.doe@mail.com', 'Test');
        $this->assertNotEmpty($contact->getFirstname());
    }

    public function testFirstnameEmpty(){
        $contact = new Contact('Doe', '', 'john.doe@mail.com', 'Test');
        $this->assertEmpty($contact->getFirstname());
    }

    public function testFirstnameFormat(){
        $contact = new Contact('Doe', 'John', 'john.doe@mail.com', 'Test');
        $this->assertIsString($contact->getFirstname());
    }

    public function testEmailNotEmpty(){
        $contact = new Contact('Doe', 'John', 'john.doe@mail.com', 'Test');
        $this->assertNotEmpty($contact->getEmail());
    }

    public function testEmailEmpty(){
        $contact = new Contact('Doe', 'John', '', 'Test');
        $this->assertEmpty($contact->getEmail());
    }

    public function testEmailFormat(){
        $contact = new Contact('Doe', 'John', 'john.doe@mail.com', 'Test');
        $this->assertIsString($contact->getEmail());
    }

    public function testEmailValid(){
        $contact = new Contact('Doe', 'John', 'john.doe@mail.com', 'Test');
        $this->assertRegExp('/^.+\@\S+\.\S+$/', $contact->getEmail());
    }

    public function testEmailInvalid(){
        $contact = new Contact('Doe', 'John', 'john.doe@mail', 'Test');
        $this->assertNotRegExp('/^.+\@\S+\.\S+$/', $contact->getEmail());
    }

    public function testTagNotEmpty(){
        $contact = new Contact('Doe', 'John', 'john.doe@mail.com', 'Test');
        $this->assertNotEmpty($contact->getTag());
    }

    public function testTagEmpty(){
        $contact = new Contact('Doe', 'John', 'john.doe@mail.com', '');
        $this->assertEmpty($contact->getTag());
    }

    public function testTagFormat(){
        $contact = new Contact('Doe', 'John', 'john.doe@mail.com', 'Test');
        $this->assertIsString($contact->getTag());
    }

    public function testPhoneNumberFormat(){
        $contact = new Contact('Doe', 'John', 'john.doe@mail.com', 'Test', '0323000000');
        $this->assertIsString($contact->getPhoneNumber());
    }

    public function testValidPhoneNumber(){
        $contact = new Contact('Doe', 'John', 'john.doe@mail.com', 'test', '0323000000');
        $this->assertRegExp('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\0-9]*$/', $contact->getPhoneNumber());

        $contact = new Contact('Doe', 'John', 'john.doe@mail.com', 'test', '+33323000000');
        $this->assertRegExp('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\0-9]*$/', $contact->getPhoneNumber());

        $contact = new Contact('Doe', 'John', 'john.doe@mail.com', 'test', '03-23-00-00-00');
        $this->assertRegExp('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\0-9]*$/', $contact->getPhoneNumber());
    }

    public function testInvalidPhoneNumber(){
        $contact = new Contact('Doe', 'John', 'john.doe@mail.com', 'test', '03230000XX');
        $this->assertNotRegExp('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\0-9]*$/', $contact->getPhoneNumber());
    }
}
