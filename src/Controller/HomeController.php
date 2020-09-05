<?php

namespace App\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface; 
use Symfony\Component\HttpFoundation\JsonResponse;


    
class HomeController extends BaseController {



    /**
     * @Route("/", name="home.index", methods={"GET"})
     */
    public function index(): Response 
    {        
        return $this->render('pages/home.html.twig');
    }

    /**
     * @Route("/page-erreur", name="page.404", methods={"GET"})
     */
    public function pageErreur () 
    {
        return $this->render('pages/page-404.html.twig');
    }

    /**
     * @Route("/firebase", name="home.firebase")
     */
    
    public function configFirebase () {

        $apiKey = $_ENV['APIKEY'];
        $authDomain = $_ENV['AUTHDOMAIN'];
        $databaseURL = $_ENV['DATABASEURL'];
        $projectId = $_ENV['PROJECTID'];
        $storageBucket = $_ENV['STORAGEBUCKET'];

        return new JsonResponse([
            'apiKey' =>  $apiKey,
            'authDomain' => $authDomain,
            'databaseURL' =>  $databaseURL,
            'projectId' => $projectId,
            'storageBucket' => $storageBucket,
        ]);
            
    }

    /**
     * @Route("/passwordLost", name="passwordLost.index")
     */
     public function passwordLost(): Response 
     {        
         return $this->render('forgotPassword/base.html.twig');
     }

     /**
     * @Route("/reset/{token}", name="confirmPassword.index")
     * 
     */
     public function corfimPassword(): Response 
     {        
         return $this->render('newPassword/confirm.html.twig');
     }

}