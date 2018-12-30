<?php
    //This File reads the download from the FTP server that connects to distributor DB
   include('scopes-class.php');
    
//Reading and Parsing XML file into an object of the class
$filename = 'inventoryDownload.xml';
if(file_exists($filename)) {
    $xml = simplexml_load_file($filename);
    
    foreach($xml->vendorname_items_bar->item as $i)
    {
        if($i->subCategory == "Scopes")
        {
        
        $id = $i->id;
        $mfg = $i->Brand;
        $model = $i->Model;
        $price = $i->price;   
        $quantity = $i->qty;
        $description = $i->description;
        $image = "https://www.mgewholesale.com/ecommerce/dynamic/images/thumbs/".$id."_1T.jpg";
        $newItem = new scopes($id, $mfg, $model, $price, $quantity, $description,$image);
            
            
       $newItem->dbInsert($id, $mfg, $model, $price, $quantity,$description,$image);
        //echo $newItem;
        }
    }
}
 
?>