<?php

namespace ContainerReHniSV;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_AMxfY9RService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.aMxfY9R' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.aMxfY9R'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Controller\\Api\\MoviesController::list' => ['privates', '.service_locator.oohwkbn', 'get_ServiceLocator_OohwkbnService', true],
            'App\\Controller\\Api\\MoviesController::listFiltered' => ['privates', '.service_locator.oohwkbn', 'get_ServiceLocator_OohwkbnService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'App\\Controller\\Api\\MoviesController:list' => ['privates', '.service_locator.oohwkbn', 'get_ServiceLocator_OohwkbnService', true],
            'App\\Controller\\Api\\MoviesController:listFiltered' => ['privates', '.service_locator.oohwkbn', 'get_ServiceLocator_OohwkbnService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.y4_Zrx.', 'get_ServiceLocator_Y4Zrx_Service', true],
        ], [
            'App\\Controller\\Api\\MoviesController::list' => '?',
            'App\\Controller\\Api\\MoviesController::listFiltered' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'App\\Controller\\Api\\MoviesController:list' => '?',
            'App\\Controller\\Api\\MoviesController:listFiltered' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
        ]);
    }
}
