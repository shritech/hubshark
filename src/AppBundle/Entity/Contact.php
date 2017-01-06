<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Entity;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Doctrine\Common\Collections\ArrayCollection;
 
/**
 * Description of Contact
 *
 * @author Shrinivas
 */
class Contact {
    protected $name;
 
    protected $email;
 
    protected $subject;
 
    protected $body;
 
    public function getName()
    {
        return $this->name;
    }
 
    public function setName($name)
    {
        $this->name = $name;
    }
 
    public function getEmail()
    {
        return $this->email;
    }
 
    public function setEmail($email)
    {
        $this->email = $email;
    }
 
    public function getSubject()
    {
        return $this->subject;
    }
 
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }
 
    public function getBody()
    {
        return $this->body;
    }
 
    public function setBody($body)
    {
        $this->body = $body;
    }
    
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new NotBlank());
 
        $metadata->addPropertyConstraint('email', new Email());
 
        $metadata->addPropertyConstraint('subject', new NotBlank());
        $metadata->addPropertyConstraint('subject', new Length(array('max'=> 50)));
 
        $metadata->addPropertyConstraint('body', new Length(array('min'=> 50)));
    }
}
