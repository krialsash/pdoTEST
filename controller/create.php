<?php

require_once '../model.php';

if (!empty($_POST["name"]) && !empty($_POST["description"]) && !empty($_POST["created_at"])) {

    create($_POST['name'], $_POST['description'], $_POST['created_at']);

    header("location:index.php");
}

require_once '../view/createForm.php';