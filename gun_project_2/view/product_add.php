<?php include ('../view/header.php'); ?>

<main>
    <h1>Add Product</h1>
    <div class="container-fluid">
    <div class="row">
    <form action="index.php" method="post" id="add_product_form">
        <input type="hidden" name="action" value="add_product">
        
        <label >Product ID:</label>
        <input type="text" name="code" />
        <br>
        
        <label>Manufacturer:</label>
        <input type="text" name="manufacturer" />
        <br>
        
        <label>Model:</label>
        <input type="text" name="model" />
        <br>
        
        <label>Cost:</label>
        <input type="text" name="dealerCost" />
        <br>
        
        <label>Quantity:</label>
        <input type="text" name="quantity">
        <br>
        
        <label>Description:</label>
        <input type="text" name="description">
        <br>
        
        <label>Image:</label>
        <input type="text" name="image">
        <br>
        
        <label>&nbsp;</label>
        <input type="submit" value="Add Product" />
        <br>
        
    </form>
    </div>
        </div>
    <p>
        <a href="../view/index.php?action=list_products">View Product List</a>
    </p>
</main>
<?php include('../view/footer.php'); ?>