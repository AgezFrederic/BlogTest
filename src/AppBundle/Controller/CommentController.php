<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request; 

use AppBundle\Entity\Post;

class CommentController extends Controller
{
    /**
     * Block used to show all comment for the request post
     */
    public function listAction(Post $post)
    {
        $em = $this->getDoctrine()->getManager();
        $comments = $em->getRepository('AppBundle:Comment')->getCommentsByPost($post);

        return $this->render('comment/list.html.twig', array(
            'comments' => $comments,
        ));
    }
}