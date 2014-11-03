<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GesOrganisationController
 *
 * @author skylink
 */
namespace SkylinkEbook\GesOrganisationBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SkylinkEbook\GesOrganisationBundle\Entity\Organisation;

// N'oubliez pas d'ajouter le OrganisationType

use SkylinkEbook\GesOrganisationBundle\Form\OrganisationType;


class GesOrganisationController  extends Controller
{
    /**
     * Crée un formulaire d'enregistrement d'une organisation
     * @return form 
     */
    public function getFormOrganisation(){
        $Organisation = new Organisation(); // Créé un objet Organisation
        $form = $this->createForm(new OrganisationType, $Organisation); //créé un formulaire avec l'objet Organisation créé
        return  $form->createView();
    }
    
    public function myRepository() {
        $repository = $this->getDoctrine()->getManager()
                           ->getRepository('SkylinkEbookGesOrganisationBundle:Organisation');
        return $repository;
    }
    
    /**
     * Appel le template d'enregistrement d'une université et lui passé en paramètre un formulaire 
     * ainsi que le type d'organisation, ici Université et retournée une vue
     * @return universite.html.twig
     */
    public function gererUniversiteAction()
    {
        $typeOrganisation = Organisation::TYPE_UNIVERSITE;
        $listeUniversites = $this->myRepository()->myUniversite($typeOrganisation);
        return $this->render('SkylinkEbookGesOrganisationBundle:GesOrganisation:universite.html.twig', 
                array('form' => $this->getFormOrganisation(),'typeOrg'=>$typeOrganisation,
                      'universites' => $listeUniversites));
    }
    /**
     * Appel le template d'enregistrement d'un département et lui passé en paramètre un formulaire 
     * ainsi que le type d'organisation, ici département
     * @return departement.html.twig
     */
    public function gererDepartementAction()
    {
        $typeOrganisation = Organisation::TYPE_DEPARTEMENT;
        $listeDepartements = $this->myRepository()->myDepartement($typeOrganisation);
        return $this->render('SkylinkEbookGesOrganisationBundle:GesOrganisation:departement.html.twig',
                array('form' => $this->getFormOrganisation(), 'typeOrg'=>$typeOrganisation,
                       'departements' => $listeDepartements));
    }
    /**
     * Appel le template d'enregistrement d'une promotion et lui passé en paramètre un formulaire 
     * ainsi que le type d'organisation, ici promotion
     * @return promotion.html.twig
     */
    public function gererPromotionAction()
    {   $typeOrganisation = Organisation::TYPE_PROMOTION;
        $listePromotions = $this->myRepository()->myPromotion($typeOrganisation);
    
        return $this->render('SkylinkEbookGesOrganisationBundle:GesOrganisation:promotion.html.twig', 
                array('form' => $this->getFormOrganisation(), 'typeOrg'=>$typeOrganisation,
                      'promotions' => $listePromotions));
        
    }
    
  
}

