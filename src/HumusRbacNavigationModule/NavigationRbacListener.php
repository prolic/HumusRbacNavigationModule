<?php

namespace HumusRbacNavigationModule;

use SpiffyNavigation\NavigationEvent;
use SpiffyNavigation\Service\Navigation;
use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use ZfcRbac\Guard\GuardInterface;

class NavigationRbacListener extends AbstractListenerAggregate
{
    /**
     * @var GuardInterface
     */
    protected $guard;

    /**
     * @param GuardInterface $guard
     */
    public function __construct(GuardInterface $guard)
    {
        $this->guard = $guard;
    }

    /**
     * {@inheritDoc}
     */
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(Navigation::EVENT_IS_ALLOWED, array($this, 'isAllowed'));
    }

    /**
     * @param NavigationEvent $event
     * @return bool
     */
    public function isAllowed(NavigationEvent $event)
    {
        /** @var \SpiffyNavigation\Page\Page $page */
        $page    = $event->getTarget();
        $options = $page->getOptions();

        if (!isset($options['route'])) {
            return true;
        }

        $route = $options['route'];

        $routeMatch = new RouteMatch(array());
        $routeMatch->setMatchedRouteName($route);

        $event = new MvcEvent();
        $event->setRouteMatch($routeMatch);

        return $this->guard->isGranted($event);
    }
}
