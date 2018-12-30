<?php
require_once('dbconfig.php');
    include_once('vehicle_class.php');
        //Setting constants for API credentials
            const CLIENT_ID = 'GATEW0000103';
            const CLIENT_SECRET = '57EDFB8B985A490B982FDCD4792D19A3';
    function getBearerToken()
    {
        //Setting constants for API credentials
            //const CLIENT_ID = 'GATEW0000103';
            //const CLIENT_SECRET = '57EDFB8B985A490B982FDCD4792D19A3';


            $url = "https://authentication.vinsolutions.com/connect/token";

            //Initiating Access Token 
            $ch = curl_init();
            $data = array(
                'client_id' =>CLIENT_ID,
                'client_secret' => CLIENT_SECRET,
                'grant_type' => 'client_credentials',
                'scope' => 'PublicAPI'
            );

            $options = array(

                'Host:' => 'authentication.vinsolutions.com',
                'Content-type:' =>"application/x-www-form-urlencoded"
                );

            curl_setopt($ch, CURLOPT_URL, "https://authentication.vinsolutions.com/connect/token");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $options);

            curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials&client_id=".CLIENT_ID."&client_secret=57EDFB8B985A490B982FDCD4792D19A3&scope=PublicAPI");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $result = curl_exec($ch);
            $response = json_decode($result, true);
            $response1 = $response['access_token'];


            $bearerToken = $response1;
            //Testing Response
                //echo $bearerToken . "<br>";

            curl_close($ch);

            //Printing results of API Access Token request
            getInventory($bearerToken);
    }

    function getInventory($dealerId)
    {
        //$url = "https://api.vinsolutions.com/gateway/v1/user";
        $urlGet = curl_init();
        $authorization = "Bearer ".$dealerId;
        $id = 6082;
        $apiHeader = array(
        'accept:text/json',
        'api_key: 188b51031a564ffbbb16ed64bed979a7',
        'authorization: '.$authorization,
        'content-type: application/json'
        );
        //curl_setopt($urlGet, CURLOPT_URL, "https://api.vinsolutions.com/gateway/v1/tenant/user?dealerId=6082");
        curl_setopt($urlGet, CURLOPT_URL, "https://api.vinsolutions.com/gateway/v1/vehicle/getInventory?dealerId=6082&inventoryType=new");
        curl_setopt($urlGet, CURLOPT_HTTPHEADER, $apiHeader);
        curl_setopt($urlGet, CURLOPT_RETURNTRANSFER, true);
        
        
        $done = curl_exec($urlGet);
        
        $response = json_decode($done, true);
       //echo '<pre>';
      //print_r($response);
        
        foreach($response['Vehicles'] as $vehicle) {
         $vin = $vehicle['Core']['VIN'];
         $stockNum = $vehicle['Core']['StockNumber'];
         $invType = $vehicle['Core']['InventoryType'];
         $year = $vehicle['Core']['Year'];
         $make = $vehicle['Core']['Make'];
         $model = $vehicle['Core']['Model'];
         $trim_type = $vehicle['Core']['Trim'];
         $mileage = $vehicle['Core']['Mileage'];
         $exterior_color = $vehicle['Core']['ExteriorColor'];
         $interior = $vehicle['Core']['InteriorColor'];
         $engine = $vehicle['Core']['Engine'];
         $transmission = $vehicle['Core']['Transmission'];
         $city_MPG = $vehicle['Core']['CityMPG'];
         $hwy_MPG = $vehicle['Core']['HwyMPG']; 
         $id = $vehicle['Core']['AutoId'];
         $daysOnLot = $vehicle['Core']['DaysOnLot'];
         $MSRP = $vehicle['Pricing']['MSRP'];
         $invoicePrice = $vehicle['Pricing']['InvoicePrice'];
            
         $vehicles = new vehicle($vin, $stockNum, $invType, $year, $make, $model, $trim_type, $mileage, $exterior_color, $interior, $engine, $transmission, $city_MPG, $hwy_MPG, $id, $daysOnLot, $MSRP, $invoicePrice);
            
         $vehicles->insertInventoryDB($vin, $stockNum, $invType, $year, $make, $model, $trim_type, $mileage, $exterior_color, $interior, $engine, $transmission, $city_MPG, $hwy_MPG, $id, $daysOnLot, $MSRP, $invoicePrice); 
            
            echo 'Make: ' . $vehicle['Core']['Make'] . " " . $vehicle['Core']['Model'] . " " . $vehicle['Core']['Trim'] .  '<br>';
            echo 'Invoice: ' . $vehicle['Pricing']['InvoicePrice'] . '<br>';
            echo 'Vin: ' . $vehicle['Core']['VIN'] . '<hr>' . '<br>';
        }
    
        
        
        
    }

?>