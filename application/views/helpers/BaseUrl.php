<?php
class Zend_View_Helper_BaseUrl{
    public function baseUrl(){
        //Definimos la url base de la aplicación
        $url = Zend_Controller_Front::getInstance()->setBaseUrl("/agenda/public");
        //Devolvemos la url base de la aplicación
        return $url->getBaseUrl();
    }
}
?>