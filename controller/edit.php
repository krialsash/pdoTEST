<?php
require_once '../model/model.php';

// select * from article Where id
// -> form
if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['created_at']) && !empty($_POST['id'])){
    update($_POST['name'], $_POST['description'], $_POST['created_at'], $_POST['id']);
}

$post = post_id($_GET['id']);

require_once '../view/editForm.php';

if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['created_at'])) {
   update_id($_POST['name'], $_POST['description'], $_POST['created_at'], $_POST['id']);
    $created_at= date("Y-m-d H:i:s");
    header("location:index.php");
}




