<?php
require_once "php_serial.class.php";
class arduinoInterface{
    function __construct(){
        $this->serial = new phpSerial();
        if($this->serial->deviceSet("/dev/ttyACM0")){
        } else echo "Cannot set device";
        $this->serial->confBaudRate(9600);
        $this->serial->confCharacterLength(8);
    }
 
    function sendData($state, $pin){
        if($this->serial->deviceOpen()){
            $this->serial->sendMessage($pin."=".$state."\n"  );
            $this->serial->deviceClose();
        } else echo "Cannot open device";
        
    }
    function toggleLED($state,$pin){
        echo $state."<- | ->".$pin;
        $this->sendData($state, $pin);
        //echo "A: ".chr(49)."\n";
       // echo "Switched to ".$state;
        
    }
}
?>