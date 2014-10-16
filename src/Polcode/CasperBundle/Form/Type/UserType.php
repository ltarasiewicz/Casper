<?php

namespace Polcode\CasperBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) 
    {
        $builder
            ->add('nickName', 'text', array(
                'label' =>  'Your nickname'
            ))
            ->add('email', 'email', array(
                'label' =>  'Email address'
            ))
            ->add('dateOfBirth', 'birthday', array(
                'widget' => 'single_text',
            ))
            ->add('gender', 'choice', array(
                'choices'   =>  array('Male' => 'Male', 'Female' => 'Female')
            ))                
            ->add('password', 'repeated', array(
                'type'              =>  'password',
                'invalid_message'   =>  'The password fields must match.',
                'first_options'     =>  array('label'   =>  'Password'),
                'second_options'    =>  array('label'   =>  'Repeat Password'),
            ))
            ->add('register', 'submit', array(
                'label' => 'Sign Up'));        
    }
    
    public function getName()
    {
        return 'user';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) 
    {       
        $resolver->setDefaults(array(
           'data_class' => 'Polcode\CasperBundle\Entity\User',
        ));
    }
    
}