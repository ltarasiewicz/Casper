<?php

namespace Polcode\CasperBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InviteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) 
    {
        $builder             
            ->add('register', 'submit', array(
                'label' => 'Add event'));        
    }
    
    public function getName()
    {
        return 'invite';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) 
    {       
        $resolver->setDefaults(array(
           'data_class' => 'Polcode\CasperBundle\Entity\Invitation',
        ));
    }
    
}