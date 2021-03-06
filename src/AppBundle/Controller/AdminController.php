<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

use AppBundle\Entity\Posts;
use AppBundle\Entity\Users;


class AdminController extends Controller
{
    /**
     * @Route("/Admin/", name="admin")
     */
    public function adminAction()
    {

    	$session = new Session();

        $loggedUser = $session->get('loggedUser');
        $roleUser = $session->get('roleUser');
        if(empty($loggedUser)){
        	return $this->redirectToRoute('homepage');
        }


        $filter = ['active' => true];
        if($roleUser->getId() != 1){
            $filter['createdUser'] = $loggedUser;
        }

        $Posts = $this->getDoctrine()
                        ->getRepository(Posts::class)
                        ->findBy($filter, ['insertionDate' => 'DESC']);

        return $this->render('Admin/admin.html.twig', ['Posts' => $Posts, 'roleUser' => $roleUser->getId()]);
    }

    /**
     * @Route("/new-entry", name="new-entry")
     */
    public function newEntryAction(Request $request)
    {

    	$session = new Session();

        $loggedUser = $session->get('loggedUser');
        if(empty($loggedUser)){
        	return $this->redirectToRoute('homepage');
        }

        $title = $request->request->get('title');
        $content = $request->request->get('content');

        

        if(!empty($title) && !empty($content)){
        	$entityManager = $this->getDoctrine()->getManager();

        	$User = $this->getDoctrine()
                        ->getRepository(Users::class)
                        ->findOneBy(['id' => $loggedUser, 'active' => true]);

        	$post = new Posts();
	        $post->setTitle($title);
	        $post->setContent($content);
	        $post->setAuthor($User);

	        $post->setCreatedUser($User);

	        $post->setInsertionDate(new \Datetime());

	        $entityManager->persist($post);
	        $entityManager->flush();

	        $session->getFlashBag()->add('success', 'Entry saved');
	        return $this->redirectToRoute('admin');
        }

        return $this->render('Admin/newEntry.html.twig', []);
    }

    /**
     * @Route("/edit-entry/{id}", name="edit-entry")
     */
    public function editEntryAction($id, Request $request)
    {

    	$session = new Session();

        $loggedUser = $session->get('loggedUser');
        if(empty($loggedUser)){
        	return $this->redirectToRoute('homepage');
        }

        if(empty($id)){
        	return $this->redirectToRoute('admin');
        }

        $Post = $this->getDoctrine()
                        ->getRepository(Posts::class)
                        ->findOneBy(['id' => $id]);

        $title = $request->request->get('title');
        $content = $request->request->get('content');

        

        if(!empty($title) && !empty($content)){
        	$entityManager = $this->getDoctrine()->getManager();

        	$User = $this->getDoctrine()
                        ->getRepository(Users::class)
                        ->findOneBy(['id' => $loggedUser, 'active' => true]);

	        $Post->setTitle($title);
	        $Post->setContent($content);
	        $Post->setAuthor($User);

	        $Post->setUpdatedUser($User);
	        $Post->setUpdateDate(new \Datetime());

	        $entityManager->flush();

	        $session->getFlashBag()->add('success', 'Entry updated');
	        return $this->redirectToRoute('admin');
        }

        return $this->render('Admin/editEntry.html.twig', ['Post' => $Post]);
    }

    /**
     * @Route("/delete-entry/{id}", name="delete-entry")
     */
    public function deleteEntryAction($id)
    {

    	$session = new Session();

        $loggedUser = $session->get('loggedUser');
        if(empty($loggedUser)){
        	return $this->redirectToRoute('homepage');
        }

        if(empty($id)){
        	return $this->redirectToRoute('admin');
        }

        $Post = $this->getDoctrine()
                        ->getRepository(Posts::class)
                        ->findOneBy(['id' => $id]);
        $Post->setActive(false);

		$this->getDoctrine()->getManager()->flush();

        $session->getFlashBag()->add('success', 'Entry deleted');
        return $this->redirectToRoute('admin');

    }

    /**
     * @Route("/edit-imprint", name="edit-imprint")
     */
    public function editImprintAction()
    {

    	$session = new Session();

        $loggedUser = $session->get('loggedUser');
        if(empty($loggedUser)){
        	return $this->redirectToRoute('homepage');
        }

        return $this->render('Admin/admin.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/ip-blacklist", name="ip-blacklist")
     */
    public function ipBlacklistAction()
    {

    	$session = new Session();

        $loggedUser = $session->get('loggedUser');
        if(empty($loggedUser)){
        	return $this->redirectToRoute('homepage');
        }

        return $this->render('Admin/admin.html.twig', array(
            // ...
        ));
    }
    

}
