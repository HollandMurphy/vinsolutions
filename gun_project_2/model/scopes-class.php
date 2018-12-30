<?php

class scopes
{
    private $id;
    private $mfg;
    private $dept;
    private $model;
    private $price;
    private $dealerCost;
    private $quantity;
    private $description;
    private $addDescription;
    private $images;
    
    function __construct($id, $mfg, $model, $price, $quantity,$description,$image)
    {
        $this->setID($id);
        $this->setMFG($mfg);
        $this->setModel($model);
        $this->setDealerCost($price);
        $this->setQuantity($quantity);
        $this->setDescription($description);
        $this->setImage($image);
        
    }
    
    function __toString() {
        
        $data = '<div class="col-sm-4" style="width:100% height:100%">';
        $data .= '<div class="panel panel-primary">';
            $data .= '<div class="panel-heading">'.$this->getDescription().'</div>';
            $data .= '<div class="panel-body"><img src='.$this->getImage() .' class="img-responsive" style="max-width:100% max-height:100%" alt="Image"></div>';
            $data .= '<div class="panel-footer">Only '.$this->getQuantity(). " ".$this->getID().'</div>';
        $data .= '<a href=?action=view_product&amp;product_id='.$this->getID().'><button type=button class="btn btn-primary btn-block">Click Here</button></a>';
        $data .= '</div>';
      
        $data .= '</div>';
          
      
        return $data;
        
    }
    
    
    public function dbInsert($id, $mfg, $model, $price, $quantity,$description,$image)
    {
        include_once('DBCONFIG.PHP');    
        $connString = "mysql:host=localhost;dbname=guns";
        $pdo = new PDO($connString, DBUSER,DBPASS);
        
        $sql = "INSERT INTO scopes  VALUES ('$id', '$mfg', '$model', '$price', '$quantity', 
        '$description', '$image')";
        $count=$pdo->exec($sql);
    
    }
    
    public function indexPage()
    {
          $data = '<div class="col-sm-4">';
            $data .= '<div class="panel panel-primary">';
            $data .= '<div class="panel-heading">'.$this->getModel().'</div>';
            $data .= '<div class="panel-body"><img src='.$this->getImage().' class="img-responsive" style="width:100%" alt="Image"></div>';
            $data .= '<div class="panel-footer">Buy 50 mobiles and get a gift card</div>';
            $data .= '</div>';
            $data .= '</div>';
        
        return $data;
        
        
        
    }
    
    //GETTERS AND SETTERS FOR OBJECT ATTRIBUTES
    public function getID() {return $this->id;}
    public function getMFG() {return $this->mfg;}
    public function getModel() {return $this->model;}
    public function getDealerCost() {return $this->dealerCost;}
    public function getQuantity() {return $this->quantity;}
    public function getDescription() {return $this->description;}
    public function getImage() {return $this->images;}
    
    public function setID($id){
        $this->id = $id;
    }
    
    public function setMFG($mfg){
        $this->mfg = $mfg;
    }
    
    public function setModel($model){
        $this->model = $model;
    }
    
    public function setDealerCost($cost){
        $this->dealerCost = $cost;
    }
    
    public function setQuantity($qty){
        $this->quantity = $qty;
    }
    
    public function setDescription($desc){
        $this->description = $desc;
    }
    
    public function setImage($image){
        $this->images = $image;
    }
    
    //END GETTERS AND SETTERS
    
}

?>