<?php

namespace App\Controller\admin;

use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BaseController;


    /**
     * @Route("/admin")
     */
class AdDashController extends BaseController
{

    /**
     * @Route("/", name="admin.index", methods={"GET"})
     */
    public function index() 
    {
        return $this->render('admin/base.html.twig');
    }

    
    /**
     * @Route("/setting", name="admin.setting.index", methods={"GET"})
     */
    public function settings()
    {
        
        return $this->render("admin/settings/base.html.twig"); 
    }



}