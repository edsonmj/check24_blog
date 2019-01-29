<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

use AppBundle\Entity\Users;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $login = $request->request->get('login');
        $password = $request->request->get('password');

        if(!empty($login) && !empty($password)){
            $password = sha1($password);
            $Users = $this->getDoctrine()
                        ->getRepository(Users::class)
                        ->findOneBy(['email' => $login, 'password' => $password, 'active' => true]);

            $session = new Session();

            if(!empty($Users)){
                $session->set('loggedUser', $Users->getId());
                $session->set('roleUser', $Users->getRole());
                return $this->redirectToRoute('homepage');
            } else {
                $session->getFlashBag()->add('error', 'Invalid User or Password');
            }
        }


        return $this->render('Login/login.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction()
    {
        $session = new Session();
        $session->remove('loggedUser');
        $session->remove('roleUser');
        return $this->redirectToRoute('homepage');
    }

}
