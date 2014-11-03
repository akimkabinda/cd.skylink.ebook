<?php
// src/SkylinkEbook/GesAccesBundle/Controller/GesAccesController.php
/**
 * Description of GesAccesController
 *
 * @author akim_kabinda
 */

namespace SkylinkEbook\GesUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
 * importation du namespace de l'entite User
 */
use SkylinkEbook\GesUserBundle\Entity\User;

// N'oubliez pas d'ajouter le UserType
use SkylinkEbook\GesUserBundle\Form\UserType;

class GesUserController extends Controller
{
    public function indexAction()
    {
        // On crée un objet User
        $user = new User();
        
        // On crée le FormBuilder grâce à la méthode du contrôleur
        $formBuilder = $this->createFormBuilder($user);
        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $formBuilder
           
            ->add('username_email','text' , array('attr' => array('placeholder' => "Email")) )
            ->add('password','password', array('attr' => array('placeholder' => "Password")) );

        // À partir du formBuilder, on génère le formulaire
        $form = $formBuilder->getForm();
        
        // On passe la méthode createView() du formulaire à la vue afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('SkylinkEbookGesUserBundle:GesUser:index.html.twig',
                array('form' => $form->createView()) );
        
    }
    /**
     * Fonction permettant de se loguer
     * @return type
     */
    public function loginAction()
    {
        
       
        // Ici, on s'occupera de la création et de la gestion du formulaire
        //$this->get('session')->getFlashBag()->add('notice', 'Article bien enregistré');
        //return $this->redirect( $this->generateUrl('skylink_ebook_ges_user_index') );
        // On utilise la méthode « generateUrl() » pour obtenir l'URL de la liste des articles à la page 2
        // Par exemple
        // La gestion d'un formulaire est particulière, mais l'idée est la suivante :
         // On crée un objet User
        $user = new User();
// On crée le FormBuilder grâce à la méthode du contrôleur
        $formBuilder = $this->createFormBuilder($user);
        // On ajoute les champs de l'entité que l'on veut à notre formulaire
        $formBuilder
           
            ->add('username_email','text' , array('attr' => array('placeholder' => "Email")) )
            ->add('password','password', array('attr' => array('placeholder' => "Password")) );

        // À partir du formBuilder, on génère le formulaire
        $form = $formBuilder->getForm();
        
$request = $this->get('request');
        if( $this->get('request')->getMethod() == 'POST' )
        {
            // Ici, on s'occupera de la création et de la gestion du formulaire
            $this->get('session')->getFlashBag()->add('notice', 'Article bien enregistré');
            // On fait le lien Requête <-> Formulaire
            $form->bind($request);
            $login = $form->get('username_email')->getData();
            $pwd = $form->get('password')->getData();
            
            if ( $login == 'admin' && $pwd == 'admin_root')
            {   // Puis on redirige vers la page de d'acceuil d'administration
                return $this->redirect( $this->generateUrl('skylink_ebook_admin_homepage'));
            }
            else 
            {    
//return $this->render('SkylinkEbookGesUserBundle:GesUser:home.html.twig',
        //        array('pwd'=>$pwd, 'login' => $login)  );                
return $this->redirect( $this->generateUrl('skylink_ebook_ges_user_home' ));
            }

        }
        return $this->redirect($this->generateUrl('skylink_ebook_ges_user_index'));

    }
    /**
     * Fonction permettant de rediriger un user vere son profil
     * @return type
     */
    public function homeAction()
    {
        /*
        if( $this->get('request')->getMethod() == 'POST' OR $this->get('request')->getMethod() == 'GET')     
        {
             // Ici, on s'occupera de la création et de la gestion du formulaire
             $this->get('session')->getFlashBag()->add('notice', 'Article bien enregistré');
             // Puis on redirige vers la page de visualisation de cet article
            return $this->redirect( $this->generateUrl('skylink_ebook_ges_user_home') );
            //return $this->redirect( $this->generateUrl('sdzblog_voir',array('id' => 5)) );
        }
        //*/
        return $this->render('SkylinkEbookGesUserBundle:GesUser:home.html.twig');

    }
    

}
