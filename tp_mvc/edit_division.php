<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Division.controller.php");

$division = new DivisionController();

if (isset($_POST['edit'])) {
    //memanggil edit
    $division->edit($_POST);
}
else if (!empty($_GET['id_edit'])) {
    //memanggil page edit
    $id = $_GET['id_edit'];
    $division->editPage($id);
}

