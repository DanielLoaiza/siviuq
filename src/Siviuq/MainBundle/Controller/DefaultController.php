<?php

namespace Siviuq\MainBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    public function indexAction($name)
    {  
        return $this->render('SiviuqMainBundle:Default:index.html.twig', array('name' => $name));
    }
}