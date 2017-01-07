<?php
// src/AppBundle/Controller/BlogController.php
 
namespace AppBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 
/**
 * Blog controller.
 */
class BlogController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
 
        $blog = $em->getRepository('AppBundle:Blog')->find($id);
 
        if (!$blog) {
        throw $this->createNotFoundException('Unable to find Blog post.');
        }
 
        /*
        $comments = $em->getRepository('AppBundle:Comment')
        
                       ->getCommentsForBlog($blog->getId());
        */               
        return $this->render('AppBundle:Blog:show.html.twig', array(
            'blog'      => $blog,
            'comments'  => $blog->getBlog()
        ));        
        
        
    }
    
}