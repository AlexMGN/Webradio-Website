<?php

namespace App\Controller\superadmin;

use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BaseController;


    /**
     * @Route("/superadmin")
     */
class SuperADashController extends BaseController
{

    /**
     * @Route("/", name="superadmin.index")
     */
    public function index() 
    {
        
        return $this->render('superAdmin/base.html.twig');
    }


    /**
     * @Route("/setting", name="superadmin.setting.index")
     */
    public function settings()
    {
        
        return $this->render("superAdmin/settings/base.html.twig"); 
    }

    /**
     * @Route("/notification", name="superadmin.notification")
     */

     public function notification()
     {
        
        return $this->render("superAdmin/notifications/base.html.twig");
     }



}