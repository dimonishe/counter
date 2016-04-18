<?php

class Counter{
    
    
    private $addressList = array();
    private $count = 0;
    public $userAddress = "";
    
    function __construct($addressList, $count) {
        $this->addressList = $addressList;
        $this->count = $count;
        $this->userAddress = $_SERVER['REMOTE_ADDR'];
    }
    
    private function checkAddress(){
   
        $this->showAdressesList($this->addressList);
        if(!in_array($this->userAddress, $this->addressList)){
            $this->count++;
            array_push($this->addressList, $this->userAddress);
        }
        $this->showAdressesList($this->addressList);
        
    }
    
    public function showQuantity(){
        $this->checkAddress();
        $this->view($this->count);
    }
    
    private function showAdressesList($array){
        echo "<br>";
        foreach ($array as $value) {
            echo $value;
        }
    }


    private function connectDatabase(){
        
    }
    
    private function getData(){
        
    }
    
    private function view($data){
        echo "<br>You are ". $data ." on site";
    }
    
}

$counter = new Counter(array("192.168.0.1", "192.168.0.2"),0);
$counter->showQuantity();
