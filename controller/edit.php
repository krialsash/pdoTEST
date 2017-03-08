<?php
require_once 'model.php';

// select * from article Where id
// -> form
if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['created_at']) && !empty($_POST['id'])){
    update($_POST['name'], $_POST['description'], $_POST['created_at'], $_POST['id']);
}

post_id($_GET['id']));

require_once '../view/createFormEd.php';


if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['created_at'])) {
   update_id($_POST['name'], $_POST['description'], $_POST['created_at'], $_POST['id']);

//    header("location:index.php");
}
require_once '../view/createFormUpdt.php';


