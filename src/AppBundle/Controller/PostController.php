<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Post;
use AppBundle\Form\CommentType; 

class PostController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        // look for last post in the database
        $posts = $em->getRepository('AppBundle:Post')->getHomePagePost();  

        return $this->render('post/index.html.twig', array(
            'posts' => $posts,
        ));
    }


    /**
     * @Route("/posts/{slug}", name="post_show")
     */
    public function showAction(Post $post, Request $request)
    {
        $form = $this->createForm(CommentType::class);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Comment $comment */
            $comment = $form->getData();
            $comment->setPost($post);

            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();
        }

        return $this->render('post/show.html.twig', array(
            'post' => $post,
            'form' => $form->createView(),
        ));
    }

    /**
     * Aside block. Used to render the top post
     */
    public function topPostAction()
    {
        $em = $this->getDoctrine()->getManager();

        // look for the most popular post in the database
        $posts = $em->getRepository('AppBundle:Post')->getTopPost();  

        return $this->render('post/top_post.html.twig', array(
            'posts' => $posts,
        ));
    }
}