<?php
class NeatZone{
    private $DisplayedZone;
    function __construct($zone){
        //if string offset
        if(is_string($zone)){
            $this->DisplayedZone = $this->getNeatZoneForString($zone);
        }
    }
    private function getNeatZoneForString($zone){
        $zones = array(
            'America/Los_Angeles'=>"Los Angeles, CA",
            'America/Detroit'=>"Detroit, MI"
        );
        return $zones[$zone];
    }
    public function print_zone(){
        echo $this->DisplayedZone;
    }
}