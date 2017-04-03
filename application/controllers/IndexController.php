<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	$contacto= new Application_Model_DbTable_Contacto();
      $page = $this->_getParam('page',1);
      $registros_pagina = 20; 
      $rango_paginas = 10;  
      $contactos=$contacto->listarContacto();
    
  
      $paginador = Zend_Paginator::factory($contactos);  
      $paginador->setItemCountPerPage($registros_pagina)  
              ->setCurrentPageNumber($page)  
              ->setPageRange($rango_paginas);  
   
      $this->view->contactos = $paginador;
    }
}

