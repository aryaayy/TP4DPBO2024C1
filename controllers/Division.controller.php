<?php
include_once("conf.php");
include_once("models/Division.class.php");
include_once("views/Division.view.php");

class DivisionController {
  private $division;
  private $view;

  function __construct(){
    $this->division = new Division(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->view = new DivisionView();
  }

  public function index() {
    $this->division->open();
    $this->division->getDivision();
    $data = array();
    while($row = $this->division->getResult()){
      array_push($data, $row);
    }

    $this->division->close();

    $this->view->render($data);
  }

  public function createPage() {
    $this->view->renderCreate();
  }
  
  public function editPage($id) {
    $this->division->open();
    $this->division->getDivisionById($id);
    $data = $this->division->getResult();

    $this->division->close();

    $this->view->renderEdit($data);
  }
  
  function add($data){
    $this->division->open();
    $this->division->add($data);
    $this->division->close();
    
    header("location:division.php");
  }

  function edit($data){
    $this->division->open();
    $this->division->update($data);
    $this->division->close();
    
    header("location:division.php");
  }

  function delete($id){
    $this->division->open();
    $this->division->delete($id);
    $this->division->close();
    
    header("location:division.php");
  }


}