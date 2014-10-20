<?php

namespace Polcode\CasperBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) 
    {
        $builder
            ->add('name', 'text', array(
                'label' =>  'Name of the event'
            ))
            ->add('public', 'choice', array(
                'label' =>  'Public/private',
                'choices'   =>  array(1 => 'Public', 0 => 'Private')
            ))
            ->add('country', 'text', array(
                'label' => 'country',
            ))
            ->add('city', 'text', array(
                'label'   =>  'City'
            ))             
            ->add('postcode', 'text', array(
                'label'   =>  'Postcode'
            ))
            ->add('date', 'datetime', array(
                'label'   =>  'Date'
            ))                
            ->add('duration', 'integer', array(
                'label'   =>  'Duration'
            ))                
            ->add('description', 'textarea', array(
                'label'   =>  'Description'
            ))                
            ->add('maxGuests', 'integer', array(
                'label'   =>  'Max no. of guests'
            ))                
            ->add('signupDeadline', 'datetime', array(
                'label'   =>  'Signup deadline'
            ))                    
            ->add('register', 'submit', array(
                'label' => 'Add event'));        
    }
    
    public function getName()
    {
        return 'event';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) 
    {       
        $resolver->setDefaults(array(
           'data_class' => 'Polcode\CasperBundle\Entity\Event',
        ));
    }
    
}