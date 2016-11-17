<?php
interface IGeocodeProvider {
    function geocode ($lat, $long);
}