<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Members.controller.php");

$members = new MembersController();

if (isset($_POST['create'])) {
    //memanggil add
    $members->add($_POST);
}
else {
    $members->createPage();
}

