<?php

class OSMProvider implements IGeocodeProvider {
    
    private static $url = 'http://nominatim.openstreetmap.org/reverse?format=json';
    
    public function geocode($lat, $long) {
        
        return false;
        
    }

}
