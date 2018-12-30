<?php
    include('../view/header.php');
    require('../model/scopes-class.php');
    //include('../model/functions.php');
   
?>


<body>
    <div class = "container-fluid">
        <div class="row">
        <?php foreach($products as $product) : ?>
            <?php
                $newScope = new scopes($product['id'], $product['manufacturer'],$product['model'],$product['dealerCost'],$product['quantity'],$product['description'],$product['image']);
                
                echo $newScope;
               
            ?>
          
             <?php endforeach; ?>
        </div>
    </div>
</body>

<?php include('../view/footer.php'); ?>
