<?php
class GMapsProvider implements IGeocodeProvider {
    
    private static $addressUrl = "http://maps.google.com/maps/api/geocode/json?address=";
    private static $reverseUrl = "http://maps.google.com/maps/api/geocode/json?latlng=";
    
    public function geocode($lat, $long) {
        
        $json = file_get_contents(self::$reverseUrl . $lat . ',' . $long);
        $obj = json_decode($json);

        if(!isset($obj->results[0]))
            return false;

        $components = $obj->results[0]->address_components;

        $result = [
            'number' => $components[0]->long_name,
            'street' => $components[1]->long_name,
            'city' => $components[3]->long_name,
            'country' => $components[6]->long_name
        ];
        return $result;
        
    }

}

