<?php

require_once '../model/model.php';

 $sel = delete_id($_GET['id']);

require_once '../view/listForm.php';

//header('location:delete.php?id='.$id);