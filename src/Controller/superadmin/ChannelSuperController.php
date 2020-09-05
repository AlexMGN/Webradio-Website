<?php

namespace App\Controller\superadmin;

use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BaseController;


/**
 * @Route("/superadmin/channel")
 */
class ChannelSuperController extends BaseController {

    /**
    * @Route("/", name="superadmin.channel.index")
    */
    public function index() 
    {
        
        return $this->render('superAdmin/channel/base.html.twig');
    }    

    /**
     * @Route("/edit/{id}", name="superadmin.channel.edit")
     */
    public function edit()
    {
    
        return $this->render('superAdmin/channel/editChannel/editChannel.html.twig');
    }
   

    
}






