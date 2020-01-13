<?php


namespace App\Frontend\Login\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{

    /**
     * @Route(path="/", name="app_home")
     */
    public function invoke()
    {

        return new Response("Hello There");
    }
}