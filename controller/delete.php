<?php

require_once '../model/model.php';
 $del = new Article();
 $sel = $del->delete_id($_GET['id']);

require_once '../view/listForm.php';

header('location:index.php'.$id);