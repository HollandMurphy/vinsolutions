<?php
    class vehicle
    {
        private $vin;
        private $stockNum;
        private $invType;
        private $year;
        private $make;
        private $model;
        private $trim_type;
        private $mileage;
        private $exterior_color;
        private $interior;
        private $engine;
        private $transmission;
        private $city_MPG;
        private $hwy_MPG;
        private $id;
        private $daysOnLot;
        private $MSRP;
        private $invoicePrice;
        public static $vehicle_count = 0;
        
        
        function __construct($vin, $stockNum, $invType, $year, $make, $model, $trim, $mileage, $exterior_color, $interior, $engine, $transmission, $city_MPG, $hwy_MPG, $id, $daysOnLot, $msrp, $invoice)
        {
            $this->vin = $vin;
            $this->stockNum = $stockNum;
            $this->year = $year;
            $this->make = $make;
            $this->model = $model;
            $this->trim_type = $trim;
            $this->mileage = $mileage;
            $this->exterior_color = $exterior_color;
            $this->interior = $interior;
            $this->engine = $engine;
            $this->transmission = $transmission;
            $this->city_MPG = $city_MPG;
            $this->hwy_MPG = $hwy_MPG;
            $this->id = $id;
            $this->daysOnLot = $daysOnLot;
            $this->MSRP = $msrp;
            $this->invoicePrice = $invoice;
            
        }
        
        //Getters for the class
        public function getVin()
        {
            return $this->vin;
        }
        public function getStockNum(){
            return $this->stockNum;
        }
        public function getInvType(){
            return $this->invType;
        }
        public function getYear(){
            return $this->year;
        }
        public function getMake(){
            return $this->make;
        }
        public function getModel(){
            return $this->model;
        }
        public function getTrim(){
            return $this->trim_type;
        }
        public function getMileage(){
            return $this->mileage;
        }
        public function getExterior(){
            return $this->exerior_color;
        }
        public function getInterior(){
            return $this->interior;
        }
        public function getEngine(){
            return $this->engine;
        }
        public function getTransmission(){
            return $this->transmission;
        }
        public function getCityMPG(){
            return $this->city_MPG;
        }
        public function getHwyMPG(){
            return $this->hwy_MPG;
        }
        public function getID(){
            return $this->id;
        }
        public function getDaysOnLot() {
            return $this->daysOnLot;
        }
        public function getMSRP(){
            return $this->MSRP;
        }
        public function getInvoice(){
            return $this->invoicePrice;
        }
        
        //Setters for the class
        public function setVin($vin){
            $this->vin = $vin;
        }
        public function setStockNum($stockNum){
            $this->stockNum = $stockNum;
        }
        public function setInvType($invType){
            $this->invType = $invType;
        }
        public function setYear($year){
            $this->year = $year;
        }
        public function setMake($make){
            $this->make = $make;
        }
        public function setModel($model){
            $this->model = $model;
        }
        public function setTrim($trim){
            $this->trim = $trim;
        }
        public function setMileage($mileage){
            $this->mileage = $mileage;
        }
        public function setExterior($exterior){
            $this->exterior_color = $exterior;
        }
        public function setInterior($interior){
            $this->interior = $interior;
        }
        public function setEngine($engine){
            $this->engine = $engine;
        }
        public function setTransmission($transmission){
            $this->transmission = $transmission;
        }
        public function setCityMPG($cityMPG){
            $this->city_MPG = $cityMPG;
        }
        public function setHwyMPG($hwyMPG){
            $this->hwy_MPG = $hwyMPG;
        }
        public function setID($id){
            $this->id = $id;
        }
        public function setDaysOnLot($daysOnLot) {
            $this->daysOnLot = $daysOnLot;
        }
        public function setMSRP($msrp){
            $this->MSRP = $msrp;
        }
        public function setInvoice($invoice){
            $this->invoicePrice = $invoice;
        }
        
        public function insertInventoryDB($vin, $stockNum, $invType, $year, $make, $model, $trim_type, $mileage, $exterior_color, $interior, $engine, $transmission, $city_MPG, $hwy_MPG, $id, $daysOnLot, $MSRP, $invoicePrice)
    {
        global $db;
        $query = 'INSERT INTO newvehicle (vin, stockNum, invType, year, make, model, trim, mileage, exterior_color, interior, engine, transmission, city_MPG, hwy_MPG, id, daysOnLot, MSRP, invoicePrice) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, ?)';
        $statement = $db->prepare($query);
        $statement->bindValue(1, $vin);
        $statement->bindValue(2, $stockNum);
        $statement->bindValue(3, $invType);
        $statement->bindValue(4, $year);
        $statement->bindValue(5, $make);
        $statement->bindValue(6, $model);
        $statement->bindValue(7, $trim_type);
        $statement->bindValue(8, $mileage);
        $statement->bindValue(9, $exterior_color);
        $statement->bindValue(10, $interior);
        $statement->bindValue(11, $engine);
        $statement->bindValue(12, $transmission);
        $statement->bindValue(13, $city_MPG);
        $statement->bindValue(14, $hwy_MPG);
        $statement->bindValue(15, $id);
        $statement->bindValue(16, $daysOnLot);
        $statement->bindValue(17, $MSRP);
        $statement->bindValue(18, $invoicePrice);
        
        $statement->execute();
        $statement->closeCursor();
    }
    
    }

?>