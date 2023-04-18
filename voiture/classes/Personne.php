<?php
class Personne
{
  private $nom;
  private $prenom;
  private $voiture;

  public function __construct($nom, $prenom)
  {
    $this->nom = $nom;
    $this->prenom = $prenom;
  }

  public function setVoiture($voiture)
  {
    $this->voiture = $voiture;
  }

  public function getVoiture()
  {
    return $this->voiture;
  }

  // Add the missing methods
  public function getNom()
  {
    return $this->nom;
  }

  public function getPrenom()
  {
    return $this->prenom;
  }
}






