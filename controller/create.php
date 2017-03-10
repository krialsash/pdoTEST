<?php



require_once '../model/model.php';

if (!empty($_POST["name"]) && !empty($_POST["description"]) && !empty($_POST["created_at"])) {

    $id = create($_POST['name'], $_POST['description'], $_POST['created_at']);
//    $date = create($_POST['created_at']= date("Y-m-d H:i:s"));
// $date = new DateTime();
    $created_at= date("Y-m-d H:i:s");

  header("location:edit.php?id=".$id);
}

require_once '../view/createForm.php';