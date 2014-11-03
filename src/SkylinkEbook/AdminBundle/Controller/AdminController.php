<?php
namespace SkylinkEbook\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\HttpFoundation\Response;//utiliser dans le cadre Responsepour afficher un msessage
// Assurez vous d'importer le namespace Request namespace en haut de la classe
use Symfony\Component\HttpFoundation\Request;

//Appel des namespaces des Entités
use SkylinkEbook\GesOrganisationBundle\Entity\Organisation;

//Appel des namespaces des classes FormType
use SkylinkEbook\GesOrganisationBundle\Form\OrganisationType;

class AdminController extends Controller
{
    public function indexAction()
    {

        // Si on n'est pas en POST, alors on affiche le formulaire
        //return $this->render('AkimBlogBundle:Blog:ajouter.html.twig',array('article_id' => $id ));// On ne sait pas combien de pages il y a
       // Mais on sait qu'une page doit être supérieure ou égale à 1
      /*  if( $page < 1 )
        {
        // On déclenche une exception NotFoundHttpException
        // Cela va afficher la page d'erreur 404 (on pourra personnaliser cette page plus tard d'ailleurs)
             throw $this->createNotFoundException('Page inexistante (page ='.$page.')');
        }
        //*/
        // $id =5, On veut avoir l'URL de l'article d'id $id.
        //$url = $this->generateUrl('sdzblog_voir', array('id' => $id));
        
        $rooting_defaults = "SkylinkEbookGesOuvragesBundle:GesOuvrages:demandesPartenariat"; //"SkylinkEbookGesOuvragesBundle:GesOuvrages:demandesPartenariat";
        return $this->render('SkylinkEbookAdminBundle:Admin:index.html.twig', array('rooting_defaults' => $rooting_defaults));
 
    }
    /**
     * Poster les ouvrages
     * @return type
     */
    public function posterOuvrageAction(){
        
        $rooting_defaults = "SkylinkEbookGesOuvragesBundle:GesOuvrages:posterOuvrage";
        return $this->render('SkylinkEbookAdminBundle:Admin:index.html.twig', array('rooting_defaults'=> $rooting_defaults));
    
    }
    /**
     * Gérer les universités
     * @return type
     */
    public function gererUniversiteAction(){
        
        $rooting_defaults = "SkylinkEbookGesOrganisationBundle:GesOrganisation:gererUniversite";
        return $this->render('SkylinkEbookAdminBundle:Admin:index.html.twig', array('rooting_defaults'=> $rooting_defaults));
   
    }
    
    /**
     * Gérer les départements
     * @return type
     */
    public function gererDepartementAction(){
         
        $rooting_defaults = "SkylinkEbookGesOrganisationBundle:GesOrganisation:gererDepartement";
        return $this->render('SkylinkEbookAdminBundle:Admin:index.html.twig', array('rooting_defaults'=> $rooting_defaults));
  
    }
    /**
     * Gérer les promotions
     * @return type
     */
    public function gererPromotionAction(){
        $rooting_defaults = "SkylinkEbookGesOrganisationBundle:GesOrganisation:gererPromotion";
        return $this->render('SkylinkEbookAdminBundle:Admin:index.html.twig', array('rooting_defaults'=> $rooting_defaults));
   
    }
    
    public function organisationAjouterAction($typeOrg , Request $request){
        
        // On test si le type d'organisation est valide
        if(!in_array($typeOrg, array(Organisation::TYPE_DEPARTEMENT, Organisation::TYPE_PROMOTION, Organisation::TYPE_UNIVERSITE)) )
        {
            // On déclenche une exception NotFoundHttpException
        // Cela va afficher la page d'erreur 404 (on pourra personnaliser cette page plus tard d'ailleurs)
        throw $this->createNotFoundException('Organisation inexistante (type ='.$typeOrg.')');

        }

        // On crée un objet Organisation
        $organisation = new Organisation();
        $organisation->setType($typeOrg); //changer le type d'organisation avec le type passé en argument de la fonction
            
        // On crée le formulaire grâce à OrganisationType
        $form = $this->createForm(new OrganisationType(), $organisation);
            
        // analyse le formulaire quand on reçoit une requête POST
        if ($request->isMethod('POST')) {
           
            // On fait le lien Requête <-> Formulaire
            // A partir de maintenant, la variable organisation contient les données postées
            
          $form->handleRequest($request); //$this->getRequest()
           //$form->submit($request->request->get($form->getName()));
              //$data = $form->getData();
            // On vérifie que les valeurs rentrées sont correctes
           // if ($form->isValid()){
                // Les données sont un tableau avec les clés "id", "nom", et "type"
               //$data = $form->getData();
                
                // On enregistre l'objet $organisation dans la base de données
                $em = $this->getDoctrine()->getManager(); // Instentie l'objet em par défaut
                $em->persist($organisation); //prise en compte de l'objet Organisation par doctrine
                $em->flush(); //enregistrement effective dans la base des données
                    
                // On définit un message flash
                $this->get('session')->getFlashBag()->add('info', 'Enregistrement effectué avec succès');
                 //* 
                // On redirige vers la page de visualisation de l'article nouvellement créé
                $myRoute = $this->myRedirect($typeOrg);
                return $this->redirect($this->generateUrl($myRoute));
   
            //}
            /*
            else
                //$request->request->get('page'); // get a $_POST parameter
                return new Response("Form non valide : id "  . $this->getRequest()->request->get('id') .
                    'nom : '  . $this->get('request')->request->get('nom') .  "<br><br> <br> <br> <br>" . var_dump($form->getData()) . "<br> <br> " 
                );
           //*/
        }
            
        // À ce stade :
        // - soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau
        //   $this->get('session')->getFlashBag()->add('error', 'Votre formulaire contient des erreurs');
        $myRoute = $this->myRedirect($typeOrg);
        return $this->redirect($this->generateUrl($myRoute));
              
    }
    
    //fonction de redirection après enregistrement d'une organisation
    public function myRedirect($typeOrg){
        if($typeOrg == Organisation::TYPE_DEPARTEMENT)
            return $route = 'skylink_ebook_admin_departement';
                
        else if($typeOrg == Organisation::TYPE_PROMOTION)
            return $route ='skylink_ebook_admin_promotion';
        else 
            return $route ='skylink_ebook_admin_universite';
                
    }
    
    
    
}
