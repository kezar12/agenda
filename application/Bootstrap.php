<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }

    
	 protected function _initAutoload()
    {
        $moduleLoader = new Zend_Application_Module_Autoloader(array('namespace' => '','basePath' => APPLICATION_PATH));
        return $moduleLoader;
    }

    
}

