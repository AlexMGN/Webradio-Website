<?php 

namespace App\Controller\superadmin;

use App\Controller\BaseController;
use App\Repository\SignalementsRepository;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/superadmin/signal")
*/
class SignalSuperAController extends BaseController 
{
    private $signalSuperArepository;

    public function __construct(SignalementsRepository $signalSuperArepository)
    {
        $this->signalSuperArepository = $signalSuperArepository;
    }
    
    /**
     * @Route("/", name="superadmin.signal.index")
     *
     * @return void
     */
    public function index()
    {
        return $this->render('superAdmin/signalements/base.html.twig', [
            'signalements' => $this->signalSuperArepository->findAll()
        ]);
    }

    public function edit()
    {
        
    }
}