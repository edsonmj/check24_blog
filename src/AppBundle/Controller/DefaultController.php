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
    public function indexAction(Request $request)
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
}
