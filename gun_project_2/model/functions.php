<?php
    //require('DBCONFIG.php');
    //require('scopes-class.php');
  function get_subtotal($qty, $cost)
  {
        
      $subtotal = $qty * $cost;
      return "$".number_format($subtotal,2);
  }
    
   function dbInsert($id, $mfg, $model, $price, $quantity,$description,$image)
    {
        include_once('DBCONFIG.PHP');    
        $connString = "mysql:host=localhost;dbname=guns";
        $pdo = new PDO($connString, DBUSER,DBPASS);
        
        $sql = "INSERT INTO scopes  VALUES ('$id', '$mfg', '$model', '$price', '$quantity', 
        '$description', '$image')";
        $count=$pdo->exec($sql);
    
    }
    function get_products()
    {
        global $db;
        $query = 'SELECT * FROM scopes ORDER BY id';
        $statement = $db->prepare($query);
        $statement->execute();
        $products = $statement->fetchAll();
        $statement->closeCursor();
        return $products;
    }
    function get_product($product_id) {
        global $db;
        $query = 'SELECT * FROM scopes WHERE id = ?';
        $statement = $db->prepare($query);
        $statement->bindValue(1, $product_id);
        $statement->execute();
        $product = $statement->fetch();
        $statement->closeCursor();
        return $product;
    }
    
    function get_productDetail($product_id){
        global $db;
        $query = 'SELECT * FROM scopes WHERE id = ?';
        $statement = $db->prepare($query);
        $statement->bindValue(1, $product_id);
        $statement->execute();
        $product = $statement->fetch();
        $statement->closeCursor();
        return $product;
       
    }

    function populate_index()
    {
       
            global $db;
            $sql = "SELECT * FROM scopes";
           
        
            $result = $db->query($sql);
            $result->execute();
            
              //fetching a record from result set into array
        while($row=$result->fetch() ){
            $id = $row['id'];
            $mfg = $row['manufacturer'];
            $model = $row['model'];
            $price = $row['dealerCost'];
            $quantity = $row['quantity'];
            $description = $row['description'];
            $image = $row['image'];
            if($quantity > 0)
            {
            $newScope = new scopes($id, $mfg, $model, $price, $quantity, $description,$image);
            echo $newScope;
            }
        }
            $pdo=null;
            
    }

    function adminLogin()
    {
        global $db;
         echo "<div class=panel-group>";
    echo "<div class=panel panel-default>";
        echo "<div class=panel-heading></div>";
        echo "<div class=panel-body>";
        echo "<div class =login-container>";
            echo "<form action=../util/valid_admin.php method=post>";
                echo "<input type=text placeholder=Email name=email>";
                echo "<input type=text placeholder=Password name=password>";
                echo "<button type=submit>Login</button>";
            echo "</form>";
        echo "</div>";
            
        echo "</div>";
        echo "</div>";
        echo "</div>";
        
        echo "</form>";
    }

    function delete_product($product_id) {
        global $db;
        $query = 'DELETE FROM scopes WHERE id = ?';
        $statement = $db->prepare($query);
        $statement->bindValue(1, $product_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_product($product_id, $mfg, $model, $dealerCost, $quantity, $description, $image) {
        global $db;
        $query = 'INSERT INTO scopes (id, manufacturer, model, dealerCost, quantity, description, image) VALUES (?,?,?,?,?,?,?,?)';
        $statement = $db->prepare($query);
        $statement->bindValue(1, $product_id);
        $statement->bindValue(2, $mfg);
        $statement->bindValue(3, $model);
        $statement->bindValue(4, $dealerCost);
        $statement->bindValue(5, $quantity);
        $statement->bindValue(6, $description);
        $statement->bindValue(7, $image);
        $statement->execute();
        $statement->closeCursor();
    }
            
    
?>