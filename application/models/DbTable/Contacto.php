<?php

class Application_Model_DbTable_Contacto extends Zend_Db_Table_Abstract
{

    protected $_name = 'contacto';
 
   public function getContacto($id){
        $id = (int)$id;
        $row = $this->fetchRow('id = ' .$id);
        if (!$row){
                throw new Exception("Count not find row $id");
        }
        return $row->toArray();
    }

    public function addContacto($nombre,$telefono1,$telefono2,$email,$direccion)
    {   
      $estado=1;
      $mysqli = new mysqli("localhost", "root", "", "agenda");
      //$data=array('nombre'=>$nombre,'telefono1'=>$telefono1,'telefono2'=>$telefono2,'email'=>$email,'direccion'=>$direccion,'estado'=>$estado);
      $statement = $mysqli->prepare("CALL registrar(?,?,?,?,?,?)");
      $statement->bind_param("siissi",$nombre,$telefono1,$telefono2,$email,$direccion,$estado);
      $statement->execute();
      $statement->close();
    }
   

     public function updateContacto($id,$nombre,$telefono1,$telefono2,$email,$direccion)
     {
        
      $mysqli = new mysqli("localhost", "root", "", "agenda");
      $statement = $mysqli->prepare("CALL modificar(?,?,?,?,?,?)");
      $statement->bind_param("isiiss",$id,$nombre,$telefono1,$telefono2,$email,$direccion);
      $statement->execute();
      $statement->close();
    }

    public function deleteContacto($id){

      $estado=0;
      $mysqli = new mysqli("localhost", "root", "", "agenda");
      $statement = $mysqli->prepare("CALL eliminar(?,?)");
      $statement->bind_param("ii",$id,$estado);
      $statement->execute();
      $statement->close();
    }

    public function listarContacto(){
      $data=array();
      $mysqli = new mysqli("localhost", "root", "", "agenda");
      $qr = $mysqli->query("call listar()");
      $i=0;
      while ($row = $qr->fetch_assoc()) {
        $data[$i]=$row;
        $i++;
      }
      return $data;
    } 
}

