<?php
include_once("conf.php");
include_once("models/Members.class.php");
include_once("models/Division.class.php");
include_once("views/Members.view.php");

class MembersController {
  private $members;
  private $view;

  function __construct(){
    $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->view = new MembersView();
  }

  public function index() {
    $this->members->open();
    
    $this->members->getMembersJoin();
    $data = array();
    while($row = $this->members->getResult()){
      array_push($data, $row);
    }
    
    
    $this->members->close();
    
    $this->view->render($data);
  }
  
  public function createPage() {
    $divisions = new Division(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $divisions->open();

    $divisions->getDivision();
    $dataDivisions = array();
    while($row = $divisions->getResult()){
      array_push($dataDivisions, $row);
    }

    $divisions->close();

    $this->view->renderCreate($dataDivisions);
  }
  
  public function editPage($id) {
    $divisions = new Division(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $divisions->open();
    $this->members->open();

    $this->members->getMembersById($id);
    $data = $this->members->getResult();
    
    $divisions->getDivision();
    $dataDivisions = array();
    while($row = $divisions->getResult()){
      array_push($dataDivisions, $row);
    }

    $divisions->close();
    $this->members->close();
    
    $this->view->renderEdit($data, $dataDivisions);
  }
  
  function add($data){
    $this->members->open();
    $this->members->add($data);
    $this->members->close();
    
    header("location:index.php");
  }
  
  function edit($data){
    $this->members->open();
    $this->members->update($data);
    $this->members->close();
    
    header("location:index.php");
  }

  function delete($id){
    $this->members->open();
    $this->members->delete($id);
    $this->members->close();
    
    header("location:index.php");
  }


}