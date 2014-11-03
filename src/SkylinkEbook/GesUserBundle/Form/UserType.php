<?php

namespace SkylinkEbook\GesUserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //On va commencer tout de suite par améliorer ce formulaire. En effet, vous pouvez voir que les types de champ ne sont pas
        $builder
            ->add('id')
            ->add('username_email','text')
            ->add('password','password')
            ->add('typeCompte')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SkylinkEbook\GesUserBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'skylinkebook_gesuserbundle_user';
    }
}
