<?php
namespace Core\Db;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\Adapter\Adapter;
/**
 * Factory to build a DbAdapter
 *
 * @category   Core
 * @package    Db
 */
class AdapterServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Configuration');
        $mvcEvent = $serviceLocator->get('Application')->getMvcEvent();
        if ($mvcEvent) {
            $routeMatch = $mvcEvent->getRouteMatch();
            $moduleName = $routeMatch->getParam('module');
            //if the module have a db configuration use it
            $root = substr(getenv("DOCUMENT_ROOT"),0,strlen(getenv("DOCUMENT_ROOT"))-6);
            $moduleConfig = include  $root.'/module/' . ucfirst($moduleName) . '/config/module.config.php';
            if (isset($moduleConfig['db'])) 
                $config['db'] = $moduleConfig['db'];
        }
        return new Adapter($config['db']);
    }
}
