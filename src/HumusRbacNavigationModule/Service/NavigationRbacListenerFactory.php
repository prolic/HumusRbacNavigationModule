<?php

namespace HumusRbacNavigationModule\Service;

use HumusRbacNavigationModule\NavigationRbacListener;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class NavigationRbacListenerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $guardPluginManager = $serviceLocator->get('ZfcRbac\Guard\GuardPluginManager');
        $routeGuard = $guardPluginManager->get('ZfcRbac\Guard\RouteGuard');

        $rbacListener = new NavigationRbacListener($routeGuard);
        return $rbacListener;
    }
}
