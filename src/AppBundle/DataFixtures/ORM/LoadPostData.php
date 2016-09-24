<?php 
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Post;

class LoadPostData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 20; $i++) {
            $post = new Post(); 
            $post->setUserEmail("contact@wipop.com")
                ->setTitle("Titre du post n°".$i)
                ->setSummary("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent neque dui, molestie blandit sapien ac, dapibus pellentesque mauris. Vestibulum vulputate mollis odio, in sollicitudin ex semper eget. Suspendisse a auctor dolor, nec condimentum orci. Suspendisse porttitor sagittis maximus. Cras non ultrices erat, a auctor erat. Nunc non quam at dolor interdum tincidunt vitae non felis. Vivamus pulvinar laoreet ipsum quis rhoncus. Etiam vulputate pretium lorem, ut pharetra libero porttitor vel. Ut dignissim nisl quis metus eleifend tristique.")
                ->setContent("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent neque dui, molestie blandit sapien ac, dapibus pellentesque mauris. Vestibulum vulputate mollis odio, in sollicitudin ex semper eget. Suspendisse a auctor dolor, nec condimentum orci. Suspendisse porttitor sagittis maximus. Cras non ultrices erat, a auctor erat. Nunc non quam at dolor interdum tincidunt vitae non felis. Vivamus pulvinar laoreet ipsum quis rhoncus. Etiam vulputate pretium lorem, ut pharetra libero porttitor vel. Ut dignissim nisl quis metus eleifend tristique.

                Phasellus vitae suscipit lacus, sit amet pretium dolor. Curabitur bibendum vulputate diam non lobortis. Praesent mattis massa arcu, eget imperdiet dui aliquet eget. Donec laoreet nisl ullamcorper orci commodo tincidunt. Sed nec sodales dui. In placerat quis libero id consectetur. Sed eleifend ullamcorper eleifend. Praesent hendrerit gravida sodales. Sed lacinia quam vel enim ultrices tempus nec ut lorem. Proin et erat euismod, euismod velit id, varius odio. Pellentesque a commodo ex. Etiam rhoncus nisi at lectus condimentum, ac suscipit orci dictum.

                Ut mollis ipsum sed ligula venenatis, a rutrum dui mollis. Sed id leo sit amet arcu sodales tempor. Sed euismod dictum fringilla. Nullam id purus sollicitudin enim bibendum eleifend sit amet a felis. Nunc non lacus ut arcu sollicitudin fermentum. Fusce eu leo eget turpis commodo scelerisque. Integer non nibh nisi. Suspendisse vel porttitor nisl. Curabitur ut aliquam sem, nec volutpat nibh. Integer posuere tempus magna, at ultricies dolor fermentum nec. Aenean sagittis felis a tempus molestie.

                Quisque vel ante et felis vestibulum mattis. Donec sagittis elit erat, vel pretium purus consequat et. Aliquam sapien diam, convallis sit amet diam quis, vestibulum tempus nulla. Donec pretium consectetur est pulvinar luctus. Nulla semper pulvinar sem, id pellentesque tellus. Fusce tincidunt urna blandit arcu fermentum pretium. Sed tincidunt diam ut dapibus luctus. Aliquam varius scelerisque tempus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Proin a nibh laoreet, feugiat dolor dapibus, euismod mi. Fusce vulputate nisi nulla, ut mattis nisl volutpat eu.

                Maecenas mauris justo, ultricies sagittis suscipit sit amet, semper non sapien. Donec vestibulum, libero ac mattis mollis, velit leo ultrices nulla, eget egestas tellus augue sit amet est. Suspendisse bibendum pellentesque est eu porttitor. Sed venenatis posuere eros ornare tincidunt. Suspendisse placerat interdum enim, a porta felis euismod id. Aenean diam lacus, rhoncus non felis id, elementum facilisis velit. Fusce commodo dictum iaculis. Curabitur tincidunt augue id ipsum interdum elementum. Aenean lectus lectus, efficitur sit amet metus non, feugiat mollis velit. Quisque ut eros purus. Sed vel metus et eros faucibus rutrum. Duis nunc eros, pretium vel metus ut, faucibus commodo nulla. Mauris magna massa, porta at congue dapibus, condimentum a ante. Aenean eleifend eu est vitae dapibus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis tempor aliquet blandit.")
                ->setTags("news, tag".$i." tag".($i%3));
                $manager->persist($post);
        }

        $manager->flush();
    }
}