<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GesOuvragesController
 *
 * @author skylink
 */
namespace SkylinkEbook\GesOuvragesBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GesOuvragesController  extends Controller
{
    public function demandesPartenariatAction()
    {
        return $this->render('SkylinkEbookGesOuvragesBundle:Ouvrages:demande_partenariat.html.twig');
    }
    public function posterOuvrageAction()
    {
        return $this->render('SkylinkEbookGesOuvragesBundle:Ouvrages:poster_ouvrage.html.twig');
    }
}

