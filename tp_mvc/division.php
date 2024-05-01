<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Division.controller.php");

$division = new DivisionController();

if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $division->delete($id);
}
else{
    $division->index();
}

