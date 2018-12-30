<?php
    require_once('../model/DBCONFIG.php');
    require_once('../model/functions.php');
   
    
    $action = filter_input(INPUT_POST, 'action');
    if($action == NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action == NULL) {
            $action = 'list_products';
        }
    }
    

    if ($action == 'list_products'){
        $products = get_products();
        include('productDisplay.php');
    }
    else if($action == 'view_product') {
        $product_id = filter_input(INPUT_GET, 'product_id');
        if ($product_id == NULL || $product_id == FALSE) {
            $error = 'Missing or incorrect product id.';
            include('../errors/error.php');
        } else {
            $product = get_product($product_id);
            //$code = $product['id'];
            include('product_view.php');
        }
        
    } else if ($action == 'delete_product') {
        $product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_TEXT);
        
        if($product_id == NULL || $product_id == FALSE) {
            $error = "Missing or incorrect prodcut id.";
            include('../errors/error.php');
        } else {
            delete_product($product_id);
            header("Location: .");
        }
    } else if ($action == 'show_add_form') {
        include('product_add.php');
    } else if ($action == 'add_product') {
        $product_id = filter_input(INPUT_POST, 'product_id');
        $mfg = filter_input(INPUT_POST, 'mfg');
        $model = filter_input(INPUT_POST, 'model');
        $dealerCost = filter_input(INPUT_POST, 'dealerCost');
        $quantity = filter_input(INPUT_POST, 'quantity');
        $description = filter_input(INPUT_POST, 'description');
        $image = filter_input(INPUT_POST, 'image');
        if($product_id == NULL || $product_id == FALSE) {
            $error = "Invalid product data.  Check all fields and try again.";
            include('../errors/error.php');
        } else {
            add_product($product_id, $mfg, $model, $dealerCost, $quantity, $description, $image);
            header("Locaation: .?product_id=$product_id");
        }
    }