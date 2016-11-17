<?php

require 'IGeocodeProvider.php';

class Geocoder {

    public function geocode($lat, $long) {
        $oldErrorreporting = error_reporting();
        error_reporting(E_ERROR);
        $providers = $this->getProviders();

        foreach ($providers as $provider) {
            $result = $provider->geocode($lat, $long);
            if ($result !== false) {
                error_reporting($oldErrorreporting);
                return $result;
            }
        }

        error_reporting($oldErrorreporting);
        return false;
    }

    private function getProviders() {
        $files = glob(__DIR__ . "/providers/*.php");
        foreach ($files as $file) {
            include_once $file;
        }
        $providers = [];
        foreach (get_declared_classes() as $className) {
            if (in_array('IGeocodeProvider', class_implements($className))) {
                $providers[] = new $className();
            }
        }
        return $providers;
    }

}
