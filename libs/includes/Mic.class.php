<?php

class Mic
{
    private $brand;
    public $port;
    public $usb_port;
    public $model;
    public $light;
    public $prices;
    public static $test;


    public static function testfunction()
    {
        printf("This is static function, this can be run without object initialization..".Mic::$test);
    }
    public function __construct($brand){
        $this->brand = ucwords($brand);
        printf("Constructing object \n");    
    }
    public function getbrand(){
        return $this->brand;
    }
    public function setLight($light){
        $this->light=$light;
    }
    public function getModel(){
        return $this->model;
    }
    public function setModel($model){
        $this->model = ucwords($model);
    }
    public function __destruct(){
        printf("Connection end ".$this->brand );    
    }

}