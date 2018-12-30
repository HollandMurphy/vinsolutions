<?php
    require_once('../model/DBCONFIG.php');
    //require('../model/functions.php');
   
    
    $action = filter_input(INPUT_POST, 'action');
    if($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'list_products';
        }
    }
    

    if ($action == 'list_products'){
        $products = get_products();
        include('view/productDisplay.php');
    }