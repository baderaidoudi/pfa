<?php

namespace Pfa\ProjectBundle\Form;

use Pfa\ProjectBundle\Entity\Employees;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Login extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    $builder
        ->add('Username', TextareaType::class)
        ->add('Password', TextareaType::class);
    }


public function getName(){
            return 'UserCredentials';
}



    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getBlockPrefix()
    {
        return 'pfa_project_bundle_login';
    }
}
