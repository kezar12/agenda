<?php

class ContactoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function agregarAction()
    {
        $nombre=$_POST['nombre'];
        $telefono1=$_POST['telefono1'];
        $telefono2=$_POST['telefono2'];
        $email=$_POST['email'];
        $direccion=$_POST['direccion'];
        
        $contacto = new Application_Model_DbTable_Contacto();
        $contacto->addContacto($nombre,$telefono1,$telefono2,$email,$direccion);

    }

    public function editarAction()
    {
        $id=$_POST['idC'];
        $nombre=$_POST['nombre'];
        $telefono1=$_POST['telefono1'];
        $telefono2=$_POST['telefono2'];
        $email=$_POST['email'];
        $direccion=$_POST['direccion'];

        $contacto = new Application_Model_DbTable_Contacto();
        $contacto->updateContacto($id,$nombre,$telefono1,$telefono2,$email,$direccion);
    }
   

    public function eliminarAction()
    {
        $id=$_POST['idC'];
        $contacto = new Application_Model_DbTable_Contacto();
        $contacto->deleteContacto($id);
    }
}