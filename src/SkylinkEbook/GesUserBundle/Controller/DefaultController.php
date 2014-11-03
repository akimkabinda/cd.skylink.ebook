<?php

namespace SkylinkEbook\GesUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SkylinkEbookGesUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
