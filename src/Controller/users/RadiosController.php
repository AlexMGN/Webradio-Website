<?php

namespace App\Controller\users;

use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BaseController;


    /**
     * @Route("/radios")
     */
class RadiosController extends BaseController {

     /**
     * @Route("/", name="radios.index", methods={"GET"})
     */
    public function index()
    {
        return $this->render("users/radios/base.html.twig"); 
    }

    
}