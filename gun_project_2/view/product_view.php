<?php
    include('../view/header.php');
    include('../model/scopes-class.php');
?>

<body>
     <div class="container-responsive">    
        <div class="row">
        <div class="col-lg-4"><img src="<?php echo $product['image']; ?>"></div>
        <div class="col-lg-6 col-lg-offset-2">
    
        <form action="../cart/cart.php" method="POST">
        
        <input type="hidden" name="id" value="<?php echo $product['id
        ']; ?>">
       <h3>Product Id:<small><?php echo $product['id']; ?></small></h3>
        <h3>Manufacturer: <small><?php $product['manufacturer']; ?></small></h3>
        <h3>Model: <small><?php echo $product['model']; ?></small></h3>
        <h3>Item: <small><?php echo $product['description']; ?></small></h3>
        <h3>Your Price: <small><?php echo $product['dealerCost']; ?> </small></h3><br>
         <select name ="quantity">
                <option value="0">0</option>
                <option value="1" selected>1</option>
                <option value="2">2</option>
                <option value = "3">3</option>
                <option value = "4">4</option>
                <option value = "5">5</option>
        </select><br><br>
        <input type="submit" value="Add To Cart">
        </form>
         
        </div>
          </div>
          
         </div>

</body>

<?php include('footer.php'); ?>