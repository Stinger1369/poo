<?php
require_once 'Voiture.php';

class Fourgon extends Voiture
{
private $volume;

public function __construct($immatriculation, $couleur, $poids, $puissance, $capaciteReservoir, $nombrePlaces, $volume)
{
parent::__construct($immatriculation, $couleur, $poids, $puissance, $capaciteReservoir, $nombrePlaces);
$this->volume = $volume;
}

public function getVolume()
{
return $this->volume;
}
}