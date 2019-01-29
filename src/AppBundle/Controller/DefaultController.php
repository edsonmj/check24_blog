<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

use AppBundle\Entity\Posts;
use AppBundle\Entity\Comments;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $session = new Session();

        $loggedUser = $session->get('loggedUser');

        $Posts = $this->getDoctrine()
                        ->getRepository(Posts::class)
                        ->findBy(['active' => true], ['insertionDate' => 'DESC']);


        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'loggedUser' => $loggedUser, 'Posts' => $Posts
        ]);
    }

    /**
     * @Route("/post/{id}", name="post")
     */
    public function postAction($id)
    {
        $session = new Session();
        $loggedUser = $session->get('loggedUser');

        if(empty($id)){
            return $this->redirectToRoute('homepage');
        }

        $Post = $this->getDoctrine()
                        ->getRepository(Posts::class)
                        ->findOneBy(['id' => $id, 'active' => true]);

        $Comments = $this->getDoctrine()
                        ->getRepository(Comments::class)
                        ->findBy(['post' => $id, 'active' => true]);


        // replace this example code with whatever you need
        return $this->render('default/post.html.twig', [
            'loggedUser' => $loggedUser, 'Post' => $Post, 'Comments' => $Comments
        ]);
    }


    /**
     * @Route("/add-comment/{id}", name="add-comment")
     */
    public function addCommentAction($id, Request $request, \Swift_Mailer $mailer)
    {
        $session = new Session();
        $loggedUser = $session->get('loggedUser');

        if(empty($id)){
            return $this->redirectToRoute('homepage');
        }

        $Post = $this->getDoctrine()
                        ->getRepository(Posts::class)
                        ->findOneBy(['id' => $id, 'active' => true]);

        $name = $request->request->get('name');
        $email = $request->request->get('email');
        $url = $request->request->get('url');
        $commentText = $request->request->get('comment');


        if(!empty($name) && !empty($commentText)){
            $entityManager = $this->getDoctrine()->getManager();
            $comment = new Comments();

            $comment->setName($name);
            $comment->setEmail($email);
            $comment->setUrl($url);
            $comment->setComment($commentText);
            $comment->setIpAddress($request->getClientIp());
            $comment->setPost($Post);
            $comment->setInsertionDate(new \Datetime());

            $entityManager->persist($comment);
            $entityManager->flush();

            $message = (new \Swift_Message('Comment Received'))
                        ->setFrom('edson_mj@hotmail.com')
                        ->setTo($Post->getAuthor()->getEmail())
                        ->setBody(
                            'You\'ve received a comment on your post '.$Post->getTitle(),
                            'text/html'
                        )
                    ;

            $mailer->send($message);

            $session->getFlashBag()->add('success', 'Entry saved');
            return $this->redirectToRoute('post', ['id' => $id]);
        } else {
            $session->getFlashBag()->add('error', 'name or comment cannot be empty');
            return $this->redirectToRoute('post', ['id' => $id]);
        }

    }
}
