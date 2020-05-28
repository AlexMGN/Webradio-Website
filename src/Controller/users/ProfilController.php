<?php

namespace App\Controller\users;

use Symfony\Component\Routing\Annotation\Route;
use App\Controller\BaseController;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Unirest;

    /**
     * @Route("/profile")
     */
class ProfilController extends BaseController
{
  
     /**
     * @Route("/", name="profile.index", methods={"GET"})
     */
    public function index() :Response
    {
        return $this->render("users/base.html.twig");      
    }

    /**
     * @Route("/show", name="profile.show", methods={"POST"})
     */
    public function dataUser(Request $request){

        if($request->isXmlHttpRequest()){
            $content = $request->getContent();

            $params = json_decode($content, true);
            $token = $params['token'];

            $headers = array('Accept' => 'application/json', 'Authorization' => "Bearer $token");
            
            $url = 'https://webradio-stream.herokuapp.com/authorized/users/logged';
 
            $response = Unirest\Request::get($url,$headers);
 
          // $result = $response->raw_body; return $this->redirectToRoute('profile.setting.index');
            
          $result = $response->raw_body; 
          return new Response($result, 201);
            
        }
    }

    
}