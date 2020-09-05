<?php

namespace App\Controller\admin;

use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BaseController;
use App\Repository\SignalementsRepository;

/**
* @Route("/admin/signalement")
*/
class SignalAdController extends BaseController 
{
    private $signalSuperArepository;

    public function __construct(SignalementsRepository $signalSuperArepository)
    {
        $this->signalSuperArepository = $signalSuperArepository;
    }
    
    /**
     * @Route("/", name="admin.signal.index")
     *
     * @return void
     */
    public function index()
    {
        
        return $this->render('admin/signalements/base.html.twig', [
            'signalements' => $this->signalSuperArepository->findAll()
        ]);
    }

    public function edit()
    {
        
    }
}