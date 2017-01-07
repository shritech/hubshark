<?php
// src/AppBundle/Controller/PageController.php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Contact;
use AppBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle:Page:index.html.twig');
    }
    
    public function aboutAction()
    {
        return $this->render('AppBundle:Page:about.html.twig');
    }
 
    public function termsAction()
    {
        return $this->render('AppBundle:Page:terms.html.twig');
    }
 
 
    public function disclaimerAction()
    {
        return $this->render('AppBundle:Page:disclaimer.html.twig');
    }
 
 
    public function privacyAction()
    {
        return $this->render('AppBundle:Page:privacy.html.twig');
    }
 
 
    public function trademarksAction()
    {
        return $this->render('AppBundle:Page:trademarks.html.twig');
    }
 
 
    public function imprintAction()
    {
        return $this->render('AppBundle:Page:imprint.html.twig');
    }
    
    public function contactAction(Request $request)
    {
        $enquiry = new Contact();
        $form = $this->createForm(ContactType::class, $enquiry);
 
        //$this->request = $request;
        
        if ($request->getMethod() == 'POST') {
            //$form->bind($request);
           $form->handleRequest($request); 
           if ($form->isValid()) {
               // Perform some action, such as sending an email

               // Redirect - This is important to prevent users re-posting
               // the form if they refresh the page
                $message = \Swift_Message::newInstance()
                            ->setSubject('Contact enquiry from HubShark')
                            ->setFrom('info@hubshark.com')
                            ->setTo($this->container->getParameter('app.emails.contact_email'))
                            ->setBody($this->renderView('AppBundle:Page:contactEmail.txt.twig', array('enquiry' => $enquiry)));
                $this->get('mailer')->send($message);

                $this->get('session')->getFlashbag('hubshark-notice', 'Your contact enquiry was successfully sent. Thank you!');
 
 
               return $this->redirect($this->generateUrl('app_contact'));
           }
        }
 
        return $this->render('AppBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
