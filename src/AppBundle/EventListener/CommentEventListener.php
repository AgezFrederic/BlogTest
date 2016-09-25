<?php

namespace AppBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\Comment;
use AppBundle\Mailer\CommentMailer;

/**
 * Listens on articles creation and add automatically the author.
 */
class CommentEventListener
{
    protected $commentMailer;

    public function __construct(CommentMailer $commentMailer)
    {
        $this->commentMailer = $commentMailer;
    }

    /**
     * Calls function to send mail to post user
     */
    public function postPersist(LifecycleEventArgs $args)
    {
        $object = $args->getEntity(); // return Comment entity

        if ($object instanceof Comment) {
            $this->commentMailer->informPostUser($object);
        }
    }
}
