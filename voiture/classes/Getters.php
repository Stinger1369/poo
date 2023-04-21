<?php
// Getters.php

trait Getters
{
  public function getImmatriculation()
  {
    return $this->immatriculation;
  }

  public function getCouleur()
  {
    return $this->couleur;
  }

  public function getPoids()
  {
    return $this->poids;
  }

  public function getPuissance()
  {
    return $this->puissance;
  }

  public function getCapaciteReservoir()
  {
    return $this->capaciteReservoir;
  }

  public function getNiveauEssence()
  {
    return $this->niveauEssence;
  }

  public function getNombrePlaces()
  {
    return $this->nombrePlaces;
  }

  public function getAssure()
  {
    return $this->assure;
  }

  public function getMessageTableauBord()
  {
    return $this->messageTableauBord;
  }
}
