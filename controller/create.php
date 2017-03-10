<?php



require_once '../model/model.php';

if (!empty($_POST["name"]) && !empty($_POST["description"]) && !empty($_POST["created_at"])) {

    $id = create($_POST['name'], $_POST['description'], $_POST['created_at']);
    $created_at = date('Y-m-d H:i:s', time());;

    header("location:index.php");

}

require_once '../view/createForm.php';