<?php
class NeatZone{
    private $DisplayedZone;
    function __construct($zone){
        //if string offset
        if(is_string($zone)){
            $this->DisplayedZone = $this->getNeatZoneForString($zone);
        }
        //if int offset, checks for int or numeric string
        if(is_numeric($zone)){
            $offset = $zone;
            //check daylight savings time
            if(date('I')){
                $offset -= 1;
            }
            echo timezone_name_from_abbr("", $offset*3600, false);
            $this->DisplayedZone = $this->getNeatZoneForString(timezone_name_from_abbr("", $offset*3600, false));
        }
    }
    private function getNeatZoneForString($zone){
        $zones = array(
            'America/Los_Angeles'=>"Los Angeles, CA",
            'America/Detroit'=>"Detroit, MI"
        );
        //if not found in our list, return the default
        if(!array_key_exists($zone, $zones)){
            return $zone;
        }
        return $zones[$zone];
    }
    public function print_zone(){
        echo $this->DisplayedZone;
    }
}