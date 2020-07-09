<?php

namespace App\Controller\users;

use App\Controller\BaseController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
     * @Route("/user/planning")
     */
class PlanningController extends BaseController{

     /**
     * @Route("/", name="profile.planning.index", methods={"GET"})
     */
    public function index(): Response {

        return $this->render('users/planning/base.html.twig');
    }

     /**
     * @Route("/timeline", name="profile.timeline.index")
     */
    public function timeline (): Response {

        return $this->render('users/timeline/base.html.twig');
    }
}