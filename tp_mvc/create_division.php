<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Division.controller.php");

$division = new DivisionController();

if (isset($_POST['create'])) {
    //memanggil add
    $division->add($_POST);
}
else {
    $division->createPage();
}

