<?php

namespace SkylinkEbook\GesOrganisationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrganisationType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'text', array('attr' => array('placeholder' => "Entez ID ")) )
            ->add('nom', 'text' , array('attr' => array('placeholder' => "Nom complet")) );
        /*
          
        ->add('type', 'choice', array('choices' => array('' => '-- Séléctionnez --', 
            'U' =>'Université' , 'D' => 'Département', 'P' => 'Promotion')));
         
         //*/
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SkylinkEbook\GesOrganisationBundle\Entity\Organisation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'skylinkebook_gesorganisationbundle_organisation';
    }
}
