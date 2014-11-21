<?php

namespace Polcode\CasperBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

class GoogleApiKeyExposeExtension extends \Twig_Extension 
{
    private $container;
    
    public function __construct(ContainerInterface $container) 
    {
        $this->container = $container;
    }
    
    public function getGlobals() 
    {
        return array(
            'api_key'   => $this->container->getParameter('google_api_key')
        );
    }
    
    public function getName() 
    {
        return 'google_api_key_expose_extension';
    }
    
    
}
