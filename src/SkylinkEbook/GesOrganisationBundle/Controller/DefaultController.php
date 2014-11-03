<?php

namespace SkylinkEbook\GesOrganisationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SkylinkEbookGesOrganisationBundle:Default:index.html.twig', array('name' => $name));
    }
}
