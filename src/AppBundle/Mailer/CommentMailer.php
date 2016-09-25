<?php

namespace AppBundle\Mailer;

use Twig_Environment;
use Swift_Mailer;
use AppBundle\Entity\Comment;

class CommentMailer
{
    private $mailer;
    private $twig;
    private $doctrine;

    public function __construct(Twig_Environment $twig, Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    public function informPostUser(Comment $comment)
    {
        $message = \Swift_Message::newInstance()
                ->setSubject('Un nouveau commentaire vient d\'être publier')
                ->setFrom('no-reply@blog.com')
                ->setTo($comment->getPost()->getUserEmail())
                ->setBody(
                    $this->twig->render(
                        'emails/new_comment.html.twig',
                        array(
                            'comment' => $comment,
                        )
                    ),
                    'text/html'
                )
                ->addPart(
                    $this->twig->render(
                        'emails/new_comment.txt.twig',
                        array(
                            'comment' => $comment,
                        )
                    ),
                    'text/plain'
                )
            ;

        $this->mailer->send($message);
    }
}
