<?php
require_once '../model/model.php';

if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['created_at']) && !empty($_POST['id'])){
    update($_POST['name'], $_POST['description'], $_POST['created_at'], $_POST['id']);

    header("location:index.php");

}

$post = post_id($_GET['id']);

require_once '../view/editForm.php';




