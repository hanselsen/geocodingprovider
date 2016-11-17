<?php
class BingMapsProvider implements IGeocodeProvider {

    public function geocode($lat, $long) {
        
        $baseURL = "http://dev.virtualearth.net/REST/v1/Locations";
        $key = 'AicWcuS0jqpd_Ipqpz94GQzBJtTyQio9o4eOGj5QFqZ6B_ukN33i_V7OLx_GdL57';
        $revGeocodeURL = $baseURL."/".$lat.",".$long."?output=json&key=" . $key;
        
        $json = file_get_contents($revGeocodeURL);
        $obj = json_decode($json);
        
        $address = $obj->resourceSets[0]->resources[1]->address;
        
        $result = [
            'number' => null,
            'street' => $address->addressLine,
            'city' => $address->adminDistrict2,
            'country' => $address->countryRegion
        ];
        
        return $result;
    }

}

