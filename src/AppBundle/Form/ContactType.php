<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
 
/**
 * Description of ContactType
 *
 * @author Shrinivas
 */
class ContactType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name',TextType::class);
        $builder->add('email',EmailType::class);
        $builder->add('subject',TextType::class);
        $builder->add('body',TextareaType::class);
    }
 
    public function getBlockPrefix()
    {
        return 'contact';
    }
}
