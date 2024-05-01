<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Members.controller.php");

$members = new MembersController();

if (isset($_POST['edit'])) {
    //memanggil edit
    $members->edit($_POST);
}
else if (!empty($_GET['id_edit'])) {
    //memanggil page edit
    $id = $_GET['id_edit'];
    $members->editPage($id);
}

