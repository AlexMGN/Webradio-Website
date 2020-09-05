<?php

namespace App\Controller\superadmin;

use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BaseController;
use App\Repository\UsersRepository;

/**
* @Route("/superadmin/users")
*/
class UserSuperController extends BaseController
{

    private $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
    }
    /**
    * @Route("/", name="superadmin.users.index",)
    */
    public function index()
    {
        return $this->render('superAdmin/user/index.html.twig', [
            'users' => $this->usersRepository->findAll()
        ]);
    }

    /**
    * @Route("/new", name="superadmin.users.new")
    */
    public function new()
    {
        return $this->render('superAdmin/user/new/new.html.twig');
    }

    /**
     * @Route("/edit/{id}", name="superadmin.users.edit")
     */
    public function edit()
    {
        return $this->render('superAdmin/user/edit/edit.html.twig');
    }

    

    

}
