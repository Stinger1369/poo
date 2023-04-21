<?php
// Getters.php

trait Setters
{
  public function setImmatriculation($immatriculation)
  {
    $this->immatriculation = $immatriculation;
  }

  public function setCouleur($couleur)
  {
    $this->couleur = $couleur;
  }

  public function setPoids($poids)
  {
    $this->poids = $poids;
  }

  public function setPuissance($puissance)
  {
    $this->puissance = $puissance;
  }

  public function setCapaciteReservoir($capaciteReservoir)
  {
    $this->capaciteReservoir = $capaciteReservoir;
  }

  public function setNiveauEssence($niveauEssence)
  {
    $this->niveauEssence = $niveauEssence;
  }

  public function setNombrePlaces($nombrePlaces)
  {
    $this->nombrePlaces = $nombrePlaces;
  }
}
