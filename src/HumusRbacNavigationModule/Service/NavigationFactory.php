<?php

namespace HumusRbacNavigationModule\Service;

use Zend\ServiceManager\ServiceLocatorInterface;

class NavigationFactory extends \SpiffyNavigation\Service\NavigationFactory
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $navigation = parent::createService($serviceLocator);

        $listener = $serviceLocator->get('DimabayApp\NavigationRbacListener');
        /* @var $listener \HumusRbacNavigationModule\NavigationRbacListener */
        $listener->attach($navigation->getEventManager());

        return $navigation;
    }
}
